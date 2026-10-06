<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<section class="hero-section py-5">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <div class="d-flex align-items-center">

                    <div
                        class="feature-icon m-0 me-3"
                        style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fas fa-user"></i>
                    </div>

                    <div>
                        <h1 class="display-5 fw-bold mb-1">
                            Customer Details
                        </h1>

                        <p class="mb-0">
                            View complete customer account information.
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                <a
                    href="<?= base_url('dashboard') ?>"
                    class="btn btn-outline-light">
                    <i class="fas fa-arrow-left me-2"></i>
                    Back to Dashboard
                </a>

            </div>

        </div>

    </div>
</section>


<!-- Customer Details -->
<section class="section-padding bg-light-custom">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-10">

                <div class="card">

                    <div class="card-body p-4 p-md-5">

                        <!-- Customer Header -->
                        <div
                            class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">

                            <div>

                                <p class="text-muted mb-1">
                                    Customer Account
                                </p>

                                <h2 class="fw-bold text-primary-custom mb-2">
                                    <?= esc($customer['customer_name']) ?>
                                </h2>

                                <span class="badge text-bg-light fs-6">
                                    <i class="fas fa-id-card me-1"></i>
                                    <?= esc($customer['account_number']) ?>
                                </span>

                            </div>


                            <div>

                                <?php
                                $statusClass = match ($customer['status']) {
                                    'active' => 'text-bg-success',
                                    'inactive' => 'text-bg-secondary',
                                    'suspended' => 'text-bg-danger',
                                    default => 'text-bg-secondary',
                                };
                                ?>

                                <span class="badge <?= $statusClass ?> fs-6 px-3 py-2">

                                    <i class="fas fa-circle-check me-1"></i>

                                    <?= esc(ucfirst($customer['status'])) ?>

                                </span>

                            </div>

                        </div>


                        <hr>


                        <!-- Account Information -->
                        <h5 class="fw-bold text-primary-custom mt-4 mb-3">

                            <i class="fas fa-id-card me-2"></i>
                            Account Information

                        </h5>


                        <div class="row g-4">

                            <div class="col-md-4">

                                <small class="text-muted d-block">
                                    Customer ID
                                </small>

                                <span class="fw-semibold">
                                    <?= esc($customer['id']) ?>
                                </span>

                            </div>


                            <div class="col-md-4">

                                <small class="text-muted d-block">
                                    Account Number
                                </small>

                                <span class="fw-semibold">
                                    <?= esc($customer['account_number']) ?>
                                </span>

                            </div>


                            <div class="col-md-4">

                                <small class="text-muted d-block">
                                    Meter Number
                                </small>

                                <span class="fw-semibold">
                                    <?= esc($customer['meter_number']) ?>
                                </span>

                            </div>

                        </div>


                        <hr class="my-4">


                        <!-- Customer Information -->
                        <h5 class="fw-bold text-primary-custom mb-3">

                            <i class="fas fa-user me-2"></i>
                            Customer Information

                        </h5>


                        <div class="row g-4">

                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Customer Name
                                </small>

                                <span class="fw-semibold">
                                    <?= esc($customer['customer_name']) ?>
                                </span>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Address
                                </small>

                                <span class="fw-semibold">
                                    <?= esc($customer['address']) ?>
                                </span>

                            </div>

                        </div>


                        <hr class="my-4">


                        <!-- Contact Information -->
                        <h5 class="fw-bold text-primary-custom mb-3">

                            <i class="fas fa-address-book me-2"></i>
                            Contact Information

                        </h5>


                        <div class="row g-4">

                            <div class="col-md-6">

                                <small class="text-muted d-block mb-1">
                                    Phone
                                </small>

                                <span class="fw-semibold">

                                    <i class="fas fa-phone me-2 text-muted"></i>

                                    <?= !empty($customer['phone'])
                                        ? esc($customer['phone'])
                                        : 'Not provided' ?>

                                </span>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block mb-1">
                                    Email
                                </small>

                                <span class="fw-semibold">

                                    <i class="fas fa-envelope me-2 text-muted"></i>

                                    <?= !empty($customer['email'])
                                        ? esc($customer['email'])
                                        : 'Not provided' ?>

                                </span>

                            </div>

                        </div>


                        <hr class="my-4">


                        <!-- Connection Details -->
                        <h5 class="fw-bold text-primary-custom mb-3">

                            <i class="fas fa-plug me-2"></i>
                            Connection Details

                        </h5>


                        <div class="row g-4">

                            <div class="col-md-6">

                                <small class="text-muted d-block mb-2">
                                    Connection Type
                                </small>

                                <?php
                                $typeClass = match ($customer['connection_type']) {
                                    'residential' => 'text-bg-primary',
                                    'commercial' => 'text-bg-warning',
                                    'industrial' => 'text-bg-dark',
                                    default => 'text-bg-secondary',
                                };
                                ?>

                                <span class="badge <?= $typeClass ?> fs-6">

                                    <?= esc(ucfirst($customer['connection_type'])) ?>

                                </span>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block mb-2">
                                    Account Status
                                </small>

                                <span class="badge <?= $statusClass ?> fs-6">

                                    <?= esc(ucfirst($customer['status'])) ?>

                                </span>

                            </div>

                        </div>


                        <hr class="my-4">


                        <!-- Record Information -->
                        <h5 class="fw-bold text-primary-custom mb-3">

                            <i class="fas fa-clock me-2"></i>
                            Record Information

                        </h5>


                        <div class="row g-4">

                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Created At
                                </small>

                                <span class="fw-semibold">
                                    <?= esc($customer['created_at']) ?>
                                </span>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Last Updated
                                </small>

                                <span class="fw-semibold">
                                    <?= esc($customer['updated_at']) ?>
                                </span>

                            </div>

                        </div>


                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2 mt-5">

                            <a
                                href="<?= base_url('dashboard') ?>"
                                class="btn btn-outline-secondary btn-lg">
                                <i class="fas fa-arrow-left me-2"></i>
                                Back
                            </a>


                            <a
                                href="<?= base_url('customers/edit/' . $customer['id']) ?>"
                                class="btn btn-primary btn-lg">
                                <i class="fas fa-pen me-2"></i>
                                Edit Customer
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?= $this->endSection() ?>