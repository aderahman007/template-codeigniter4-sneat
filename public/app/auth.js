$(document).ready(function () {
  register();
  login();
  forgot();
  reset();
});

function register() {
  $("#form-register").submit(function (e) {
    e.preventDefault();
    const data = $(this).serialize();
    $.ajax({
      type: "post",
      url: site_url + "auth/register",
      data: data,
      dataType: "json",
      beforeSend: function () {
        $(".btn-register").html(
          '<div class="spinner-border spinner-border-sm text-danger" role="status"><span class="visually-hidden">Loading...</span></div> LOADING...'
        );
        $(".btn-register").attr("disabled", true);
      },
      complete: function () {
        $(".btn-register").removeAttr("disabled");
        $(".btn-register").html("Sign Up");
      },
      error: function (xhr, ajaxOptions, thrownerror) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
      },
      success: function (response) {
        if (response.error) {
          if (response.error.nama_lengkap) {
            $("#nama_lengkap").addClass("is-invalid");
            $("#error_nama_lengkap").html(response.error.nama_lengkap);
          } else {
            $("#nama_lengkap").removeClass("is-invalid");
            $("#error_nama_lengkap").html("");
          }
          if (response.error.username) {
            $("#username").addClass("is-invalid");
            $("#error_username").html(response.error.username);
          } else {
            $("#username").removeClass("is-invalid");
            $("#error_username").html("");
          }
          if (response.error.email) {
            $("#email").addClass("is-invalid");
            $("#error_email").html(response.error.email);
          } else {
            $("#email").removeClass("is-invalid");
            $("#error_email").html("");
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
          if (response.error.terms) {
            $("#terms").addClass("is-invalid");
            $("#error_terms").html(response.error.terms);
          } else {
            $("#terms").removeClass("is-invalid");
            $("#error_terms").html("");
          }
          
        } else {
          Swal.fire({
            title: "Berhasil!",
            text: response.message,
            icon: "success",
            showConfirmButton: false,
            timer: 1800,
          });
          setTimeout(() => {
            window.location.href = site_url + 'auth/login';
          }, 1500);
        }
      },
      error: function (xhr, ajaxOptions, thrownerror) {
        Swal.fire({
          title: "Maaf data gagal di muat!",
          html: `Silahkan Cek kembali Kode Error: <strong>${
            xhr.status + "\n"
          }</strong> `,
          icon: "error",
          showConfirmButton: false,
          timer: 2100,
        });
      },
    });
  });
}

function login() {
  $("#form-login").submit(function (e) {
    e.preventDefault();
    const data = $(this).serialize();
    $.ajax({
      type: "post",
      url: site_url + "auth/login",
      data: data,
      dataType: "json",
      beforeSend: function () {
        $(".btn-login").html(
          '<div class="spinner-border spinner-border-sm text-danger" role="status"><span class="visually-hidden">Loading...</span></div> LOADING...'
        );
        $(".btn-login").attr("disabled", true);
      },
      complete: function () {
        $(".btn-login").removeAttr("disabled");
        $(".btn-login").html("Sign In");
      },
      error: function (xhr, ajaxOptions, thrownerror) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
      },
      success: function (response) {
        if (response.error) {
          if (response.error.email_username) {
            $("#email_username").addClass("is-invalid");
            $(".error_email_username").html(response.error.email_username);
          } else {
            $("#email_username").removeClass("is-invalid");
            $(".error_email_username").html("");
          }
          if (response.error.password) {
            $("#password").addClass("is-invalid");
            $(".error_password").html(response.error.password);
          } else {
            $("#password").removeClass("is-invalid");
            $(".error_password").html("");
          }
        } else {
          if (response.status == 200) {
            Swal.fire({
              title: "Berhasil!",
              text: response.message,
              icon: "success",
              showConfirmButton: false,
              timer: 1800,
            });
            setTimeout(function () {
              window.location.href = response.direct;
            }, 1500);
          } else {
            Swal.fire({
              title: "Gagal!",
              text: response.message,
              icon: "error",
              showConfirmButton: false,
              timer: 2100,
            });
          }
        }
      },
      error: function (xhr, ajaxOptions, thrownerror) {
        Swal.fire({
          title: "Maaf Kelasalahan Server!",
          html: `Silahkan Cek kembali Kode Error: <strong>${
            xhr.status + "\n"
          }</strong> `,
          icon: "error",
          showConfirmButton: false,
          timer: 2100,
        });
      },
    });
  });
}

function forgot() {
  $("#form-forgot").submit(function (e) {
    e.preventDefault();
    const data = $(this).serialize();
    $.ajax({
      type: "post",
      url: site_url + "auth/forgot",
      data: data,
      dataType: "json",
      beforeSend: function () {
        $(".btn-forgot").html(
          '<div class="spinner-border spinner-border-sm text-danger" role="status"><span class="visually-hidden">Loading...</span></div> LOADING...'
        );
        $(".btn-forgot").attr("disabled", true);
      },
      complete: function () {
        $(".btn-forgot").removeAttr("disabled");
        $(".btn-forgot").html("Send Reset Link");
      },
      error: function (xhr, ajaxOptions, thrownerror) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
      },
      success: function (response) {
        if (response.error) {
          if (response.error.email) {
            $("#email").addClass("is-invalid");
            $("#error_email").html(response.error.email);
          } else {
            $("#email").removeClass("is-invalid");
            $("#error_email").html("");
          }
          
        } else {
          if (response.status == 200) {
            Swal.fire({
              title: "Berhasil!",
              text: response.message,
              icon: "success",
              showConfirmButton: true,
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = site_url + 'auth/login';
              }
            });
          } else {
            $('#alert-show').html(`
            <div class="alert alert-danger alert-dismissible" role="alert">
              `+response.message+`
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `).show(1000);
          }
        }
      },
      error: function (xhr, ajaxOptions, thrownerror) {
        Swal.fire({
          title: "Maaf Kelasalahan Server!",
          html: `Silahkan Cek kembali Kode Error: <strong>${
            xhr.status + "\n"
          }</strong> `,
          icon: "error",
          showConfirmButton: false,
          timer: 2100,
        });
      },
    });
  });
}

function reset() {
  $("#form-reset").submit(function (e) {
    e.preventDefault();
    const data = $(this).serialize();
    $.ajax({
      type: "post",
      url: site_url + "auth/reset",
      data: data,
      dataType: "json",
      beforeSend: function () {
        $(".btn-reset").html(
          '<div class="spinner-border spinner-border-sm text-danger" role="status"><span class="visually-hidden">Loading...</span></div> LOADING...'
        );
        $(".btn-reset").attr("disabled", true);
      },
      complete: function () {
        $(".btn-reset").removeAttr("disabled");
        $(".btn-reset").html("Save Password");
      },
      error: function (xhr, ajaxOptions, thrownerror) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
      },
      success: function (response) {
        if (response.error) {
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
          if (response.status == 200) {
            Swal.fire({
              title: "Berhasil!",
              text: response.message,
              icon: "success",
              showConfirmButton: true,
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = site_url + 'auth/login';
              }
            });
          } else {
            $('#alert-show').html(`
            <div class="alert alert-danger alert-dismissible" role="alert">
              `+response.message+`
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `).show(1000);
          }
        }
      },
      error: function (xhr, ajaxOptions, thrownerror) {
        Swal.fire({
          title: "Maaf Kelasalahan Server!",
          html: `Silahkan Cek kembali Kode Error: <strong>${
            xhr.status + "\n"
          }</strong> `,
          icon: "error",
          showConfirmButton: false,
          timer: 2100,
        });
      },
    });
  });
}
