<?= $this->extend("layout/default"); ?>
<?= $this->section("mainContent"); ?>

<?php
$homeEscape = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>

<!-- CAROUSEL -->
<section id="home" aria-label="Featured promotions" data-hs-carousel='{
        "loadingClasses": "opacity-0",
        "isInfiniteLoop": true
    }' class="relative bg-black">
    <div class="hs-carousel relative h-[320px] w-full overflow-hidden sm:h-[440px] md:h-[520px] lg:h-[640px]">
        <div
            class="hs-carousel-body absolute bottom-0 start-0 top-0 flex flex-nowrap opacity-0 transition-transform duration-700">

            <?php foreach ($banners as $row): ?>
                <div class="hs-carousel-slide">
                    <div class="relative h-full">
                        <img src="/uploads/img/banners/<?= $row->banner_photo ?>" alt="Mountain landscape"
                            class="h-full w-full object-cover" />
                        <div class="absolute inset-0 flex items-center justify-center px-16 text-center text-white">
                        </div>
                    </div>
                </div>

                <!-- <div class="absolute inset-0"></div> -->
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Previous -->
    <button type="button" aria-label="Previous slide"
        class="hs-carousel-prev absolute start-3 top-1/2 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-white/30 bg-black/30 text-white backdrop-blur-sm transition-colors hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-white sm:start-6 sm:h-12 sm:w-12">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
            aria-hidden="true">
            <path d="m15 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <!-- Next -->
    <button type="button" aria-label="Next slide"
        class="hs-carousel-next absolute end-3 top-1/2 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-white/30 bg-black/30 text-white backdrop-blur-sm transition-colors hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-white sm:end-6 sm:h-12 sm:w-12">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
            aria-hidden="true">
            <path d="m9 18 6-6-6-6" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</section>


<!-- FEATURED VEHICLES -->
<section class="bg-gray-100 py-16 md:py-24" aria-labelledby="featured-vehicles-heading">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <header class="mb-10 grid gap-5 md:grid-cols-2 md:items-end">
            <div>

                <h2 id="featured-vehicles-heading"
                    class="text-3xl font-bold tracking-tight text-gray-950 sm:text-4xl lg:text-5xl">
                    Featured Vehicles
                </h2>
            </div>
        </header>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <?php foreach ($vehicles as $row): ?>
                <article
                    class="group flex min-w-0 flex-col overflow-hidden rounded-xl border border-gray-200 bg-white transition-shadow duration-300 hover:shadow-lg">
                    <!-- Vehicle image -->
                    <div class="relative flex aspect-[4/3] items-center justify-center overflow-hidden bg-gray-50 p-5">
                        <div class="absolute inset-x-10 bottom-8 h-8 rounded-full bg-gray-200/70 blur-xl"
                            aria-hidden="true"></div>

                        <img src="/img/variants/<?= $homeEscape($row->variant_filename) ?>"
                            alt="<?= $homeEscape($row->vehicle_title) ?>" loading="lazy"
                            class="relative h-full w-full object-contain motion-safe:transition-transform motion-safe:duration-500 motion-safe:group-hover:scale-105" />
                    </div>

                    <div class="flex flex-1 flex-col p-5 sm:p-6">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-950">
                            <?= $homeEscape($row->vehicle_title) ?>
                        </h3>

                        <!-- Original pricing / tagline condition -->
                        <div class="mt-5 mb-6">
                            <?php if ($row->variant_isshowprice): ?>
                                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Starting at
                                </p>

                                <p class="mt-2 text-xl font-bold tracking-tight text-gray-950">
                                    <span class="text-sm font-medium">PHP</span>
                                    <?= number_format($row->variant_price, 2) ?><sup class="ml-0.5 text-xs">*</sup>
                                </p>

                                <p class="mt-2 text-sm leading-6 text-gray-500">
                                    <span class="font-medium text-gray-700">
                                        PHP <?= number_format($row->variant_price_month, 2) ?><sup>*</sup>
                                    </span>
                                    / month
                                </p>
                            <?php else: ?>
                                <p class="text-sm leading-7 text-gray-600">
                                    <?= $homeEscape($row->vehicle_tagline) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <a href="/<?= $homeEscape(url_title($row->vehicle_title, '-', true)) ?>"
                            aria-label="View full specifications for <?= $homeEscape($row->vehicle_title) ?>"
                            class="mt-auto flex min-h-12 items-center justify-between gap-3 rounded-lg bg-gray-950 px-4 py-3 text-sm font-semibold text-white transition-colors hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-red-600">
                            Full Specs

                            <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" aria-hidden="true">
                                <path d="M5 12h14m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div
            class="mt-10 flex flex-col gap-5 border-t border-gray-300 pt-7 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm leading-6 text-gray-600">
                Your next journey starts with the right vehicle.
            </p>

            <a href="/showroom"
                class="group inline-flex min-h-12 items-center justify-center gap-5 bg-red-600 px-6 py-3 text-sm font-semibold text-white transition-colors hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-red-600">
                View All Vehicles
                <span class="text-lg motion-safe:transition-transform motion-safe:group-hover:translate-x-1"
                    aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </div>
