$('input').on('focusin', function () {
    $('.btn-simpan').removeAttr('disabled');
});
$('textarea').on('focusin', function () {
    $('.btn-simpan').removeAttr('disabled');
});

function update() {
    event.preventDefault();
    const data = $('#form-edit').serialize();
    console.log(data);
  $.ajax({
    type: "post",
    url: site_url + "admin/sistem/update",
    data: data,
    dataType: "json",
    beforeSend: function () {
      $(".btn-simpan").html('<div class="spinner-border spinner-border-sm text-danger" role="status"><span class="visually-hidden">Loading...</span></div> Loading...');
      $(".btn-cencel").hide(100);
      $(".btn-simpan").attr("disabled", true);
    },
    complete: function () {
      $(".btn-simpan").removeAttr("disabled");
      $(".btn-cencel").show(100);
      $(".btn-simpan").html("Save Changes");
    },
    error: function (xhr, ajaxOptions, thrownerror) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
    },
      success: function (response) {
        console.log(response);
      if (response.error) {
        if (response.error.nama) {
          $("#nama").addClass("is-invalid");
          $(".error_nama").html(response.error.nama);
        } else {
          $("#nama").removeClass("is-invalid");
          $(".error_nama").html("");
        }
        // if (response.error.owner) {
        //   $("#owner").addClass("is-invalid");
        //   $(".error_owner").html(response.error.owner);
        // } else {
        //   $("#owner").removeClass("is-invalid");
        //   $(".error_owner").html("");
        // }
        if (response.error.telpon) {
          $("#telpon").addClass("is-invalid");
          $(".error_telpon").html(response.error.telpon);
        } else {
          $("#telpon").removeClass("is-invalid");
          $(".error_telpon").html("");
        }
        if (response.error.email) {
          $("#email").addClass("is-invalid");
          $(".error_email").html(response.error.email);
        } else {
          $("#email").removeClass("is-invalid");
          $(".error_email").html("");
        }
        // if (response.error.alamat) {
        //   $("#alamat").addClass("is-invalid");
        //   $(".error_alamat").html(response.error.alamat);
        // } else {
        //   $("#alamat").removeClass("is-invalid");
        //   $(".error_alamat").html("");
        // }
        // if (response.error.running_text) {
        //   $("#running_text").addClass("is-invalid");
        //   $(".error_running_text").html(response.error.running_text);
        // } else {
        //   $("#running_text").removeClass("is-invalid");
        //   $(".error_running_text").html("");
        // }
        if (response.error.tentang) {
          $("#tentang").addClass("is-invalid");
          $(".error_tentang").html(response.error.tentang);
        } else {
          $("#tentang").removeClass("is-invalid");
          $(".error_tentang").html("");
        }
      } else {
        Swal.fire({
          title: "Berhasil!",
          text: response.message,
          icon: "success",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    },
    error: function (xhr, ajaxOptions, thrownerror) {
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

$('#form-logo').on('change', function () {
    save_logo_favicon('#form-logo');
});
$('#form-favicon').on('change', function () {
    save_logo_favicon('#form-favicon');
});

function save_logo_favicon(selector) {
    const form = $(selector)[0];
    const data = new FormData(form);
    console.log(...data);
  $.ajax({
    type: "post",
    url: site_url + "admin/sistem/save_logo_favicon",
    data: data,
    enctype: "multipart/form-data",
    processData: false,
    contentType: false,
    cache: false,
    async:false,
    dataType: "json",
    success: function (response) {
      console.log(response);
      if (response.error) {
        Swal.fire({
          title: "Gagal!",
          text: response.error.message,
          icon: "error",
          showConfirmButton: false,
          timer: 1500,
        });
      } else {
        Swal.fire({
          title: "Berhasil!",
          text: response.message,
          icon: "success",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    },
  });
}

function readURLLogo(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#logo_show").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#logo").change(function () {
  readURLLogo(this);
});

function readURLFavicon(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#favicon_show").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#favicon").change(function () {
  readURLFavicon(this);
});