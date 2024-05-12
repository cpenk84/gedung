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
                            <a class="btn btn-primary" href="{{ route('pelanggans.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::model($pelanggan, ['method' => 'PATCH','route' => ['pelanggans.update', $pelanggan->id]]) !!}


                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>NIK:</strong>
                            {!! Form::number('nik', $pelanggan->nik, array('placeholder' => 'NIK','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Lengkap:</strong>
                            {!! Form::text('nama_lengkap', $pelanggan->nama_lengkap, array('placeholder' => 'Nama Lengkap','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jenis Kelamin:</strong>
                            <select name="jenis_kelamin" class="form-control">
                              <option value>Pilih</option>
                              <option value="Laki-laki" {{ $pelanggan->jenis_kelamin == "Laki-laki" ? "selected":"" }}>Laki-laki</option>
                              <option value="Perempuan" {{ $pelanggan->jenis_kelamin == "Perempuan" ? "selected":"" }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Alamat Lengkap:</strong>
                            {!! Form::textarea('alamat', $pelanggan->alamat, array('placeholder' => 'Alamat Lengkap','class' => 'form-control', 'rows' => 3)) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>No. Tlp:</strong>
                            {!! Form::number('no_tlp', $pelanggan->no_tlp, array('placeholder' => 'No. Tlp','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}


              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    @endsection
