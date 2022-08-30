$(document).ready(function () {
  loadData();
});

function readURLLogo(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#foto_show").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$(document).on("change", "#foto", function (e) {
  readURLLogo(this);
});

function loadData() {
  $("#datatables").DataTable({
    processing: true,
    serverSide: true,
    bDestroy: true,
    responsive: true,
    ajax: {
      url: site_url + "admin/users/datatables",
      type: "post",
    },
    order: [],
    columns: [
      {
        data: "no",
        orderable: false,
      },
      {
        data: "nama",
      },
      {
        data: "hak_akses",
      },
      {
        data: "status",
      },
      {
        data: "foto",
        render: function (data) {
          return (
            "<img src=" +
            site_url +
            "writable/images/profile/" +
            data +
            ' class="rounded-circle mx-auto d-block" alt="profile" id="profile" style="width: 50px; height: 50px; border-radius:50% !important">'
          );
        },
      },
      {
        data: "lasted_login",
      },
      {
        data: "option",
        orderable: false,
      },
    ],
    columnDefs: [
      {
        targets: [3, 4, 6],
        className: "align-middle",
      },
      {
        targets: [0],
        className: "align-middle text-center",
      },
      {
        targets: [1, 2, 5],
        className: "align-middle",
      },
    ],
    order: [[1, "desc"]],
    drawCallback: function (settings) {
      $('[data-toggle="tooltip"]').tooltip();
    },
  });
}

