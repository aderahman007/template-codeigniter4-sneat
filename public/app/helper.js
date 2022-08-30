function convertTanggal(date, param_hari = false, param_waktu = false) {
  var date = new Date(date);
  var tahun = date.getFullYear();
  var bulan = date.getMonth();
  var tanggal = date.getDate();
  var hari = date.getDay();

  var jam = date.getHours();
  var menit = date.getMinutes();
  var detik = date.getSeconds();

  switch (hari) {
    case 0:
      hari = "Minggu";
      break;
    case 1:
      hari = "Senin";
      break;
    case 2:
      hari = "Selasa";
      break;
    case 3:
      hari = "Rabu";
      break;
    case 4:
      hari = "Kamis";
      break;
    case 5:
      hari = "Jum'at";
      break;
    case 6:
      hari = "Sabtu";
      break;
  }

  switch (bulan) {
    case 0:
      bulan = "Januari";
      break;
    case 1:
      bulan = "Februari";
      break;
    case 2:
      bulan = "Maret";
      break;
    case 3:
      bulan = "April";
      break;
    case 4:
      bulan = "Mei";
      break;
    case 5:
      bulan = "Juni";
      break;
    case 6:
      bulan = "Juli";
      break;
    case 7:
      bulan = "Agustus";
      break;
    case 8:
      bulan = "September";
      break;
    case 9:
      bulan = "Oktober";
      break;
    case 10:
      bulan = "November";
      break;
    case 11:
      bulan = "Desember";
      break;
  }

  if (param_hari == false && param_waktu == false) {
    return tanggal + " " + bulan + " " + tahun;
  } else if (param_hari == false && param_waktu == true) {
    return (
      tanggal +
      " " +
      bulan +
      " " +
      tahun +
      " " +
      set(jam) +
      ":" +
      set(menit) +
      ":" +
      set(detik)
    );
  } else if (param_hari == true && param_waktu == true) {
    return (
      hari +
      ", " +
      tanggal +
      " " +
      bulan +
      " " +
      tahun +
      " " +
      set(jam) +
      ":" +
      set(menit) +
      ":" +
      set(detik)
    );
  } else {
    return hari + ", " + tanggal + " " + bulan + " " + tahun;
  }
}

function set(e) {
  e = e < 10 ? "0" + e : e;
  return e;
}

function hanyaAngka(event) {
  var angka = event.which ? event.which : event.keyCode;
  if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)) return false;
  return true;
}

function encrypt_url(kode) {
  var hasil;
  $.ajax({
    type: "post",
<<<<<<< HEAD
    url: site_url + "/encrypt_url",
=======
    url: site_url + "/Dashboard/encrypt_url",
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
    data: { kode: kode },
    async: false,
    dataType: "json",
    success: function (response) {
      hasil = response;
      // return response;
    },
  });
  return hasil;
}

function decrypt_url(kode) {
  var hasil;
  $.ajax({
    type: "post",
<<<<<<< HEAD
    url: site_url + "/decrypt_url",
=======
    url: site_url + "/Dashboard/decrypt_url",
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
    data: { kode: kode },
    async: false,
    dataType: "json",
    success: function (response) {
      hasil = response;
      // return response;
    },
  });
  return hasil;
}

// Format Rupiah
const from_number_to_rupiah = (numb) => {
  const format = numb.toString().split("").reverse().join("");
  const convert = format.match(/\d{1,3}/g);
  const rupiah =
    "Rp. " + convert.join(".").split("").reverse().join("") + ",00";
  return rupiah;
};
// Format number
const from_rupiah_to_number = (numb) => {
  const editedNumb = numb.slice(0, -2);
  const number = editedNumb.replace(/[^0-9]+/g, "");
  return number;
};
