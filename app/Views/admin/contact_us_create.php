<?= $this->extend("admin/layout/admin_control_panel"); ?>

<?= $this->section("page") ?>

<div x-data="contact_us_create()" class="w-full max-w-3xl px-2 flex flex-col gap-6">

    <!-- Page Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Add Contact</h1>
        <p class="text-sm text-gray-500 mt-1">Add a department phone number customers can call.</p>
    </div>

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-1.5 text-xs text-gray-400">
        <a href="<?= site_url('admin/contact-us') ?>" class="hover:text-gray-600 transition-colors">Contact Numbers</a>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
        <span class="text-gray-600 font-medium">Add</span>
    </nav>

    <!-- ── Form ─────────────────────────────────────────────────────── -->
    <form
        action="/admin/contact-us"
        method="post"
        class="flex flex-col gap-6">

        <?= csrf_field() ?>

        <!-- Contact Details -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">

            <h2 class="text-xs font-semibold uppercase text-gray-400 tracking-wider mb-5">Contact Details</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <!-- Department -->
                <div class="flex flex-col gap-1.5">
                    <label for="title" class="text-xs font-medium text-gray-600">
                        Department <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-building text-gray-400 text-xs"></i>
                        </div>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="<?= esc(old('title')) ?>"
                            placeholder="e.g. Parts Department"
                            autocomplete="off"
                            required
                            class="py-2 pl-8 pr-3 block w-full border <?= session()->getFlashdata('errors.title') ? 'border-red-400 bg-red-50 focus:border-red-500 focus:ring-red-200' : 'border-gray-200 bg-gray-50 focus:border-primary-500 focus:ring-primary-100' ?> rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 transition-colors duration-150" />
                    </div>
                    <?php if (session()->getFlashdata('errors.title')): ?>
                        <p class="text-xs text-red-500 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                            <?= esc(session()->getFlashdata('errors.title')) ?>
                        </p>
                    <?php else: ?>
                        <p class="text-xs text-gray-400">The name customers will see.</p>
                    <?php endif; ?>
                </div>

                <!-- Contact Number -->
                <div class="flex flex-col gap-1.5">
                    <label for="value" class="text-xs font-medium text-gray-600">
                        Contact Number <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-phone text-gray-400 text-xs"></i>
                        </div>
                        <input
                            type="tel"
                            id="value"
                            name="value"
                            value="<?= esc(old('value')) ?>"
                            placeholder="e.g. 077-644-0112"
                            inputmode="tel"
                            autocomplete="off"
                            required
                            class="py-2 pl-8 pr-3 block w-full border <?= session()->getFlashdata('errors.value') ? 'border-red-400 bg-red-50 focus:border-red-500 focus:ring-red-200' : 'border-gray-200 bg-gray-50 focus:border-primary-500 focus:ring-primary-100' ?> rounded-lg text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 transition-colors duration-150" />
                    </div>
                    <?php if (session()->getFlashdata('errors.value')): ?>
                        <p class="text-xs text-red-500 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                            <?= esc(session()->getFlashdata('errors.value')) ?>
                        </p>
                    <?php else: ?>
                        <p class="text-xs text-gray-400">Include the area code.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Encoded By Info Banner -->
        <div class="flex items-center gap-3 px-4 py-3 bg-gray-50 rounded-lg border border-gray-100">
            <i class="fa-solid fa-circle-info text-gray-400 text-sm"></i>
            <p class="text-xs text-gray-500">
                This record will be encoded by
                <span class="font-medium text-gray-700"><?= esc(session()->get('user_uname') ?? 'current user') ?></span>
                on <span class="font-medium text-gray-700"><?= date('F j, Y') ?></span>.
            </p>
        </div>

        <!-- Error Summary -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4" role="alert">
                <div class="flex gap-x-3">
                    <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m15 9-6 6" />
                        <path d="m9 9 6 6" />
                    </svg>
                    <p class="font-medium"><?= esc(session()->getFlashdata('error')) ?></p>
                </div>
            </div>
        <?php endif; ?>

        <!-- ── Actions ──────────────────────────────────────────────────── -->
        <div class="flex items-center justify-between pt-1 pb-4">

            <a
                href="<?= site_url('admin/contact-us') ?>"
                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 transition-colors duration-150">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Back to Contacts
            </a>

            <button
                type="submit"
                :disabled="submitting"
                class="py-2 px-6 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-primary-950 text-white hover:bg-primary-800 disabled:opacity-60 disabled:cursor-not-allowed transition-colors duration-150">
                <i :class="submitting ? 'fa-solid fa-circle-notch fa-spin' : 'fa-solid fa-plus'" class="text-xs"></i>
                <span x-text="submitting ? 'Adding…' : 'Add Contact'"></span>
            </button>

        </div>

    </form>

</div>

<?= $this->endSection() ?>