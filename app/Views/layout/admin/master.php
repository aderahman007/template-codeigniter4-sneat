<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title><?= (isset($title) && $title != '') ? $title . ' || ' . sistem()->nama : sistem()->nama ?></title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url('writable/images/sistem/' . sistem()->favicon) ?>" type="image/x-icon">
  <link rel="icon" href="<?= base_url('writable/images/sistem/' . sistem()->favicon) ?>" type="image/x-icon">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/sweetalert2/dist/sweetalert2.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/datatables/datatables.min.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="<?= base_url() ?>/assets/admin/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?= base_url() ?>/assets/admin/js/config.js"></script>

  <!-- Mapbox -->
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <!-- Summernote -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?= $this->include('layout/admin/sidebar');; ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <?= $this->include('layout/admin/navbar');; ?>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <?= $this->renderSection('content') ?>
          </div>
        </div>
        <!-- / Content -->

        <!-- Modal -->
        <div class="view_modal"></div>
        <!-- /Modal -->

        <!-- Footer -->
        <footer class="content-footer text-center footer bg-footer-theme">
          <div class="container-xxl py-2">
            <div class="mb-2 mb-md-0">
              © <?= date('Y') . ' || ' . sistem()->nama; ?>
            </div>
          </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?= base_url() ?>/assets/admin/vendor/libs/jquery/jquery.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/libs/popper/popper.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/js/bootstrap.js"></script>
  <script src="<?= base_url() ?>/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="<?= base_url() ?>/assets/admin/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?= base_url() ?>/assets/admin/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="<?= base_url() ?>/assets/admin/js/main.js"></script>

  <!-- Page JS -->
  <script src="<?= base_url() ?>/assets/admin/js/dashboards-analytics.js"></script>
  <!-- Sweetalert 2 -->
  <script src="<?= base_url() ?>/assets/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/datatables/datatables.min.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <script>
    var base_url = '<?= base_url(); ?>';
    var site_url = '<?= site_url(); ?>';
  </script>

  <script src="<?= base_url(); ?>/app/helper.js"></script>

  <?php if (isset($js) && !empty($js)) : ?>
    <script src="<?= base_url('app/' . $js); ?>"></script>
  <?php endif; ?>

  <script>
    function detail(id) {
      $.ajax({
        type: "post",
        url: site_url + "admin/users/detail",
        data: {
          id: id,
        },
        dataType: "json",
        success: function(response) {
          $(".view_modal").html(response.message);
          let myModal = new bootstrap.Modal(
            document.getElementById("modal_detail"), {
              keyboard: false,
            }
          );
          myModal.show();
        },
        error: function(xhr, ajaxOptions, thrownerror) {
          Swal.fire({
            title: "Maaf gagal load data!",
            html: `Silahkan Cek kembali Kode Error: <strong>${
          xhr.status + "\n"
        }</strong> `,
            icon: "error",
            showConfirmButton: false,
            timer: 3100,
          });
        },
      });
    }

    function change_password() {
      const data = $("#form_change_password").serialize();
      $.ajax({
        type: "post",
        url: site_url + "users/change_password",
        data: data,
        dataType: "json",
        beforeSend: function() {
          $(".btn_change_password").html(
            '<div class="spinner-border spinner-border-sm text-danger" role="status"><span class="visually-hidden">Loading...</span></div> Loading...'
          );
          $(".btn_close").hide(100);
          $(".btn_change_password").attr("disabled", true);
        },
        complete: function() {
          $(".btn_change_password").removeAttr("disabled");
          $(".btn_close").show(100);
          $(".btn_change_password").html("Ubah Password");
        },
        error: function(xhr, ajaxOptions, thrownerror) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
        },
        success: function(response) {
          if (response.error) {
            if (response.error.password_lama) {
              $("#password_lama").addClass("is-invalid");
              $("#error_password_lama").html(response.error.password_lama);
            } else {
              $("#password_lama").removeClass("is-invalid");
              $("#error_password_lama").html("");
            }
            if (response.error.password) {
              $("#password").addClass("is-invalid");
              $("#error_password").html(response.error.password);
            } else {
              $("#password").removeClass("is-invalid");
              $("#error_password").html("");
            }
            if (response.error.ulangi_password) {
              $("#ulangi_password").addClass("is-invalid");
              $("#error_ulangi_password").html(response.error.ulangi_password);
            } else {
              $("#ulangi_password").removeClass("is-invalid");
              $("#error_ulangi_password").html("");
            }
          } else {
            $("#modal_change_password").modal("hide");
            Swal.fire({
              title: "Berhasil!",
              text: response.message,
              icon: "success",
              showConfirmButton: false,
              timer: 2100,
            });
          }
        },
        error: function(xhr, ajaxOptions, thrownerror) {
          Swal.fire({
            title: "Maaf data gagal di ubah!",
            html: `Silahkan Cek kembali Kode Error: <strong>${
          xhr.status + "\n"
        }</strong> `,
            icon: "error",
            showConfirmButton: false,
            timer: 2100,
          });
        },
      });
    }

    function logout() {
      event.preventDefault();
      Swal.fire({
        title: 'Anda yakin ingin logout?',
        text: "Anda akan logout dari sistem dan anda bisa login kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Logout!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: 'post',
            url: site_url + 'auth/logout',
            dataType: "json",
            error: function(xhr, ajaxOptions, thrownerror) {
              alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownerror);
            },
            success: function(response) {
              if (response.status == 200) {
                Swal.fire({
                  title: "Berhasil!",
                  text: response.message,
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1800
                });
                setTimeout(function() {
                  window.location.href = site_url
                }, 1500);
              } else {
                Swal.fire({
                  title: "Gagal!",
                  text: 'Terjadi kesalahan server1',
                  icon: "error",
                  showConfirmButton: false,
                  timer: 2100
                });
              }
            },
            error: function(xhr, ajaxOptions, thrownerror) {
              Swal.fire({
                title: "Maaf Kelasalahan Server!",
                html: `Silahkan Cek kembali Kode Error: <strong>${(xhr.status + "\n")}</strong> `,
                icon: "error",
                showConfirmButton: false,
                timer: 2100
              });
            }
          });
        }

      });
    }
  </script>
</body>

</html>