@props(['icon'=>null, 'url'=>''])
<li  x-data="{ isActive: `{{ URL::current() }}`.startsWith(`{{ URL::to($url) }}`) }"
     x-bind:class="{ 'active': isActive }" class="rounded-xl nav_item_hover">
    <a class="flex-row flex-auto justify-start items-center gap-2 flex p-3" href="{{ $url }}" wire:navigate>
        @if(!is_null($icon))
            <x-dynamic-component :component="'icon.'.$icon"/>
        @endif
        <p class="font-semibold text-sm xl:text-lg">{{$slot}}</p>
    </a>
</li>
