@extends('layouts.app')
  @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0"> Selamat Datang <small>Pengelolaan data peminjaman gedung</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
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
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Cara Penggunaan</h5>

                <p class="card-text">
                  Silahkan pilih menu diatas, atau klik link dibawah
                </p>

                <a href="{{ route('transaksis.create') }}" class="card-link">Buat Transaksi</a>
                <a href="{{ route('pelanggans.create') }}" class="card-link">Tmabah Pelanggan</a>
              </div>
            </div>

            {{-- <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Lporan</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div><!-- /.card --> --}}
          </div>
          <!-- /.col-md-6 -->
          <!-- /.col-md-6 -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    @endsection