</section>


<!-- BRAND BANNER -->
<!-- <section class="relative isolate overflow-hidden bg-black text-white" aria-labelledby="brand-heading">
    <img src="/img/banner2-DKS0BEOM.jpg" alt="" loading="lazy"
        class="absolute inset-0 -z-20 h-full w-full object-cover" />

    <div class="absolute inset-0 -z-10 bg-black/60"></div>

    <div class="mx-auto flex min-h-[420px] max-w-7xl items-center px-6 py-20 sm:px-8 md:min-h-[560px] lg:px-12">
        <div class="max-w-3xl">
            <p class="mb-6 text-sm font-medium tracking-wide text-white/90">
                Welcome to Toyota Dagupan
            </p>

            <h1 id="brand-heading" class="text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl">
                Driven by
                <span class="block text-red-500">Innovation.</span>
                <span class="mt-2 block">Powered by Results.</span>
            </h1>
        </div>
    </div>
</section> -->


<!-- BRAND STORIES -->
<section class="bg-white px-4 py-16 text-gray-950 sm:px-6 md:py-24 lg:px-8" aria-labelledby="hero-title">
    <div class="mx-auto grid max-w-[90rem] gap-5 sm:grid-cols-2 lg:grid-cols-12 lg:gap-6">

        <!-- Text tile -->
        <div class="flex flex-col justify-center rounded-xl bg-gray-100 p-8
                   sm:col-span-2 sm:p-10 lg:col-span-5 lg:min-h-[28rem] lg:p-12">
            <h2 id="hero-title" class="text-3xl font-bold leading-tight tracking-tight sm:text-4xl lg:text-5xl">
                <span class="block">
                    Driven by <span class="text-red-600">Innovation.</span>
                </span>
                <span class="mt-1 block">Powered by Results.</span>
            </h2>

            <p class="mt-6 text-base font-medium sm:text-lg">
                Welcome to Toyota Ilocos-Norte
            </p>

            <p class="mt-2 max-w-md text-base leading-8 text-gray-600 sm:text-lg">
                Discover a new perspective on every drive.
                Your next chapter begins with Toyota Ilocos-Norte.
            </p>
        </div>

        <!-- Featured car -->
        <div class="relative h-72 overflow-hidden rounded-xl bg-gray-100
                   sm:col-span-2 sm:h-96 lg:col-span-7 lg:h-auto lg:min-h-[28rem]">
            <img src="static/bz4x_hev_banner.jpg" alt="" loading="lazy"
                class="absolute inset-0 h-full w-full object-cover" />
        </div>

        <!-- Second car -->
        <div class="relative h-64 overflow-hidden rounded-xl bg-gray-100
                   sm:h-72 lg:col-span-6 lg:h-80">
            <img src="static/land-cruiser-fj.webp" alt="" loading="lazy"
                class="absolute inset-0 h-full w-full object-cover" />
        </div>

        <!-- Third car -->
        <div class="relative h-64 overflow-hidden rounded-xl bg-gray-100
                   sm:h-72 lg:col-span-6 lg:h-80">
            <img src="static/hilux-banner.webp" alt="" loading="lazy"
                class="absolute inset-0 h-full w-full object-cover" />
        </div>

    </div>
</section>

<!-- SERVICE -->
<section id="services" class="scroll-mt-24 bg-gray-100 px-4 py-16 sm:px-6 lg:px-8 md:py-24"
    aria-labelledby="service-heading">
    <div class="mx-auto max-w-7xl">
        <div class="grid overflow-hidden rounded-2xl border border-gray-200 bg-white lg:grid-cols-2">

            <!-- Service image -->
            <div class="min-w-0 bg-gray-200">
                <img src="/img/maintenance-GiBGTARx.jpg" alt="Toyota Service Center" loading="lazy"
                    class="h-full min-h-72 w-full object-cover sm:min-h-96" />
            </div>

            <!-- Service information -->
            <div class="flex flex-col items-start justify-center p-6 sm:p-10 lg:p-12">
                <h2 id="service-heading"
                    class="mt-4 text-3xl font-bold leading-tight tracking-tight text-gray-950 sm:text-4xl lg:text-5xl">
                    Schedule Toyota Service
                </h2>

                <p class="mt-6 text-base leading-8 text-gray-600">
                    Keep your Toyota running at peak performance with our expert
                    maintenance services. Schedule your appointment online and
                    experience professional care from certified technicians.
                </p>

                <a href="/schedule"
                    class="group mt-8 inline-flex min-h-12 w-full items-center justify-center gap-4 bg-red-600 px-6 py-3 text-sm font-semibold text-white transition-colors hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-red-600 sm:w-auto">
                    Schedule Maintenance

                    <svg class="h-5 w-5 shrink-0 motion-safe:transition-transform motion-safe:group-hover:translate-x-1"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path d="M5 12h14m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- Team Section -->
