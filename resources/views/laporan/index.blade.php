@extends('layouts.app')
  @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <b>Transaksis Tanggal {{ $get_tanggal }}</b> <small><i class="text-primary">List</i></small></h1>
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
                    <div class="col-lg-2 margin-tb">
                        <div class="pull-right h4">
                            {!! Form::date('tanggal', $get_tanggal, ['class' => 'form-control', 'id'=>'input_tanggal']) !!}
                        </div>
                    </div>
                    <div class="col-lg-2 margin-tb">
                        <div class="pull-right h4">
                            <a href="{{ route('laporans.print',$get_tanggal) }}" target="blank_" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Print</a>
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
                @foreach ($data as $key => $transaksi)
                  <tr>
                    <td>{{ ++$i }}</td>
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
              {!! $data->render() !!}
                    <div class="col-lg-11 margin-tb mb-4">
                        <div class="text-right h4">
                            Total Pendapatan : <b><i>Rp. {{ number_format($total,0) }},-</i></b>
                        </div>
                    </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <script>
      $('#input_tanggal').change(function () {
        var tanggal = this.value;
        window.location.replace("{{ URL::to('/') }}/laporans/tanggal/"+tanggal);
          {{-- alert(this.value); --}}
      });

    </script>
    @endsection