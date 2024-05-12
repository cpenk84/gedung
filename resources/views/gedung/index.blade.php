@extends('layouts.app')
  @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <b>Gedungs</b> <small><i class="text-primary">List</i></small></h1>
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
                            <a class="btn btn-success" href="{{ route('gedungs.create') }}"> Create New Gedung</a>
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
                  <th>Name</th>
                  <th>Lokasi</th>
                  <th>Tarif / Jam</th>
                  <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $gedung)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $gedung->nama_gedung }}</td>
                    <td>{{ $gedung->lokasi }}</td>
                    <td>Rp. {{ number_format($gedung->tarif,0) }},-</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{ route('gedungs.show',$gedung->id) }}">Show</a>
                      <a class="btn btn-primary btn-sm" href="{{ route('gedungs.edit',$gedung->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['gedungs.destroy', $gedung->id],'style'=>'display:inline']) !!}
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