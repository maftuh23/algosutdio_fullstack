@extends('layouts.bapp')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penjualan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Penjualan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Penjualan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Alamat</th>
                            <th>Tanggal Penjualan</th>
                            <th>Total Penjualan</th>
                            <th>Tools</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0; foreach ($penjualan as $item) : $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $item->nama_pelanggan ?></td>
                            <td><?= $item->alamat ?></td>
                            <td><?= $item->tgl_penjualan ?></td>
                            <td><?= $item->total ?></td>
                            <td><a href="{{ url('/admin/detail_penjualan', [$item->id_penjualan]) }}" class="btn btn-block btn-primary">Detail Penjualan</a></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection