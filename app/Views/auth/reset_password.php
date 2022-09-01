<?php $this->extend('layout/auth/master') ?>
<?php $this->section('content') ?>
<div class="card">
  <div class="card-body">
    <!-- Logo -->
    <div class="app-brand justify-content-center">
      <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-logo demo">
          <img src="<?= base_url() ?>/writable/images/sistem/<?= sistem()->logo; ?>" alt="" width="30px" height="50px">
        </span>
        <span class="app-brand-text demo text-body fw-bolder"><?= strtoupper(sistem()->nama); ?></span>
      </a>
    </div>
    <!-- /Logo -->
    <h4 class="mb-2">Reset Password? 🔒</h4>
    <p class="mb-4">Please reset your password here!</p>
    <form id="form-reset" class="mb-3" action="#" method="POST">
      <input type="hidden" name="token" value="<?= $token; ?>">
      <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
          <input type="password" id="password" class="form-control form-control-sm" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
          <div class="invalid-feedback d-inline" id="error_password"></div>
        </div>
      </div>
      <div class="mb-3 form-password-toggle">
        <label class="form-label" for="ulangi_password">Repeet Your Password</label>
        <div class="input-group input-group-merge">
          <input type="password" id="ulangi_password" class="form-control form-control-sm" name="ulangi_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="ulangi_password" />
          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
          <div class="invalid-feedback d-inline" id="error_ulangi_password"></div>
        </div>
      </div>
      <button class="btn btn-primary btn-sm w-100 btn-reset">Save Password</button>
    </form>
    <div class="text-center">
      <a href="<?= site_url('auth/login'); ?>" class="d-flex align-items-center justify-content-center">
        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
        Back to login
      </a>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>