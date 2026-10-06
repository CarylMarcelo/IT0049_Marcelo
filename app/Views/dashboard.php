<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- Dashboard Header -->
<section class="hero-section py-5">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <div class="d-flex align-items-center mb-3">

                    <div class="feature-icon m-0 me-3"
                        style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fas fa-gauge-high"></i>
                    </div>

                    <div>
                        <h1 class="display-5 fw-bold mb-0">
                            Customer Dashboard
                        </h1>

                        <p class="mb-0">
                            Manage Puihaha Electric customer accounts.
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                <p class="mb-2">
                    <i class="fas fa-user me-2"></i>
                    Welcome, <strong><?= esc($username) ?></strong>
                </p>

                <form action="<?= base_url('logout') ?>" method="post">
                    <?= csrf_field() ?>

                    <button type="submit" class="btn btn-outline-light">
                        <i class="fas fa-right-from-bracket me-2"></i>
                        Logout
                    </button>
                </form>

            </div>

        </div>

    </div>
</section>


<!-- Dashboard Content -->
<section class="section-padding bg-light-custom">

    <div class="container">

        <!-- Dashboard Statistics -->
        <div class="row g-4 mb-5">

            <!-- Total Accounts -->
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-stat-card stat-total">

                    <div>
                        <h2 class="dashboard-stat-number">
                            <?= esc($totalAccounts) ?>
                        </h2>

                        <p class="dashboard-stat-label">
                            Total Accounts
                        </p>
                    </div>

                    <div class="dashboard-stat-icon">
                        <i class="fas fa-users"></i>
                    </div>

                </div>

            </div>


            <!-- Active Accounts -->
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-stat-card stat-active">

                    <div>
                        <h2 class="dashboard-stat-number">
                            <?= esc($activeAccounts) ?>
                        </h2>

                        <p class="dashboard-stat-label">
                            Active Accounts
                        </p>
                    </div>

                    <div class="dashboard-stat-icon">
                        <i class="fas fa-circle-check"></i>
                    </div>

                </div>

            </div>


            <!-- Inactive Accounts -->
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-stat-card stat-inactive">

                    <div>
                        <h2 class="dashboard-stat-number">
                            <?= esc($inactiveAccounts) ?>
                        </h2>

                        <p class="dashboard-stat-label">
                            Inactive Accounts
                        </p>
                    </div>

                    <div class="dashboard-stat-icon">
                        <i class="fas fa-user-clock"></i>
                    </div>

                </div>

            </div>


            <!-- Suspended Accounts -->
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-stat-card stat-suspended">

                    <div>
                        <h2 class="dashboard-stat-number">
                            <?= esc($suspendedAccounts) ?>
                        </h2>

                        <p class="dashboard-stat-label">
                            Suspended Accounts
                        </p>
                    </div>

                    <div class="dashboard-stat-icon">
                        <i class="fas fa-user-slash"></i>
                    </div>

                </div>

            </div>

        </div>

        <!-- Success Message -->
        <?php if (session()->getFlashdata('success')): ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <i class="fas fa-circle-check me-2"></i>

                <?= esc(session()->getFlashdata('success')) ?>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        <?php endif; ?>


        <!-- Error Message -->
        <?php if (session()->getFlashdata('error')): ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                <i class="fas fa-circle-exclamation me-2"></i>

                <?= esc(session()->getFlashdata('error')) ?>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        <?php endif; ?>


        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>

                <h2 class="fw-bold text-primary-custom mb-1">
                    Customer Accounts
                </h2>

                <p class="text-muted mb-0">
                    View and manage registered electricity customers.
                </p>

            </div>

            <a
                href="<?= base_url('customers/create') ?>"
                class="btn btn-primary">
                <i class="fas fa-user-plus me-2"></i>
                Add Customer
            </a>

        </div>


        <!-- Search / Filter Card -->
        <div class="card mb-4">

            <div class="card-body p-4">

                <h5 class="fw-bold mb-3">

                    <i class="fas fa-filter text-primary-custom me-2"></i>

                    Search & Filter

                </h5>


                <form method="get" action="<?= base_url('dashboard') ?>">

                    <div class="row g-3">

                        <!-- Search -->
                        <div class="col-lg-5">

                            <label
                                for="search"
                                class="form-label fw-semibold">
                                Search Customer
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="search"
                                    name="search"
                                    value="<?= esc($search ?? '') ?>"
                                    placeholder="Account, name, email, meter...">

                            </div>

                        </div>


                        <!-- Connection Type -->
                        <div class="col-lg-3">

                            <label
                                for="connection_type"
                                class="form-label fw-semibold">
                                Connection Type
                            </label>

                            <select
                                name="connection_type"
                                id="connection_type"
                                class="form-select">

                                <option value="">
                                    All Types
                                </option>

                                <option
                                    value="residential"
                                    <?= ($connectionType ?? '') === 'residential' ? 'selected' : '' ?>>
                                    Residential
                                </option>

                                <option
                                    value="commercial"
                                    <?= ($connectionType ?? '') === 'commercial' ? 'selected' : '' ?>>
                                    Commercial
                                </option>

                                <option
                                    value="industrial"
                                    <?= ($connectionType ?? '') === 'industrial' ? 'selected' : '' ?>>
                                    Industrial
                                </option>

                            </select>

                        </div>


                        <!-- Status -->
                        <div class="col-lg-2">

                            <label
                                for="status"
                                class="form-label fw-semibold">
                                Status
                            </label>

                            <select
                                name="status"
                                id="status"
                                class="form-select">

                                <option value="">
                                    All Status
                                </option>

                                <option
                                    value="active"
                                    <?= ($status ?? '') === 'active' ? 'selected' : '' ?>>
                                    Active
                                </option>

                                <option
                                    value="inactive"
                                    <?= ($status ?? '') === 'inactive' ? 'selected' : '' ?>>
                                    Inactive
                                </option>

                                <option
                                    value="suspended"
                                    <?= ($status ?? '') === 'suspended' ? 'selected' : '' ?>>
                                    Suspended
                                </option>

                            </select>

                        </div>


                        <!-- Buttons -->
                        <div class="col-lg-2 d-flex align-items-end gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary w-100">
                                <i class="fas fa-search me-1"></i>
                                Search
                            </button>

                            <a
                                href="<?= base_url('dashboard') ?>"
                                class="btn btn-outline-secondary">
                                <i class="fas fa-rotate-left"></i>
                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>


        <!-- Customer Table -->
        <div class="card">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <?php if (!empty($customers)): ?>

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">

                                <tr>

                                    <th class="px-4">ID</th>
                                    <th>Account Number</th>
                                    <th>Customer</th>
                                    <th>Contact</th>
                                    <th>Meter</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th class="text-center px-4">
                                        Actions
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                <?php foreach ($customers as $customer): ?>

                                    <tr>

                                        <td class="px-4 fw-semibold">
                                            <?= esc($customer['id']) ?>
                                        </td>


                                        <td>

                                            <span class="fw-semibold">
                                                <?= esc($customer['account_number']) ?>
                                            </span>

                                        </td>


                                        <td>

                                            <div class="fw-semibold">
                                                <?= esc($customer['customer_name']) ?>
                                            </div>

                                            <small class="text-muted">
                                                <?= esc($customer['address']) ?>
                                            </small>

                                        </td>


                                        <td>

                                            <?php if (!empty($customer['phone'])): ?>

                                                <div>
                                                    <i class="fas fa-phone me-1 text-muted"></i>
                                                    <?= esc($customer['phone']) ?>
                                                </div>

                                            <?php endif; ?>


                                            <?php if (!empty($customer['email'])): ?>

                                                <div>
                                                    <i class="fas fa-envelope me-1 text-muted"></i>
                                                    <?= esc($customer['email']) ?>
                                                </div>

                                            <?php endif; ?>

                                        </td>


                                        <td>
                                            <span class="badge text-bg-light">
                                                <?= esc($customer['meter_number']) ?>
                                            </span>
                                        </td>


                                        <td>

                                            <?php
                                            $typeClass = match ($customer['connection_type']) {
                                                'residential' => 'text-bg-primary',
                                                'commercial' => 'text-bg-warning',
                                                'industrial' => 'text-bg-dark',
                                                default => 'text-bg-secondary',
                                            };
                                            ?>

                                            <span class="badge <?= $typeClass ?>">

                                                <?= esc(ucfirst($customer['connection_type'])) ?>

                                            </span>

                                        </td>


                                        <td>

                                            <?php
                                            $statusClass = match ($customer['status']) {
                                                'active' => 'text-bg-success',
                                                'inactive' => 'text-bg-secondary',
                                                'suspended' => 'text-bg-danger',
                                                default => 'text-bg-secondary',
                                            };
                                            ?>

                                            <span class="badge <?= $statusClass ?>">

                                                <i class="
                                                    <?=
                                                    $customer['status'] === 'active'
                                                        ? 'fas fa-circle-check'
                                                        : 'fas fa-circle-exclamation'
                                                    ?>
                                                    me-1
                                                "></i>

                                                <?= esc(ucfirst($customer['status'])) ?>

                                            </span>

                                        </td>


                                        <!-- Actions -->
                                        <td class="text-center px-4">

                                            <div class="d-inline-flex gap-1">

                                                <a
                                                    href="<?= base_url('customers/view/' . $customer['id']) ?>"
                                                    class="btn btn-sm btn-outline-primary"
                                                    title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>


                                                <a
                                                    href="<?= base_url('customers/edit/' . $customer['id']) ?>"
                                                    class="btn btn-sm btn-outline-warning"
                                                    title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>


                                                <form
                                                    action="<?= base_url('customers/delete/' . $customer['id']) ?>"
                                                    method="post"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this customer account?');">

                                                    <?= csrf_field() ?>

                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    <?php else: ?>

                        <div class="text-center py-5">

                            <div class="feature-icon">

                                <i class="fas fa-users-slash"></i>

                            </div>

                            <h4 class="fw-bold">
                                No Customer Accounts Found
                            </h4>

                            <p class="text-muted mb-3">
                                Try changing your search or filter.
                            </p>

                            <a
                                href="<?= base_url('customers/create') ?>"
                                class="btn btn-primary">
                                <i class="fas fa-user-plus me-2"></i>
                                Add Customer
                            </a>

                        </div>

                    <?php endif; ?>

                </div>

            </div>


            <!-- Pagination -->
            <?php if (!empty($customers)): ?>

                <div class="card-footer bg-white border-0 py-3">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                        <small class="text-muted">
                            Showing customer accounts
                        </small>

                        <div>
                            <?= $pager->links() ?>
                        </div>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>

<?= $this->endSection() ?>