@props(['icon'=>null, 'url'=>''])
<li  x-data="{ isActive: `{{ URL::current() }}`.startsWith(`{{ URL::to($url) }}`) }"
     x-bind:class="{ 'active': isActive }" class="rounded-xl nav_item_hover flex items-center justify-center">
    <a class="flex-row flex-auto justify-start items-center gap-2 flex p-2" href="{{ $url }}" wire:navigate>
        @if(!is_null($icon))
            <x-dynamic-component :component="'icon.'.$icon"/>
        @endif
        <p class="font-semibold sr-only xl:not-sr-only">{{$slot}}</p>
    </a>
</li>
