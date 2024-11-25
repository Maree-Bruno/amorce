@props(['icon'=>null, 'url'=>'#'])
<li  x-data="{ isActive: '{{ URL::current() }}' === '{{ URL::to($url) }}' }"
     x-bind:class="{ 'active': isActive }" class="rounded-xl nav_item_hover p-2.5">
    <a class="flex-row flex-auto  justify-start items-center gap-2 flex" href="{{ $url }}">
        @if(!is_null($icon))
            <x-dynamic-component :component="'icon.'.$icon"/>
        @endif
        <p class="text-black font-semibold">{{$slot}}</p>
    </a>
</li>
