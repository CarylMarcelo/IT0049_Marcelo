<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<section class="hero-section py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">

                <i class="fas fa-user-shield fa-3x text-warning mb-3"></i>

                <h1 class="display-5 fw-bold mb-3">
                    Account Login
                </h1>

                <p class="lead mb-0">
                    Sign in to access the Puihaha Electric customer management system.
                </p>

            </div>
        </div>
    </div>
</section>


<section class="section-padding bg-light-custom">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7">

                <div class="card">

                    <div class="card-body p-4 p-md-5">

                        <div class="text-center mb-4">

                            <div class="feature-icon">
                                <i class="fas fa-bolt"></i>
                            </div>

                            <h2 class="fw-bold text-primary-custom">
                                Welcome Back
                            </h2>

                            <p class="text-muted mb-0">
                                Enter your account information below.
                            </p>

                        </div>


                        <?php if (session()->getFlashdata('error')): ?>

                            <div class="alert alert-danger" role="alert">
                                <i class="fas fa-circle-exclamation me-2"></i>

                                <?= esc(session()->getFlashdata('error')) ?>
                            </div>

                        <?php endif; ?>


                        <?php if (session()->getFlashdata('success')): ?>

                            <div class="alert alert-success" role="alert">
                                <i class="fas fa-circle-check me-2"></i>

                                <?= esc(session()->getFlashdata('success')) ?>
                            </div>

                        <?php endif; ?>


                        <form action="<?= base_url('login') ?>" method="post">

                            <?= csrf_field() ?>


                            <div class="mb-4">

                                <label
                                    for="username"
                                    class="form-label fw-semibold"
                                >
                                    <i class="fas fa-user me-2 text-primary-custom"></i>
                                    Username
                                </label>

                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    id="username"
                                    name="username"
                                    value="<?= esc(old('username')) ?>"
                                    placeholder="Enter your username"
                                    required
                                    autofocus
                                >

                            </div>


                            <div class="mb-4">

                                <label
                                    for="password"
                                    class="form-label fw-semibold"
                                >
                                    <i class="fas fa-lock me-2 text-primary-custom"></i>
                                    Password
                                </label>

                                <input
                                    type="password"
                                    class="form-control form-control-lg"
                                    id="password"
                                    name="password"
                                    placeholder="Enter your password"
                                    required
                                >

                            </div>


                            <div class="d-grid">

                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg"
                                >
                                    <i class="fas fa-right-to-bracket me-2"></i>
                                    Login
                                </button>

                            </div>

                        </form>


                        <hr class="my-4">


                        <div class="text-center">

                            <p class="text-muted mb-0">
                                Don't have an account?

                                <a
                                    href="<?= base_url('register') ?>"
                                    class="text-primary-custom fw-semibold text-decoration-none"
                                >
                                    Register
                                </a>
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?= $this->endSection() ?>