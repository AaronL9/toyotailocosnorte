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
    <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

        <div class="flex flex-col items-center lg:items-start gap-6">
            <h2 class="text-center lg:text-left text-4xl md:text-5xl/16 max-w-lg leading-tight text-black">
                The team driving the brand forward.
            </h2>
            <p class="text-center lg:text-left text-sm text-black max-w-md">
                Our marketing specialists, strategists, and storytellers connect
                drivers with the innovation and reliability of Toyota Motor
                Corporation through campaigns that inspire trust and loyalty.
            </p>
            <a href="/agents"
                class="group relative inline-flex h-12 items-center justify-center overflow-hidden rounded-md border border-red-600 bg-red-600 px-6 font-medium text-white transition-all duration-100 [box-shadow:5px_5px_rgb(153_27_27)] active:translate-x-0.75 active:translate-y-0.75 active:[box-shadow:0px_0px_rgb(153_27_27)]">
                See more
            </a>
        </div>

        <!-- Right column: team photo -->
        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-none border border-gray-200 bg-gray-100">
            <span class="absolute inset-0 grid place-items-center text-sm font-medium text-gray-500">
                Team photo
            </span>

        </div>
        <!-- Right Content - Image Gallery -->
        <!-- <div class="grid grid-cols-2 gap-6 max-w-2xl mx-auto lg:mx-0">
            <?php for ($i = 0; $i < count($agents); $i++): ?>
                <?php if (($i + 1) % 2 != 0): ?>
                    <div class="group relative overflow-hidden rounded-2xl shadow-xl cursor-pointer">
                        <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                            src="/img/agents/<?= $agents[$i]->agent_photo ?>" alt="Team Member 1" />
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-black/90 via-black/60 to-transparent p-4">
                            <h3 class="text-white font-semibold text-lg mb-1">
                                <?php echo "{$agents[$i]->agent_fname} {$agents[$i]->agent_lname}" ?>
                            </h3>
                            <div class="space-y-1 text-xs text-gray-300">
                                <p><?= $agents[$i]->agent_email ?></p>
                                <p><?= $agents[$i]->agent_contact ?></p>
                                <div class="flex gap-3 items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="group relative overflow-hidden rounded-2xl shadow-xl cursor-pointer mt-12">
                        <img class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-105"
                            src="/img/agents/<?= $agents[$i]->agent_photo ?>" alt="Team Member 2" />
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-black/90 via-black/60 to-transparent p-4">
                            <h3 class="text-white font-semibold text-lg mb-1">
                                <?php echo "{$agents[$i]->agent_fname} {$agents[$i]->agent_lname}" ?>
                            </h3>
                            <p class="text-gray-300 text-xs mb-2">Marketing Professional</p>
                            <div class="space-y-1 text-xs text-gray-300">
                                <p><?= $agents[$i]->agent_email ?></p>
                                <p><?= $agents[$i]->agent_contact ?></p>
                                <div class="flex gap-3 items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div> -->
    </div>

    <!-- Maps Section -->
    <div class="mx-auto mt-12 w-full max-w-7xl overflow-hidden rounded-none border border-gray-200 bg-gray-100">
        <iframe title="Map showing Toyota Baguio City"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4655.075548185539!2d120.58381357591469!3d18.154873380241728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x338ec6f77174b4d3%3A0xb7e9d1f7356a9216!2sToyota%20Ilocos%20Norte!5e1!3m2!1sen!2sph!4v1794988637745!5m2!1sen!2sph"
            class="block h-72 w-full border-0 md:h-96" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen>
        </iframe>
    </div>
</section>

<?= $this->endSection() ?>