<?= $this->extend("admin/layout/admin_control_panel"); ?>

<?= $this->section("page") ?>

<?php
/**
 * Expected from controller:
 * $contacts = rows from `config` where config_label = 'Department Contact Numbers'
 *             AND config_isshow = 1 AND config_inactive = 0 AND config_delete = 0
 *             ORDER BY config_order ASC
 *
 * Each row: code, title, value
 */
?>

<div class="w-full max-w-3xl px-2 flex flex-col gap-6">

    <!-- Page Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Department Contact Numbers</h1>
        <p class="text-sm text-gray-500 mt-1">Manage the phone numbers customers use to reach each department.</p>
    </div>

    <!-- Success / Error -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-50 border border-green-200 text-sm text-green-800 rounded-lg p-4" role="alert">
            <div class="flex gap-x-3">
                <i class="fa-solid fa-circle-check mt-0.5"></i>
                <p class="font-medium"><?= esc(session()->getFlashdata('success')) ?></p>
            </div>
        </div>
    <?php endif; ?>

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
    <div class="flex items-center justify-end">
        <a href="<?= site_url('admin/contact-us/new') ?>" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-primary-950 border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden">
            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M12 5v14M5 12h14" />
            </svg>
            Add Contact
        </a>
    </div>

    <!-- ── Contact List ─────────────────────────────────────────────── -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">

        <h2 class="text-xs font-semibold uppercase text-gray-400 tracking-wider mb-5">Departments</h2>

        <?php if (empty($contacts)): ?>
            <div class="flex flex-col items-center text-center py-8">
                <i class="fa-solid fa-phone-slash text-gray-300 text-2xl mb-3"></i>
                <p class="text-sm font-medium text-gray-700">No contact numbers found</p>
                <p class="text-xs text-gray-400 mt-1">Use Add Contact to create the first department entry.</p>
            </div>
        <?php else: ?>
            <div class="flex flex-col gap-3">

                <?php foreach ($contacts as $row): ?>
                    <div class="flex items-center justify-between gap-4 p-3 rounded-lg border border-gray-100 hover:bg-gray-50 transition-colors duration-100">

                        <!-- Department + Number -->
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-gray-700 truncate"><?= esc($row->title) ?></p>
                            <a href="tel:<?= esc(preg_replace('/[^0-9+]/', '', $row->value)) ?>"
                                class="mt-0.5 inline-flex items-center gap-1.5 text-xs text-gray-500 hover:text-gray-700 transition-colors">
                                <i class="fa-solid fa-phone text-gray-400 text-[10px]"></i>
                                <?= esc($row->value) ?>
                            </a>
                        </div>

                        <!-- Row actions -->
                        <div class="flex items-center gap-2 shrink-0">

                            <!-- Edit -->
                            <a href="<?= site_url('admin/contact-us/edit/' . $row->id) ?>"
                                title="Edit contact"
                                aria-label="Edit <?= esc($row->title) ?>"
                                class="size-9 inline-flex justify-center items-center rounded-lg border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 hover:text-primary-700 transition-colors duration-150">
                                <i class="fa-solid fa-pen-to-square text-sm"></i>
                            </a>

                            <!-- Delete (confirm alert) -->
                            <form
                                action="<?= site_url('admin/contact-us/' . $row->id) ?>"
                                method="post"
                                onsubmit="return confirm('Delete <?= esc($row->title, 'js') ?>? Customers will no longer see this number.');">
                                <input type="hidden" name="_method" value="DELETE">
                                <?= csrf_field() ?>
                                <button type="submit"
                                    title="Delete contact"
                                    aria-label="Delete <?= esc($row->title) ?>"
                                    class="size-9 inline-flex justify-center items-center rounded-lg border border-gray-200 bg-white text-gray-500 hover:bg-red-50 hover:border-red-200 hover:text-red-600 transition-colors duration-150">
                                    <i class="fa-regular fa-trash-can text-sm"></i>
                                </button>
                            </form>

                        </div>

                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>

</div>

<?= $this->endSection() ?>