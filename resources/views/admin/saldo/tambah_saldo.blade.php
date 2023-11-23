@extends('layout.mainlayout')

@section('title', 'Tambah Saldo')
    
@section('content')
<!-- Modal ADD Pengguna -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                <h4>Tambah Saldo</h4>
            </div>
            <form class="form-horizontal" id="tambahsaldo" action="saldo" method="post">
                @csrf
                <div class="modal-body">
                    <!-- PENGGUNA -->
                    <div class="row">
                        <div class="offset-sm-1 col-sm-10">
                            <div class="form-group row">
                                <label for="tanggal_saldo" class="col-sm-3">Tanggal</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal_saldo" id="tanggal_saldo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan_saldo" class="col-sm-3">Keterangan</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keterangan_saldo" id="keterangan_saldo" placeholder="Keterangan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="saldo" class="col-sm-3">Saldo Masuk (Rp.)</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="saldo" id="saldo" placeholder="Saldo" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" modal-footer right-content-between">
                    <a href="saldo" class="btn btn-default">Batal</a>
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

