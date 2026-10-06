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
                        style="width: 60px; height: 60px; font-size: 1.5rem;"
                    >
                        <i class="fas fa-user-plus"></i>
                    </div>

                    <div>

                        <h1 class="display-5 fw-bold mb-1">
                            Add Customer
                        </h1>

                        <p class="mb-0">
                            Create a new Puihaha Electric customer account.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                <a
                    href="<?= base_url('dashboard') ?>"
                    class="btn btn-outline-light"
                >
                    <i class="fas fa-arrow-left me-2"></i>
                    Back to Dashboard
                </a>

            </div>

        </div>

    </div>
</section>


<!-- Form Section -->
<section class="section-padding bg-light-custom">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-10">

                <div class="card">

                    <div class="card-body p-4 p-md-5">

                        <div class="mb-4">

                            <h2 class="fw-bold text-primary-custom mb-1">
                                Customer Account Information
                            </h2>

                            <p class="text-muted mb-0">
                                Enter the customer's account and contact details below.
                            </p>

                        </div>


                        <!-- Validation Errors -->
                        <?php if (session()->getFlashdata('errors')): ?>

                            <div class="alert alert-danger">

                                <div class="fw-semibold mb-2">
                                    <i class="fas fa-circle-exclamation me-2"></i>
                                    Please check the following:
                                </div>

                                <ul class="mb-0">

                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>

                                        <li>
                                            <?= esc($error) ?>
                                        </li>

                                    <?php endforeach; ?>

                                </ul>

                            </div>

                        <?php endif; ?>


                        <form
                            action="<?= base_url('customers/create') ?>"
                            method="post"
                        >

                            <?= csrf_field() ?>


                            <!-- Account Information -->
                            <h5 class="fw-bold text-primary-custom mt-4 mb-3">
                                <i class="fas fa-id-card me-2"></i>
                                Account Information
                            </h5>

                            <div class="row g-4">

                                <!-- Account Number -->
                                <div class="col-md-6">

                                    <label
                                        for="account_number"
                                        class="form-label fw-semibold"
                                    >
                                        Account Number
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control form-control-lg"
                                        id="account_number"
                                        name="account_number"
                                        value="<?= esc(old('account_number')) ?>"
                                        placeholder="EC-2024-0026"
                                        required
                                    >

                                    <div class="form-text">
                                        Must be unique.
                                    </div>

                                </div>


                                <!-- Meter Number -->
                                <div class="col-md-6">

                                    <label
                                        for="meter_number"
                                        class="form-label fw-semibold"
                                    >
                                        Meter Number
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control form-control-lg"
                                        id="meter_number"
                                        name="meter_number"
                                        value="<?= esc(old('meter_number')) ?>"
                                        placeholder="MTR-026"
                                    >

                                </div>

                            </div>


                            <hr class="my-4">


                            <!-- Customer Information -->
                            <h5 class="fw-bold text-primary-custom mb-3">
                                <i class="fas fa-user me-2"></i>
                                Customer Information
                            </h5>

                            <div class="row g-4">

                                <!-- Customer Name -->
                                <div class="col-12">

                                    <label
                                        for="customer_name"
                                        class="form-label fw-semibold"
                                    >
                                        Customer Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control form-control-lg"
                                        id="customer_name"
                                        name="customer_name"
                                        value="<?= esc(old('customer_name')) ?>"
                                        placeholder="Enter customer name"
                                        required
                                    >

                                </div>


                                <!-- Address -->
                                <div class="col-12">

                                    <label
                                        for="address"
                                        class="form-label fw-semibold"
                                    >
                                        Address
                                        <span class="text-danger">*</span>
                                    </label>

                                    <textarea
                                        class="form-control"
                                        id="address"
                                        name="address"
                                        rows="3"
                                        placeholder="Enter complete address"
                                        required
                                    ><?= esc(old('address')) ?></textarea>

                                </div>

                            </div>


                            <hr class="my-4">


                            <!-- Contact Information -->
                            <h5 class="fw-bold text-primary-custom mb-3">
                                <i class="fas fa-address-book me-2"></i>
                                Contact Information
                            </h5>

                            <div class="row g-4">

                                <!-- Phone -->
                                <div class="col-md-6">

                                    <label
                                        for="phone"
                                        class="form-label fw-semibold"
                                    >
                                        <i class="fas fa-phone me-1 text-muted"></i>
                                        Phone
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control form-control-lg"
                                        id="phone"
                                        name="phone"
                                        value="<?= esc(old('phone')) ?>"
                                        placeholder="555-0126"
                                    >

                                </div>


                                <!-- Email -->
                                <div class="col-md-6">

                                    <label
                                        for="email"
                                        class="form-label fw-semibold"
                                    >
                                        <i class="fas fa-envelope me-1 text-muted"></i>
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        class="form-control form-control-lg"
                                        id="email"
                                        name="email"
                                        value="<?= esc(old('email')) ?>"
                                        placeholder="customer@email.com"
                                    >

                                </div>

                            </div>


                            <hr class="my-4">


                            <!-- Connection Details -->
                            <h5 class="fw-bold text-primary-custom mb-3">
                                <i class="fas fa-plug me-2"></i>
                                Connection Details
                            </h5>

                            <div class="row g-4">

                                <!-- Connection Type -->
                                <div class="col-md-6">

                                    <label
                                        for="connection_type"
                                        class="form-label fw-semibold"
                                    >
                                        Connection Type
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select
                                        class="form-select form-select-lg"
                                        id="connection_type"
                                        name="connection_type"
                                        required
                                    >

                                        <option
                                            value="residential"
                                            <?= old('connection_type', 'residential') === 'residential' ? 'selected' : '' ?>
                                        >
                                            Residential
                                        </option>

                                        <option
                                            value="commercial"
                                            <?= old('connection_type') === 'commercial' ? 'selected' : '' ?>
                                        >
                                            Commercial
                                        </option>

                                        <option
                                            value="industrial"
                                            <?= old('connection_type') === 'industrial' ? 'selected' : '' ?>
                                        >
                                            Industrial
                                        </option>

                                    </select>

                                </div>


                                <!-- Status -->
                                <div class="col-md-6">

                                    <label
                                        for="status"
                                        class="form-label fw-semibold"
                                    >
                                        Status
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select
                                        class="form-select form-select-lg"
                                        id="status"
                                        name="status"
                                        required
                                    >

                                        <option
                                            value="active"
                                            <?= old('status', 'active') === 'active' ? 'selected' : '' ?>
                                        >
                                            Active
                                        </option>

                                        <option
                                            value="inactive"
                                            <?= old('status') === 'inactive' ? 'selected' : '' ?>
                                        >
                                            Inactive
                                        </option>

                                        <option
                                            value="suspended"
                                            <?= old('status') === 'suspended' ? 'selected' : '' ?>
                                        >
                                            Suspended
                                        </option>

                                    </select>

                                </div>

                            </div>


                            <!-- Buttons -->
                            <div class="d-flex justify-content-end gap-2 mt-5">

                                <a
                                    href="<?= base_url('dashboard') ?>"
                                    class="btn btn-outline-secondary btn-lg"
                                >
                                    <i class="fas fa-xmark me-2"></i>
                                    Cancel
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg"
                                >
                                    <i class="fas fa-user-plus me-2"></i>
                                    Save Customer
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?= $this->endSection() ?>