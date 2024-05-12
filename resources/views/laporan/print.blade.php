
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/') }}adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}adminlte/dist/css/adminlte.min.css">
<script src="{{ asset('/') }}adminlte/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition layout-top-nav" onload="print()">
<div class="wrapper">

   
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              {{-- <div class="card-body"> --}}
                <div class="row mb-3">
                    <div class="col-lg-12 text-center margin-tb">
                        <div class="pull-right h4">
                            LAPORAN TANGGAL {{ $tanggal }}
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  {{ $message }}
                </div>
                @endif
                <table class="table table-bordered table-sm">
                <tr>
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>Nama Gedung</th>
                  <th>Tanggal</th>
                  <th>Jam Masuk</th>
                  <th>Jumlah Jam</th>
                  <th>Total Pembayaran</th>
                </tr>
                <?php $i = 1;?>
                @foreach ($data as $key => $transaksi)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $transaksi->pelanggans['nama_lengkap'] }}</td>
                    <td>{{ $transaksi->gedungs['nama_gedung'] }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                    <td>{{ $transaksi->jam_masuk }}</td>
                    <td>{{ $transaksi->jumlah_jam }} Jam</td>
                    <td align="center">Rp. {{ number_format($transaksi->total_pembayaran,0) }}</td>
                  </tr>
                @endforeach
                </table>
              </div>
                    <div class="col-lg-11 margin-tb mb-4">
                        <div class="text-right h4">
                            Total Pendapatan : <b><i>Rp. {{ number_format($total,0) }},-</i></b>
                        </div>
                    </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    {{-- </div> --}}