function add() {
  $.ajax({
    url: site_url + "admin/users/add",
    type: "post",
    dataType: "json",
    success: function (response) {
      $(".view_modal").html(response.message);
      let myModal = new bootstrap.Modal(document.getElementById("modal_add"), {
        keyboard: false,
      });
      myModal.show();
    },
    error: function (xhr, ajaxOptions, thrownerror) {
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

function store() {
  const form = $("#form_add")[0];
  const data = new FormData(form);
  $.ajax({
    type: "post",
    url: site_url + "admin/users/store",
    data: data,
    enctype: "multipart/form-data",
    processData: false,
    contentType: false,
    cache: false,
    dataType: "json",
    beforeSend: function () {
      $(".btn-simpan").html(
        '<div class="spinner-border spinner-border-sm text-danger" role="status"><span class="visually-hidden">Loading...</span></div> Loading...'
      );
      $(".btn-cencel").hide(100);
      $(".btn-simpan").attr("disabled", true);
    },
    complete: function () {
      $(".btn-simpan").removeAttr("disabled");
      $(".btn-cencel").show(100);
      $(".btn-simpan").html("Tambah User");
    },
    error: function (xhr, ajaxOptions, thrownerror) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
    },
    success: function (response) {
      if (response.error) {
        if (response.error.nama) {
          $("#nama").addClass("is-invalid");
          $("#error_nama").html(response.error.nama);
        } else {
          $("#nama").removeClass("is-invalid");
          $("#error_nama").html("");
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
        if (response.error.telepon) {
          $("#telepon").addClass("is-invalid");
          $("#error_telepon").html(response.error.telepon);
        } else {
          $("#telepon").removeClass("is-invalid");
          $("#error_telepon").html("");
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
        if (response.error.hak_akses) {
          $("#hak_akses").addClass("is-invalid");
          $("#error_hak_akses").html(response.error.hak_akses);
        } else {
          $("#hak_akses").removeClass("is-invalid");
          $("#error_hak_akses").html("");
        }
        if (response.error.status) {
          $(".status").addClass("is-invalid");
          $(".error_status").html(response.error.status);
        } else {
          $(".status").removeClass("is-invalid");
          $(".error_status").html("");
        }
        if (response.error.foto) {
          $("#foto").addClass("is-invalid");
          $("#error_foto").html(response.error.foto);
        } else {
          $("#foto").removeClass("is-invalid");
          $("#error_foto").html("");
        }
      } else {
        $("#modal_add").modal("hide");
        Swal.fire({
          title: "Berhasil!",
          text: response.message,
          icon: "success",
          showConfirmButton: false,
          timer: 2100,
        });
        loadData();
      }
    },
    error: function (xhr, ajaxOptions, thrownerror) {
      $("#modal_add").modal("hide");
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
}

function edit(id) {
  $.ajax({
    type: "post",
    url: site_url + "admin/users/edit",
    data: {
      id: id,
    },
    dataType: "json",
    success: function (response) {
      $(".view_modal").html(response.message);
      let myModal = new bootstrap.Modal(document.getElementById("modal_edit"), {
        keyboard: false,
      });
      myModal.show();
    },
    error: function (xhr, ajaxOptions, thrownerror) {
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

function update() {
  const form = $("#form_edit")[0];
  const data = new FormData(form);
  $.ajax({
    type: "post",
    url: site_url + "admin/users/update",
    data: data,
    enctype: "multipart/form-data",
    processData: false,
    contentType: false,
    cache: false,
    dataType: "json",
    beforeSend: function () {
      $(".btn-simpan").html(
        '<div class="spinner-border spinner-border-sm text-danger" role="status"><span class="visually-hidden">Loading...</span></div> Loading...'
      );
      $(".btn-cencel").hide(100);
      $(".btn-simpan").attr("disabled", true);
    },
    complete: function () {
      $(".btn-simpan").removeAttr("disabled");
      $(".btn-cencel").show(100);
      $(".btn-simpan").html("Update User");
    },
    error: function (xhr, ajaxOptions, thrownerror) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
    },
    success: function (response) {
      if (response.error) {
        if (response.error.nama) {
          $("#nama").addClass("is-invalid");
          $("#error_nama").html(response.error.nama);
        } else {
          $("#nama").removeClass("is-invalid");
          $("#error_nama").html("");
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
        if (response.error.telepon) {
          $("#telepon").addClass("is-invalid");
          $("#error_telepon").html(response.error.telepon);
        } else {
          $("#telepon").removeClass("is-invalid");
          $("#error_telepon").html("");
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
        if (response.error.hak_akses) {
          $("#hak_akses").addClass("is-invalid");
          $("#error_hak_akses").html(response.error.hak_akses);
        } else {
          $("#hak_akses").removeClass("is-invalid");
          $("#error_hak_akses").html("");
        }
        if (response.error.status) {
          $(".status").addClass("is-invalid");
          $(".error_status").html(response.error.status);
        } else {
          $(".status").removeClass("is-invalid");
          $(".error_status").html("");
        }
        if (response.error.foto) {
          $("#foto").addClass("is-invalid");
          $("#error_foto").html(response.error.foto);
        } else {
          $("#foto").removeClass("is-invalid");
          $("#error_foto").html("");
        }
      } else {
        $("#modal_edit").modal("hide");
        Swal.fire({
          title: "Berhasil!",
          text: response.message,
          icon: "success",
          showConfirmButton: false,
          timer: 2100,
        });
        loadData();
      }
    },
    error: function (xhr, ajaxOptions, thrownerror) {
      $("#modal_edit").modal("hide");
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
}

function detail(id) {
  $.ajax({
    type: "post",
    url: site_url + "admin/users/detail",
    data: {
      id: id,
    },
    dataType: "json",
    success: function (response) {
      $(".view_modal").html(response.message);
      let myModal = new bootstrap.Modal(
        document.getElementById("modal_detail"),
        {
          keyboard: false,
        }
      );
      myModal.show();
    },
    error: function (xhr, ajaxOptions, thrownerror) {
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
    beforeSend: function () {
      $(".btn_change_password").html(
        '<div class="spinner-border spinner-border-sm text-danger" role="status"><span class="visually-hidden">Loading...</span></div> Loading...'
      );
      $(".btn_close").hide(100);
      $(".btn_change_password").attr("disabled", true);
    },
    complete: function () {
      $(".btn_change_password").removeAttr("disabled");
      $(".btn_close").show(100);
      $(".btn_change_password").html("Ubah Password");
    },
    error: function (xhr, ajaxOptions, thrownerror) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
    },
    success: function (response) {
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

function hapus(id) {
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Proses ini akan menghapus data secara permanent!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      let csrf = $('meta[name="csrf-token"]').attr("content");
      $.ajax({
        url: site_url + "admin/users/delete",
        data: {
          id: id,
          _method: "DELETE",
          _token: csrf,
        },
        type: "POST",
        dataType: "JSON",
        success: function (response) {
          Swal.fire({
            title: "Berhasil!",
            text: response.message,
            icon: "success",
            showConfirmButton: false,
            timer: 2100,
          });
          loadData();
        },
        error: function (jqXHR, textStatus, errorThrown) {
          Swal.fire({
            title: "Maaf data gagal di hapus!",
            html: `Silahkan Cek kembali Kode Error: <strong>${
              jqXHR.status + "\n"
            }</strong> `,
            icon: "error",
            showConfirmButton: false,
            timer: 2100,
          });
        },
      });
    }
  });
}
