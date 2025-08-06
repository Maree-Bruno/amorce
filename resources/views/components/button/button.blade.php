@props(['icon'=>null, 'responsive' => false, 'slot' => null])

<button type="submit" {{ $attributes->class(['buttons p-2.5 flex-row flex-auto justify-center items-center gap-2 flex nav_item_hover']) }}>
    @if (!is_null($icon))
        <x-dynamic-component :component="'icon.' . $icon"/>
    @endif
    @if(!is_null($slot))
            <span class="{{ $responsive ? 'sr-only md:not-sr-only truncate font-bold text-left' : 'truncate font-bold'
             }}">
        {{ $slot }}
    </span>
    @endif
</button>
