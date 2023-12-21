@extends('layout.mainlayout')

@section('title', 'Edit Transaksi')
    
@section('content')

<!-- Modal ADD Pengguna -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                <h4>Edit Saldo</h4>
            </div>
            <form class="form-horizontal" id="editkaskecil" action="/kaskecil/{{ $kaskecil->id }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <!-- PENGGUNA -->
                    <div class="row">
                        <div class="offset-sm-1 col-sm-10">
                            <div class="form-group row">
                                <label for="kode_kaskeluar" class="col-sm-3">KK</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="kode_kaskeluar" id="kode_kaskeluar" value="{{ $kaskecil->kode_kaskeluar }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_transaksi" class="col-sm-3">Tanggal</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" value="{{ $kaskecil->tanggal_transaksi }}" readonly>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="nama_karyawan" class="col-sm-3">Nama/Divisi</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        
                                        <input type="text" class="form-control" name="id" id="id" value="{{ $kaskecil->nama_karyawan }}, {{ $kaskecil->divisi }} " readonly>
                                       
                                    </div>

                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label for="keterangan_transaksi" class="col-sm-3">Keterangan</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keterangan_transaksi" id="keterangan_transaksi" value="{{ $kaskecil->keterangan_transaksi }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_keluar" class="col-sm-3">Jumlah Kas Keluar</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="jumlah_keluar" id="jumlah_keluar" value="{{ $kaskecil->jumlah_keluar }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_masuk" class="col-sm-3">Tanggal Kembali</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="{{ $kaskecil->tanggal_masuk }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_masuk" class="col-sm-3">Jumlah Kembali</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="jumlah_masuk" id="jumlah_masuk" value="{{ $kaskecil->jumlah_masuk }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Detail Keterangan</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="" id="" value="" >
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>

                <div class=" modal-footer right-content-between">
                    <a href="/saldo" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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

