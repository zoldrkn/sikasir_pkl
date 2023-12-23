@extends('layout.mainlayout')

@section('title', 'Tambah Transaksi')
    
@section('content')
<!-- Modal ADD Pengguna -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                <h4>Tambah Transaksi Kas Kecil</h4>
            </div>
            <form class="form-horizontal" id="tambahkaskecil" action="kaskecil" method="post">
                @csrf
                <div class="modal-body">
                    <!-- PENGGUNA -->
                    <div class="row">
                        <div class="offset-sm-1 col-sm-10">
                            <div class="form-group row">
                                <label for="kode_kaskeluar" class="col-sm-3">KK</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="kode_kaskeluar" id="kode_kaskeluar" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_transaksi" class="col-sm-3">Tanggal</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="divisi" class="col-sm-3">Divisi</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="divisi" id="divisi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_karyawan" class="col-sm-3">Nama</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="keterangan_transaksi" class="col-sm-3">Keterangan</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keterangan_transaksi" id="keterangan_transaksi" placeholder="Keterangan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_keluar" class="col-sm-3">Jumlah Kas Keluar</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="jumlah_keluar" id="jumlah_keluar" placeholder="Kas Keluar" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" modal-footer right-content-between">
                    <a href="kaskecil" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    </div>
</section>
    

<!-- /.modal -->
@endsection

