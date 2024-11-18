@props(['icon'=>null, 'url'=>'#'])
<li class="rounded-xl nav_item_hover p-2.5">
    <a class="flex-row flex-auto  justify-start items-center gap-2 flex" href="{{ $url }}">
        @if(!is_null($icon))
            <x-dynamic-component :component="'icon.'.$icon"/>
        @endif
        <p class="text-black leading-snug">{{$slot}}</p>
    </a>
</li>
