@extends('layouts.app')
  @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <b>transaksis</b> <small><i class="text-primary">List</i></small></h1>
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
                            <a class="btn btn-success" href="{{ route('transaksis.create') }}"> Create New transaksi</a>
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
                  <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $transaksi)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $transaksi->pelanggans['nama_lengkap'] }}</td>
                    <td>{{ $transaksi->gedungs['nama_gedung'] }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                    <td>{{ $transaksi->jam_masuk }}</td>
                    <td>{{ $transaksi->jumlah_jam }} Jam</td>
                    <td>Rp. {{ number_format($transaksi->total_pembayaran,0) }}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{ route('transaksis.show',$transaksi->id) }}">Show</a>
                      <a class="btn btn-primary btn-sm" href="{{ route('transaksis.edit',$transaksi->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['transaksis.destroy', $transaksi->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                  </tr>
                @endforeach
                </table>
              </div>
              {!! $data->render() !!}
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    @endsection