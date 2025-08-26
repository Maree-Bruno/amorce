<div class="z-50 absolute inset-0 modal-background-color flex items-center justify-center min-h-dvh 2xl:items-start"
     x-cloak
     x-transition:enter="motion-safe:ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-x-full"
     x-transition:enter-end="opacity-100 translate-x-0"
     x-transition:leave="motion-safe:ease-out duration-300"
     x-transition:leave-start="opacity-100 translate-x-0"
     x-transition:leave-end="opacity-0 translate-x-full"
     aria-modal="true"
>
    <div class="w-10/12 bg-white border border-gray-300 rounded-xl
        modal-box-shadow p-6 relative z-40 xl:max-w-screen-lg.min-w-96 2xl:top-14"
         @click.away="
         showModal= false,
         showCreateDonation = false,
         showCreateDonations = false,
         showCreateSpent =false,
         showCreateTransfer = false,
         showCreateFund = false,
         showEditFund = false,
         showDeleteFund = false">
        {{$slot}}
    </div>
</div>
