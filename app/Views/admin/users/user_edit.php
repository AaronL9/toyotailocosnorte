<?= $this->extend("admin/layout/admin_control_panel"); ?>
<?= $this->section("page") ?>

<?php
/**
 * @var object $user
 */
?>


<div class="w-full max-w-2xl px-2 flex flex-col gap-6">

    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit user</h1>
            <p class="text-sm text-gray-500 mt-1">Update account details or reset the password.</p>
        </div>
        <button type="button" data-hs-overlay="#reset-password-modal"
            class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-700 hover:bg-gray-50">
            <i class="fa-solid fa-key text-xs"></i> Reset password
        </button>
    </div>

    <?= $this->include("partials/alert_success"); ?>

    <form action="<?= site_url("admin/users/{$user->id}") ?>" method="post" class="flex flex-col gap-6">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field() ?>

        <!-- Personal information -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <h2 class="text-sm font-semibold text-gray-800 mb-4">Personal information</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="flex flex-col gap-1.5">
                    <label for="last_name" class="text-xs font-medium text-gray-600">Last name</label>
                    <input type="text" id="last_name" name="last_name" value="<?= $user->last_name ?? '' ?>"
                        class="py-2.5 px-3 w-full border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-100">
                </div>
                <div class="flex flex-col gap-1.5">
                    <label for="first_name" class="text-xs font-medium text-gray-600">First name</label>
                    <input type="text" id="first_name" name="first_name" value="<?= $user->first_name ?? '' ?>"
                        class="py-2.5 px-3 w-full border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-100">
                </div>
                <div class="flex flex-col gap-1.5">
                    <label for="middle_name" class="text-xs font-medium text-gray-600">Middle name</label>
                    <input type="text" id="middle_name" name="middle_name" value="<?= $user->middle_name ?? '' ?>"
                        class="py-2.5 px-3 w-full border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-100">
                </div>
            </div>
        </div>

        <!-- Username -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <h2 class="text-sm font-semibold text-gray-800 mb-4">Username</h2>
            <div class="flex flex-col gap-1.5">
                <label for="username" class="text-xs font-medium text-gray-600">Username</label>
                <input type="text" id="username" name="username" value="<?= $user->username ?? '' ?>" autocomplete="off"
                    class="py-2.5 px-3 w-full sm:max-w-sm border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-100">
                <p class="text-xs text-gray-400">Must be unique. Letters and numbers only.</p>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between pb-4">
            <a href="<?= site_url('admin/users') ?>"
                class="py-2.5 px-4 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-gray-50">Cancel</a>
            <button type="submit"
                class="py-2.5 px-6 text-sm font-medium rounded-lg bg-primary-950 text-white hover:bg-primary-800">Save changes</button>
        </div>

    </form>
</div>

<!-- Reset password modal -->
<div x-data="users_edit()" id="reset-password-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-300 mt-0 opacity-0 ease-out transition-all sm:max-w-md sm:w-full m-3 sm:mx-auto">

        <form @submit.prevent="resetPassword" action="/admin/users/<?= $user->id ?>/reset-password" method="post"
            class="pointer-events-auto flex flex-col bg-white border border-gray-200 rounded-xl shadow-lg">
            <input type="hidden" name="_method" value="PUT">
            <?= csrf_field() ?>

            <div class="flex justify-between items-start py-4 px-6 border-b border-gray-100">
                <div>
                    <h3 class="text-base font-semibold text-gray-800">Reset password</h3>
                    <p class="text-xs text-gray-500 mt-0.5">for <span class="font-medium text-gray-700">@jdelacruz</span></p>
                </div>
                <button type="button" data-hs-overlay="#reset-password-modal" aria-label="Close"
                    class="size-8 inline-flex justify-center items-center rounded-full text-gray-500 hover:bg-gray-100">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>

            <div class="p-6 flex flex-col gap-4">
                <p class="text-sm text-gray-600">
                    The password of <span class="font-medium text-gray-800">@jdelacruz</span> will be reset to:
                </p>
                <div class="py-3 px-4 rounded-lg bg-gray-50 border border-gray-200 text-center">
                    <span class="font-mono text-base font-semibold text-gray-800 tracking-wide">Toyota12345</span>
                </div>
                <p class="text-xs text-gray-500">The old password stops working immediately. Ask the user to sign in with this one.</p>
            </div>

            <div class="flex justify-end gap-2 py-4 px-6 border-t border-gray-100">
                <button type="button" data-hs-overlay="#reset-password-modal"
                    class="py-2 px-4 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-gray-50">Cancel</button>
                <button type="submit"
                    class="py-2 px-5 text-sm font-medium rounded-lg bg-primary-950 text-white hover:bg-primary-800">Reset password</button>
            </div>
        </form>
    </div>
</div>

<?= $this->include('partials/toast'); ?>

<?= $this->endSection() ?>