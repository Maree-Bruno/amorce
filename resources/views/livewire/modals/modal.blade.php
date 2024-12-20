<div class="z-50 absolute inset-0 modal-background-color flex items-center justify-center h-screen"
     x-transition:enter="motion-safe:ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-x-full"
     x-transition:enter-end="opacity-100 translate-x-0"
     x-transition:leave="motion-safe:ease-out duration-300"
     x-transition:leave-start="opacity-100 translate-x-0"
     x-transition:leave-end="opacity-0 translate-x-full"
>
    <div
        class="w-full min-w-96 max-w-screen-lg max-h[99vh] bg-white border border-gray-300 rounded-xl
        modal-box-shadow p-6 relative z-40">
        {{$slot}}
    </div>
</div>
