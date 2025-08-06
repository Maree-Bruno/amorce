@php
    if (! isset($scrollTo)) {
        $scrollTo = 'body';
    }

    $scrollIntoViewJsSnippet = ($scrollTo !== false)
        ? <<<JS
           (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
        JS
        : '';
@endphp

<div class="flex flex-row justify-center items-center">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div>
                    <span class="relative z-0 inline-flex rtl:flex-row-reverse rounded-md shadow-sm">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-semibold border
                                    border-slate-200 text-slate-300" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <p class="sr-only xl:not-sr-only truncate font-bold ">
                                    Précédent
                                    </p>
                                    </span>
                                </span>
                            @else
                                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                        x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{
                                        $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}
                                        .after" class="relative inline-flex items-center px-2 py-2 text-sm font-semibold
                                        buttons-default" aria-label="{{ __('pagination.previous') }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    <p class="sr-only xl:not-sr-only truncate font-bold ">
                                    Précédent
                                    </p>
                                </button>
                            @endif
                        </span>
<div class="sr-only sm:not-sr-only">


                        {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span aria-disabled="true">
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-semibold ">{{
                                     $element }}</span>
                                </span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                        <span aria-current="page">
                                                <span class="relative inline-flex items-center px-4 py-2 -ml-px
                                                text-sm font-semibold buttons-confirm">{{ $page }}</span>
                                            </span>
                    @else
                        <button type="button" wire:click="gotoPage({{ $page }}, '{{
                                            $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet
                                            }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm
                                            font-semibold buttons-default" aria-label="{{ __('Go to page :page',
                                            ['page' =>
                                            $page]) }}">
                                                {{ $page }}
                                            </button>
                    @endif
                                    </span>
            @endforeach
        @endif
    @endforeach
</div>
                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                                        x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{
                                        $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}
                                        .after" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm
                                        font-semibold buttons-default"
                                        aria-label="{{ __('pagination.next') }}">
                                   <p class="sr-only xl:not-sr-only truncate font-bold ">
                                    Suivant
                                    </p>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                              clip-rule="evenodd"/>
                                    </svg>

                                </button>
                            @else
                                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                    <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm
                                    font-semibold border border-slate-200 text-slate-300"
                                          aria-hidden="true">
                                        <p class="sr-only xl:not-sr-only truncate font-bold ">
                                    Suivant
                                    </p>
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                </span>
                            @endif
                        </span>
                    </span>
            </div>
        </nav>
    @endif
</div>
