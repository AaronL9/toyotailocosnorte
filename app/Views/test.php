<?= $this->extend("layout/default"); ?>
<?= $this->section("mainContent"); ?>

<!-- Carousel -->
<div id="hs-carousel" class="relative" data-hs-carousel='{"loadingClasses": "opacity-0", "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer", "isAutoPlay": true, "isInfiniteLoop": true, "slidesQty": {"xs": 1,"sm": 3}}'>
    <div class="hs-carousel relative w-full min-h-96 overflow-hidden">
        <!-- Carousel Body -->
        <!-- Carousel body -->
        <div class="hs-carousel-body flex flex-nowrap absolute top-0 bottom-0 left-0 transition-transform duration-700 -mx-1 opacity-0">
            <div class="hs-carousel-slide px-1">
                <div class="flex justify-center h-full bg-gray-100 p-6">
                    <span class="self-center text-sm text-gray-800 transition duration-700">First slide</span>
                </div>
            </div>
            <div class="hs-carousel-slide px-1">
                <div class="flex justify-center h-full bg-gray-200 p-6">
                    <span class="self-center text-sm text-gray-800 transition duration-700">Second slide</span>
                </div>
            </div>
            <div class="hs-carousel-slide px-1">
                <div class="flex justify-center h-full bg-gray-300 p-6">
                    <span class="self-center text-sm text-gray-800 transition duration-700">Third slide</span>
                </div>
            </div>
            <div class="hs-carousel-slide px-1">
                <div class="flex justify-center h-full bg-gray-400 p-6">
                    <span class="self-center text-sm text-gray-800 transition duration-700">Fourth slide</span>
                </div>
            </div>
            <div class="hs-carousel-slide px-1">
                <div class="flex justify-center h-full bg-gray-500 p-6">
                    <span class="self-center text-sm text-gray-800 transition duration-700">Fifth slide</span>
                </div>
            </div>
            <div class="hs-carousel-slide px-1">
                <div class="flex justify-center h-full bg-gray-600 p-6">
                    <span class="self-center text-sm text-gray-800 transition duration-700">Sixth slide</span>
                </div>
            </div>
        </div>
        <!-- End Carousel Body -->
    </div>

    <!-- Arrows -->
    <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:cursor-default absolute top-1/2 left-2 inline-flex justify-center items-center size-10 bg-white text-gray-800 rounded-full shadow-sm hover:bg-gray-50 -translate-y-1/2 focus:outline-none">
        <span class="text-2xl" aria-hidden="true">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6" />
            </svg>
        </span>
        <span class="sr-only">Previous</span>
    </button>
    <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:cursor-default absolute top-1/2 right-2 inline-flex justify-center items-center size-10 bg-white text-gray-800 rounded-full shadow-sm hover:bg-gray-50 -translate-y-1/2 focus:outline-none">
        <span class="sr-only">Next</span>
        <span class="text-2xl" aria-hidden="true">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </span>
    </button>
    <!-- End Arrows -->

    <div class="hs-carousel-pagination flex justify-center absolute bottom-3 left-0 right-0 gap-x-2"></div>
    <!-- End Pagination -->
</div>

<?= $this->endSection() ?>