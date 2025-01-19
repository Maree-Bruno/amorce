@props(['icon'=>null, 'subicon'=>null, 'responsive' => false,])
<button type="button" {{ $attributes->class(['buttons p-2.5 items-center flex-row flex-auto gap-2 flex
nav_item_hover w-full'])  }}>
    @if(!is_null($icon))
        <x-dynamic-component :component="'icon.'.$icon"/>
    @endif
    @if(!is_null($slot))
            <span class="{{ $responsive ? 'sr-only xl:not-sr-only truncate font-bold' : 'truncate font-bold' }}">
        {{ $slot }}
    </span>
    @endif
    @if(!is_null($subicon))
        <x-dynamic-component :component="'icon.'.$subicon"/>
    @endif
</button>
