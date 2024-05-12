@extends('layouts.app')
  @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <b>Transaksi</b> <small><i class="text-primary">List</i></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Setting</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                      <table class="table table-light">
                        <tbody>
                          <tr>
                            <td>Nama Pelanggan</td>
                            <td>: {{ $transaksi->pelanggans['nama_lengkap'] }}</td>
                          </tr>
                          <tr>
                            <td>Geudng</td>
                            <td>: {{ $transaksi->gedungs['nama_gedung'] }}</td>
                          </tr>
                          <tr>
                            <td>Tanggal</td>
                            <td>: {{ $transaksi->tanggal }}</td>
                          </tr>
                          <tr>
                            <td>Jumlah Jam</td>
                            <td>: {{ $transaksi->jumlah_jam }} Jam</td>
                          </tr>
                          <tr>
                            <td>Jam Masuk</td>
                            <td>: {{ $transaksi->jam_masuk }}</td>
                          </tr>
                          <tr>
                            <td>Total Pembayaran</td>
                            <td>: Rp. {{ number_format($transaksi->total_pembayaran,0) }},-</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    @endsection
