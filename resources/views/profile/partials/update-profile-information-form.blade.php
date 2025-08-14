<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informations') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour votre nom d'utilisateur et votre adresse mail") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="flex justify-between items-center">
            <div class="max-w-32 mr-7">
                @php
                    $sizes = Config::get('images.sizes');
                    $search = array_keys($sizes)[0];
                @endphp
                @if($user->image !== null)
                    <img src="{{ asset(str_replace($search, 'thumbnail', $user->image)) }}"
                         srcset="{{ asset(str_replace($search, 'thumbnail', $user->image)) }} {{ $sizes['thumbnail']}}w,
                         {{ asset(str_replace($search, 'large', $user->image)) }} {{ $sizes['large'] }}w"
                         alt="{{ $user->fullname }}"
                         loading="lazy"
                         decoding="async"
                         width="{{ $sizes['thumbnail'] }}"
                         height="{{ $sizes['cover'] }}"
                         class="rounded-2xl aspect-square object-cover "
                    >
                @else

                    <img src="{{asset('/images/default_user.jpg')}}"
                         alt="{{ $user->fullname }}"
                         loading="lazy"
                         decoding="async"
                         class="rounded-2xl "
                    >
                @endif

            </div>
            <div class="w-full flex flex-col gap-4">
                <div>
                    <x-input-label for="name" :value="__('Nom')"/>
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                  :value="old('name', $user->name)" required autofocus autocomplete="name"/>
                    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                  :value="old('email', $user->email)" required autocomplete="username"/>
                    <x-input-error class="mt-2" :messages="$errors->get('email')"/>

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="flex justify-between gap-8">
                    <div class="flex flex-col w-full">
                        <x-input-label for="image" :value="__('Image de profile')"></x-input-label>
                        <input type="file" name="image" id="image" class='border-gray-300 focus:border-indigo-500
            focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full p-2' :value="old('image', $user->image)">
                        <x-input-error class="mt-2" :messages="$errors->get('image')"/>
                    </div>
                    @if($user->role === 'admin')
                    <div class="flex flex-col w-full">
                        <x-input-label for="role" :value="__('Role')"></x-input-label>
                        <select name="role" id="role" class="border-gray-300 focus:border-indigo-500
            focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full p-2">
                            <option value="admin">
                                admin
                            </option>
                            <option value="accountant">
                                accountant
                            </option>
                            <option value="user">
                                user
                            </option>
                        </select>
                    </div>
                    @else
                        <div class="flex flex-col w-full">
                           <p class="block font-medium text-sm text-gray-700">Rôle</p>
                           <p class="border-gray-300 focus:border-indigo-500
            focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full p-2">
                               @if(!$user->role)
                                   Aucun rôle
                               @endif
                               {{$user->role}}
                           </p>
                        </div>
                    @endif
                </div>

                <div class="flex items-center gap-4">
                    <x-button.button class="buttons-confirm">{{ __('Enregistrer') }}</x-button.button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </div>

    </form>
</section>
