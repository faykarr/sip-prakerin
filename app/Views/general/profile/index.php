<!-- Extend template -->
<?= $this->extend('layouts/template') ?>

<!-- Section body -->
<?= $this->section('body') ?>

<!-- Content -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Change Password</h3>
                <p class="text-subtitle text-muted">
                    Hello, Welcome
                    <?= $first_name . " " . $last_name ?> !
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="<?= base_url("/dashboard") ?>">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="row section justify-content-around">
        <div class="col-sm-3 d-flex flex-column mb-3">
            <img src="<?= base_url("/assets/compiled/jpg/2.jpg") ?>" alt="Profile Picture" class="rounded-4 shadow" width="100%" />
            <!-- Change profile pciture button -->
            <div class="d-flex justify-content-center mt-3">
                <button type="button" class="btn btn-outline-primary btn-sm text-muted" disabled>
                    <i class="fa-solid fa-camera"></i>
                    Under development
                </button>
            </div>
        </div>

        <div class="col-sm-7">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h4 class="card-title">
                            <i class="fa-solid fa-lock me-1"></i>
                            Change Password
                        </h4>
                    </div>
                    <hr class="mb-0">
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    <form class="form" action="<?= base_url("/profile/changePassword") ?>" method="post">
                        <div class="col-12">
                            <?php $old_password = (session()->getFlashdata('old_password')) ? 'is-invalid' : '' ?>
                            <h6>Old password</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control <?= $old_password ?>"
                                    placeholder="Input your old password" name="old_password"
                                    value="<?= old('old_password') ?>" autofocus>
                                <?php if (session()->getFlashdata('old_password')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('old_password') ?>
                                    </div>
                                <?php endif; ?>
                                <div class="form-control-icon">
                                    <i class="fa-solid fa-user-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <?php $new_password = (session()->getFlashdata('new_password')) ? 'is-invalid' : '' ?>
                            <h6>New password</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control <?= $new_password ?>"
                                    placeholder="Input a new password" name="new_password"
                                    value="<?= old('new_password') ?>">
                                <?php if (session()->getFlashdata('new_password')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('new_password') ?>
                                    </div>
                                <?php endif; ?>
                                <div class="form-control-icon">
                                    <i class="fa-solid fa-lock-open"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <?php $confirm_password = (session()->getFlashdata('confirm_password')) ? 'is-invalid' : '' ?>
                            <h6>Confirm new password</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control <?= $confirm_password ?>"
                                    placeholder="Confirm a new password" name="confirm_password"
                                    value="<?= old('confirm_password') ?>">
                                <?php if (session()->getFlashdata('confirm_password')): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('confirm_password') ?>
                                    </div>
                                <?php endif; ?>
                                <div class="form-control-icon">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-12 justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Section -->
</div>
<!-- End body -->

<!-- End Section -->
<?= $this->endSection() ?>