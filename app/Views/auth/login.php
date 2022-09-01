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
    <h4 class="mb-2">Welcome to <?= ucwords(sistem()->nama); ?>! 👋</h4>
    <p class="mb-4">Please sign-in to your account and start the adventure</p>

    <form id="form-login" class="mb-3" action="#" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email or Username</label>
        <input type="text" class="form-control form-control-sm" id="email_username" name="email_username" placeholder="Enter your email or username" autofocus />
        <div class="invalid-feedback d-inline" id="error_email_username"></div>
      </div>
      <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
          <label class="form-label" for="password">Password</label>
          <a href="<?= site_url('auth/forgot'); ?>">
            <small>Forgot Password?</small>
          </a>
        </div>
        <div class="input-group input-group-merge">
          <input type="password" id="password" class="form-control form-control-sm" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
          <div class="invalid-feedback d-inline" id="error_password"></div>
        </div>
      </div>
      <div class="mb-3">
        <button class="btn btn-primary btn-sm w-100 btn-login" type="submit">Sign in</button>
      </div>
    </form>

    <p class="text-center">
      <span>New on our platform?</span>
      <a href="<?= site_url('auth/register'); ?>">
        <span>Create an account</span>
      </a>
    </p>
  </div>
</div>
<?= $this->endSection(); ?>