<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/mahasiswa/css/') ?>styles.css">
    <style>
        table.table.table-bordered thead.thead-konsultasi{
            background-color: yellow !important;
        }
        @media print{
            table.table.table-bordered thead.thead-konsultasi{
                background-color: yellow !important;
                -webkit-print-color-adjust: exact;
            }
        }
        @media screen{
            table.table.table-bordered thead.thead-konsultasi{
                background-color: yellow !important;
            }
        }
    </style>
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
            <table class="headerer">
                <tr>
                    <td rowspan="4"><img src="<?= base_url('assets/frontend/mahasiswa/img/') ?>unla.png" width="150px" alt=""></td>
                </tr>
                <tr>
                    <td class="pl-5 header" rowspan="3" width="750px">
                        <h5>YAYASAN PENDIDIKAN TRIBAKTI LANGLANGBUANA</h5>
                        <h2>UNIVERSITAS LANGLANGBUANA</h2>
                        <h1>PROGRAM STUDI TEKNIK INFORMATIKA - FAKULTAS TEKNIK</h1>
                        <p>Jalan Karapitan No. 116 Telp. 022-42144230 Bandung 40261</p>
                    </td>
                </tr>
            </table>
            <h4 class="berita">BERITA ACARA BIMBINGAN SKRIPSI</h4>
            <table class="biodata">
                <tr>
                    <td>Nama Mahasiswa </td>
                    <td>: </td>
                    <td></td>
                    <td rowspan="7"><img src="admin.jpg" class="float-right" alt=""></td>
                </tr>
                <tr>
                    <td>NPM </td>
                    <td>: </td>
                </tr>
                <tr>
                    <td>Pembimbing 1 </td>
                    <td>: </td>
                </tr>
                <tr>
                    <td>Pembimbing 2 </td>
                    <td>: </td>
                </tr>
                <tr>
                    <td>Periode Bimbingan </td>
                    <td>: </td>
                    <td>Genap Tahun 2019/2020</td>
                </tr>
                <tr>
                    <td>Judul Skripsi </td>
                    <td>: </td>
                </tr>
            </table>

            <h5 class="kegiatan">Kegiatan Konsultasi / Bimbingan</h5>
            <h5>Pembimbing 1</h5>
            <table class="table table-bordered">
                <thead class="thead-konsultasi">
                    <th width="6%">No</th>
                    <th width="20%">Tanggal</th>
                    <th width="30%">Materi Bimbingan</th>
                    <th>Catatan</th>
                </thead>
            </table>
            <h5>Pembimbing 2</h5>
            <table class="table table-bordered">
                <thead class="thead-konsultasi">
                    <th width="6%">No</th>
                    <th width="20%">Tanggal</th>
                    <th width="30%">Materi Bimbingan</th>
                    <th>Catatan</th>
                </thead>
            </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script>
        window.print();
    </script> -->
  </body>
</html>