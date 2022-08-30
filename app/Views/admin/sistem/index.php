<?= $this->extend('layout/admin/master') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header"><?= (isset($title)) ? $title : ''; ?></h5>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="<?= base_url('writable/images/sistem/' . $sistem['logo']); ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="logo_show" />
                    <div class="button-wrapper">
                        <form action="" method="post" id="form-logo">
                            <label for="logo" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Ubah logo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="hidden" name="id" value="<?= encrypt_url($sistem['id']); ?>">
                                <input type="hidden" name="tipe" value="logo">
                                <input type="file" name="logo" id="logo" class="account-file-input" hidden accept="image/png, image/jpeg, image/jpg" />
                            </label>

                            <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Max size of 2Mb</p>
                        </form>
                    </div>

                    <img src="<?= base_url('writable/images/sistem/' . $sistem['favicon']); ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="favicon_show" />
                    <div class="button-wrapper">
                        <form action="" method="post" id="form-favicon">
                            <label for="favicon" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Ubah favicon</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="hidden" name="id" value="<?= encrypt_url($sistem['id']); ?>">
                                <input type="hidden" name="tipe" value="favicon">
                                <input type="file" name="favicon" id="favicon" class="account-file-input" hidden accept="image/png, image/ico, image/x-icon" />
                            </label>

                            <p class="text-muted mb-0">Allowed ICO, PNG. Max size of 800Kb (32pxx32px)</p>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <form action="" method="POST" id="form-edit">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= encrypt_url($sistem['id']); ?>">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama Aplikasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Aplikasi" value="<?= $sistem['nama']; ?>" />
                            <div class="invalid-feedback error_nama"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="email">email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="email" value="<?= $sistem['email']; ?>" />
                            <div class="invalid-feedback error_email"></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="telpon">Nomor Telpon</label>
                        <div class="col-sm-10">
                            <input type="text" name="telpon" id="telpon" class="form-control phone-mask" placeholder="Nomor Telpon" aria-label="Nomor Telpon" aria-describedby="telpon" value="<?= $sistem['telpon']; ?>" />
                            <div class="invalid-feedback error_telpon"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tentang">Tentang Aplikasi</label>
                        <div class="col-sm-10">
                            <textarea id="tentang" name="tentang" class="form-control" rows="5" placeholder="Tentang aplikasi ..." aria-label="Tentang aplikasi ..." aria-describedby="basic-icon-default-message2"><?= $sistem['tentang']; ?></textarea>
                            <div class="invalid-feedback error_tentang"></div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary btn-sm me-2 btn-simpan" onclick="update()" disabled>Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary btn-sm btn-cencel">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>

    </div>
</div>
<?= $this->endSection() ?>