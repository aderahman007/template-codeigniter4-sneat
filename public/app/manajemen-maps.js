$(document).ready(function(){
    loadData();
})

loadData = () => {
    $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        bDestroy: true,
        responsive: true,
        ajax: {
            url: site_url + 'admin/maps/datatables',
            type: 'POST'
        },
        order: [],
        columns: [
            {
                data: 'no',
                orderable: false
            },
            {
                data: 'title'
            },
            {
                data: 'nama'
            },
            {
                data: 'cover',
                render: function(data){
                  return(
                    "<img src=" +
                    site_url +
                    "writable/images/maps/" +
                    data +
                    ' class="mx-auto d-block" alt="cover" id="cover" style="width: 150px; height: 150px; !important">'
                  );
                }
            },
            {
                data: 'status'
            },
            {
                data: 'option',
                orderable: false
            }
        ]
    })
}

add = () => {
    $.ajax({
        url: site_url + 'admin/maps/add',
        type: 'POST',
        dataType: 'JSON',
        success: function(response){
            $('.view_modal').html(response.message);
            let myModal = new bootstrap.Modal(
                $('#modal_add'),{
                    keyboard: false
                }
            );
            myModal.show();
        }
    })
}

readURLLogo = (input) => {
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

store = () => {
    const form = $('#form_add')[0];
    const data = new FormData(form);
    $.ajax({
        url: site_url + 'admin/maps/store',
        type: 'POST',
        data: data,
        dataType: 'JSON',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
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
            if(response.error){
              if (response.error.title) {
                  $("#title").addClass("is-invalid");
                  $("#error_title").html(response.error.title);
                } else {
                  $("#title").removeClass("is-invalid");
                  $("#error_title").html("");
                }
            }else{
              $("#modal_add").modal("hide");
              Swal.fire({
              title: "Berhasil!",
              text: response.message,
              icon: "success",
              showConfirmButton: false,
              timer: 2100,
              });
              setTimeout(() => {
                location.href = site_url + 'admin/maps/manajemen-maps';
              },1000)
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
    })
}

update = () => {
    
  const form = $('#form_edit')[0];
  const data = new FormData(form);

  $.ajax({
      url: site_url + 'admin/maps/update',
      method: 'POST',
      data: data,
      dataType: 'JSON',
      processData: false,
      contentType: false,
      cache: false,
      beforeSend: function () {
          $(".btn-simpan").html(
            '<div class="spinner-border spinner-border-sm text-danger" role="status"><span class="visually-hidden">Loading...</span></div> Loading...'
          );
          $(".btn-cencel").hide(100);
          $(".btn-simpan").attr("disabled", true);
      },
      success: function(response){
          if(response.error){
              if (response.error.title) {
                  $("#title").addClass("is-invalid");
                  $("#error_title").html(response.error.title);
                } else {
                  $("#title").removeClass("is-invalid");
                  $("#error_title").html("");
                }
          }else{
              Swal.fire({
                title: "Berhasil!",
                text: response.message,
                icon: "success",
                showConfirmButton: false,
                timer: 2100,
              });
              setTimeout(() => {
                location.href = site_url + 'admin/maps/manajemen-maps';
              },1000)
          }
      },
      complete: function () {
          $(".btn-simpan").removeAttr("disabled");
          $(".btn-cencel").show(100);
          $(".btn-simpan").html("Tambah User");
      },
      error: function (xhr, ajaxOptions, thrownerror) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownerror);
      },
  })
}

hapus = (id) => {
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
            url: site_url + "admin/maps/delete",
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



