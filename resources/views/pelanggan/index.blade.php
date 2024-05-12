@extends('layouts.app')
  @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <b>pelanggans</b> <small><i class="text-primary">List</i></small></h1>
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
                            <a class="btn btn-success" href="{{ route('pelanggans.create') }}"> Create New pelanggan</a>
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
                  <th>NIK</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat Lengkap</th>
                  <th>No. Tlp</th>
                  <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $pelanggan)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $pelanggan->nik }}</td>
                    <td>{{ $pelanggan->nama_lengkap }}</td>
                    <td>{{ $pelanggan->jenis_kelamin }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->no_tlp }}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{ route('pelanggans.show',$pelanggan->id) }}">Show</a>
                      <a class="btn btn-primary btn-sm" href="{{ route('pelanggans.edit',$pelanggan->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['pelanggans.destroy', $pelanggan->id],'style'=>'display:inline']) !!}
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