<section id="team" class="bg-white text-black py-16 px-6 scroll-p-24 md:px-16 lg:px-24 xl:px-32">
    <!-- Header -->
    <div id="team-header" class="flex flex-col items-center text-center gap-3 mb-10 md:mb-12">
        <span class="text-xs font-semibold tracking-widest uppercase text-red-600">
            Our Team
        </span>
        <h2 class="text-3xl md:text-4xl font-bold leading-tight text-gray-900 max-w-xl">
            Meet the team behind the brand
        </h2>
        <p class="text-sm md:text-base text-gray-600 max-w-md">
            Specialists connecting drivers with Toyota's innovation and reliability.
        </p>
    </div>

    <div class="max-w-7xl mx-auto w-full">
        <!-- Carousel -->
        <div id="hs-carousel" class="relative" data-hs-carousel='{"loadingClasses": "opacity-0", "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer", "isAutoPlay": true, "isInfiniteLoop": true, "slidesQty": {"xs": 1,"sm": 3}}'>
            <div class="hs-carousel relative w-full overflow-hidden">
                <!-- Carousel body -->
                <div class="hs-carousel-body flex flex-nowrap relative transition-transform duration-700 -mx-1 opacity-0">
                    <?php foreach ($agents as $agent): ?>
                        <div class="hs-carousel-slide px-1">
                            <div class="group flex flex-col h-full bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
                                <!-- Photo -->
                                <div class="relative w-full overflow-hidden bg-gray-100" style="padding-bottom: 133.33%;">
                                    <?php if (!empty($agent->agent_photo)): ?>
                                        <img src="/img/agents/<?= esc($agent->agent_photo) ?>"
                                            alt="<?= esc($agent->agent_fname . ' ' . $agent->agent_lname) ?>"
                                            class="absolute inset-0 w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300" />
                                    <?php else: ?>
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <svg class="size-16 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Info -->
                                <div class="flex flex-col flex-1 px-4 py-4">
                                    <h3 class="text-sm font-bold text-gray-900 leading-tight mb-2">
                                        <?= esc($agent->agent_fname . ' ' . (!empty($agent->agent_mname) ? $agent->agent_mname . ' ' : '') . $agent->agent_lname) ?>
                                    </h3>

                                    <!-- Contact -->
                                    <div class="flex flex-col gap-y-1.5 mt-auto">
                                        <?php if (!empty($agent->agent_contact)): ?>
                                            <a href="tel:<?= esc($agent->agent_contact) ?>"
                                                class="inline-flex items-center gap-x-2 text-xs text-gray-500 hover:text-gray-800 transition-colors">
                                                <svg class="size-3.5 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path
                                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                                                </svg>
                                                <?= esc($agent->agent_contact) ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($agent->agent_email)): ?>
                                            <a href="mailto:<?= esc($agent->agent_email) ?>"
                                                class="inline-flex items-center gap-x-2 text-xs text-gray-500 hover:text-gray-800 transition-colors truncate">
                                                <svg class="size-3.5 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <rect width="20" height="16" x="2" y="4" rx="2" />
                                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                                </svg>
                                                <span class="truncate"><?= esc($agent->agent_email) ?></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Social Links -->
                                    <?php $hasSocial = !empty($agent->agent_fb) || !empty($agent->agent_ig) || !empty($agent->agent_tw); ?>
                                    <?php if ($hasSocial): ?>
                                        <div class="flex items-center gap-x-3 mt-4 pt-3 border-t border-gray-100">
                                            <?php if (!empty($agent->agent_fb)): ?>
                                                <a href="<?= esc($agent->agent_fb) ?>" target="_blank" rel="noopener noreferrer"
                                                    class="text-gray-400 hover:text-blue-600 transition-colors" aria-label="Facebook">
                                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor">
                                                        <path
                                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (!empty($agent->agent_ig)): ?>
                                                <a href="<?= esc($agent->agent_ig) ?>" target="_blank" rel="noopener noreferrer"
                                                    class="text-gray-400 hover:text-pink-500 transition-colors" aria-label="Instagram">
                                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor">
                                                        <path
                                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (!empty($agent->agent_tw)): ?>
                                                <a href="<?= esc($agent->agent_tw) ?>" target="_blank" rel="noopener noreferrer"
                                                    class="text-gray-400 hover:text-sky-500 transition-colors" aria-label="Twitter / X">
                                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor">
                                                        <path
                                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L1.254 2.25H8.08l4.253 5.622 5.912-5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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

            <div class="hs-carousel-pagination flex justify-center absolute -bottom-6 left-0 right-0 gap-x-2"></div>
            <!-- End Pagination -->
        </div>
    </div>
</section>

<!-- Maps Section -->
<div class="mx-auto mt-12 w-full max-w-7xl overflow-hidden rounded-none border border-gray-200 bg-gray-100">
    <iframe title="Map showing Toyota Baguio City"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4655.075548185539!2d120.58381357591469!3d18.154873380241728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x338ec6f77174b4d3%3A0xb7e9d1f7356a9216!2sToyota%20Ilocos%20Norte!5e1!3m2!1sen!2sph!4v1794988637745!5m2!1sen!2sph"
        class="block h-72 w-full border-0 md:h-96" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen>
    </iframe>
</div>

<?= $this->endSection() ?>