<div {{ $attributes->class(["z-50 absolute max-w-lg" ])}} x-show="showModal"
     @click.away="showModal = false"
     x-transition:enter="motion-safe:ease-out duration-300"
     x-transition:enter-start="opacity-0 scale-90"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="motion-safe:ease-out duration-300"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-90"
>
    <div class="bg-white border border-gray-300 rounded-xl
    modal-box-shadow p-3 relative z-40 w-fit" >
        {{$slot}}
    </div>
</div>
