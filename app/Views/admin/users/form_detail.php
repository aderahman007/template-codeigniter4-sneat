<div class="modal fade" id="modal_detail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Detail Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <div class="card mb-3">
                            <div class="d-flex justify-content-center gap-4 mt-2">
                                <img src="<?= base_url('writable/images/profile/' . $users['foto']); ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="foto_show" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-2 col-form-label" for="nama">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <h6 class="card-title text-primary"><?= $users['nama']; ?></h6>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-2 col-form-label" for="username">Username</label>
                    <div class="col-sm-10">
                        <h6 class="card-title text-primary"><?= $users['username']; ?></h6>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10">
                        <h6 class="card-title text-primary"><?= $users['email']; ?></h6>
                    </div>
                </div>
                <div class="row mb-2">
<<<<<<< HEAD
                    <label class="col-sm-2 col-form-label" for="telepon">Telepon</label>
                    <div class="col-sm-10">
                        <h6 class="card-title text-primary"><?= $users['telepon']; ?></h6>
                    </div>
                </div>
                <div class="row mb-2">
=======
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                    <div class="col-sm-10">
                        <h6 class="card-title text-primary">************</h6>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-2 col-form-label" for="hak_akses">Hak Akses</label>
                    <div class="col-sm-10">
                        <?php 
                        if ($users['hak_akses'] == 'admin') {
                            $color = 'primary';
                            $label = 'Admin';
                        } else {
                            $color = 'info';
                            $label = $users['hak_akses'];
                        }
                        echo '<span class="badge rounded-pill bg-'.$color.'">'.$label.'</span>';
                        ?>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-2 col-form-label" for="status">Status</label>
                    <div class="col-sm-10">
                        <?php 
                        if ($users['status'] == 'aktif') {
                            $label_color = 'success';
                            $label = 'Aktif';
                        } else {
                            $label_color = 'danger';
                            $label = 'Tidak Aktif';
                        }
                        echo '<span class="badge rounded-pill bg-'.$label_color.'">'.$label.'</span>';
                        ?>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-target="#modal_change_password" data-bs-toggle="modal" data-bs-dismiss="modal">Ubah Password</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="view_modal_change_password">
    <div class="modal fade" id="modal_change_password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Password || <span class="text-primary"><?= $users['nama']; ?></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="form_change_password">
                    <div class="modal-body">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= encrypt_url($users['id']); ?>">
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label" for="password_lama">Password Lama</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control form-control-sm" name="password_lama" id="password_lama" placeholder="***********" />
                                <div class="invalid-feedback" id="error_password_lama"></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label" for="password">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="***********" />
                                <div class="invalid-feedback" id="error_password"></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label" for="ulangi_password">Ulangi Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control form-control-sm" name="ulangi_password" id="ulangi_password" placeholder="***********" />
                                <div class="invalid-feedback" id="error_ulangi_password"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm btn_close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm btn-simpan btn_change_password" onclick="change_password()">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>