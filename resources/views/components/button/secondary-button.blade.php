@props(['icon'=>null, 'responsive' => false, 'slot' => null, 'subicon'=>null])

<button type="button" {{ $attributes->class(['buttons p-2.5 flex-row flex-auto justify-center items-center gap-2 flex
nav_item_hover
'])  }}>
    @if(!is_null($icon))
        <x-dynamic-component :component="'icon.'.$icon"/>
    @endif
    @if(!is_null($slot))
        <span class="{{ $responsive ? 'sr-only lg:not-sr-only truncate font-bold' : 'truncate font-bold' }}">
        {{ $slot }}
    </span>
    @endif
    @if(!is_null($subicon))
        <x-dynamic-component :component="'icon.'.$subicon"/>
    @endif
</button>
