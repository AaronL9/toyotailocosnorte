<!-- Success / Error Toast -->
<div
    x-show="toast.show"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    :class="toast.type === 'success' ? 'bg-green-50 border-green-200 text-green-800' : 'bg-red-50 border-red-200 text-red-800'"
    class="fixed bottom-6 right-6 flex items-center gap-3 px-4 py-3 rounded-lg border shadow-md text-sm font-medium z-50"
    style="display: none;">
    <i :class="toast.type === 'success' ? 'fa-solid fa-circle-check' : 'fa-solid fa-circle-xmark'" class="text-base"></i>
    <span x-text="toast.message"></span>
</div>