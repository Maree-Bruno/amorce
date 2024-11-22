<div class="z-50 absolute " x-show="showModal">
    <div class="bg-white border border-gray-300 rounded-xl
    modal-box-shadow p-6 relative z-40" @click.away="showModal = false"
         x-transition:enter="motion-safe:ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100">
        {{$slot}}
    </div>
</div>
