@extends('layouts.bapp')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Penjualan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Detail Penjualan</li>
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
                    <h3 class="card-title">Detail Penjualan <a href="{{ url('admin/penjualan') }}" class="btn btn-primary">Kembali</a>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Konsumen</label>
                                <input type="text" class="form-control" placeholder="Nama Konsumen" value="<?= $pelanggan->nama_pelanggan ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" placeholder="Alamat" value="<?= $pelanggan->alamat ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0; foreach ($detail_penjualan as $item) : $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $item->nama_barang ?></td>
                            <td><?= $item->jumlah ?></td>
                            <td><?= \Fungsi::format_rupiah($item->harga_satuan) ?></td>
                            <td><?= \Fungsi::format_rupiah($item->harga_total) ?></td>
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