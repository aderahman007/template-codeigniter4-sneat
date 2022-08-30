<div class="modal fade" id="modal_edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Update Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form_edit">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= encrypt_url($users['id']); ?>">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div class="card mb-3">
                                <div class="d-flex justify-content-center gap-4 mt-2">
                                    <img src="<?= base_url('writable/images/profile/' . $users['foto']); ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="foto_show" />
                                    <div class="button-wrapper">
                                        <label for="foto" class="btn btn-primary me-2 my-4" tabindex="0">
                                            <span class="d-none d-sm-block">Tambah Foto</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" name="foto" id="foto" class="account-file-input" hidden accept="image/png, image/jpeg, image/jpg" />
                                        </label>

                                        <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Max size of 2Mb</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label" for="nama">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= $users['nama']; ?>" />
                            <div class="invalid-feedback" id="error_nama"></div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label" for="username">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" name="username" id="username" placeholder="Username" value="<?= $users['username']; ?>" />
                            <div class="invalid-feedback" id="error_username"></div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Email" value="<?= $users['email']; ?>" />
                            <div class="invalid-feedback" id="error_email"></div>
                        </div>
                    </div>
                    <div class="row mb-2">
<<<<<<< HEAD
                        <label class="col-sm-2 col-form-label" for="telepon">Telepon</label>
                        <div class="col-sm-10">
                            <input type="telepon" class="form-control form-control-sm" name="telepon" id="telepon" placeholder="Telepon" onkeypress="return hanyaAngka(event)" />
                            <div class="invalid-feedback" id="error_telepon"></div>
                        </div>
                    </div>
                    <div class="row mb-2">
=======
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
                        <label class="col-sm-2 col-form-label" for="password">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="***********" />
                            <div class="invalid-feedback" id="error_password"></div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label" for="ulangi_password">Ulangi Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control form-control-sm" name="ulangi_password" id="ulangi_password" placeholder="***********" />
                            <div class="invalid-feedback" id="error_ulangi_password"></div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label" for="hak_akses">Hak Akses</label>
                        <div class="col-sm-10">
                            <select class="form-select form-select-sm" id="hak_akses" name="hak_akses" aria-label="Hak Akses">
                                <option value="" selected>Piih Hak Akses</option>
                                <option value="admin" <?= ($users['hak_akses'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="user" <?= ($users['hak_akses'] == 'user') ? 'selected' : ''; ?>>User</option>
                            </select>
                            <div class="invalid-feedback" id="error_hak_akses"></div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label" for="status">Status</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input name="status" class="form-check-input status" type="radio" value="aktif" id="status_aktif" <?= ($users['status'] == 'aktif') ? 'checked' : ''; ?> />
                                <label class="form-check-label" for="status_aktif"> Aktif </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="status" class="form-check-input status" type="radio" value="tidak_aktif" id="status_tidak_aktif" <?= ($users['status'] == 'tidak_aktif') ? 'checked' : ''; ?> />
                                <label class="form-check-label" for="status_tidak_aktif"> Tidak Aktif </label>
                                <div class="invalid-feedback d-inline error_status"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm btn-simpan" onclick="update()">Update User</button>
            </div>
        </div>
    </div>
</div>