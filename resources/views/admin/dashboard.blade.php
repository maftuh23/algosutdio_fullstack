@extends('layouts.bapp')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- PIE CHART -->
                <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Total Barang Per Kategori</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="pieChart" style="height: 200px;"></canvas>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Total Penjualan Per Hari</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">

                <div class="position-relative mb-4">
                    <canvas id="sales-chart" height="200"></canvas>
                </div>
                </div>
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">10 Penjualan Terakhir</h3>
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
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

