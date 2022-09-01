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
    <h4 class="mb-2">Adventure starts here 🚀</h4>
    <!-- <p class="mb-4">Make your app management easy and fun!</p> -->

    <form id="form-register" class="mb-3" action="#" method="POST">
      <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Full Name</label>
        <input type="text" class="form-control form-control-sm" id="nama_lengkap" name="nama_lengkap" placeholder="Enter your fullname" autofocus />
        <div class="invalid-feedback d-inline" id="error_nama_lengkap"></div>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Enter your username" autofocus />
        <div class="invalid-feedback d-inline" id="error_username"></div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Enter your email" />
        <div class="invalid-feedback d-inline" id="error_email"></div>
      </div>
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

      <div class="mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="terms" name="terms" />
          <label class="form-check-label" for="terms">
            I agree to
            <a href="javascript:void(0);">privacy policy & terms</a>
          </label><br>
          <div class="invalid-feedback d-inline" id="error_terms"></div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-sm w-100 btn-register">Sign up</button>
    </form>

    <p class="text-center">
      <span>Already have an account?</span>
      <a href="<?= site_url('auth/login'); ?>">
        <span>Sign in instead</span>
      </a>
    </p>
  </div>
</div>
<?= $this->endSection(); ?>