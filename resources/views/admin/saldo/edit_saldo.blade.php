@extends('layout.mainlayout')

@section('title', 'Edit Saldo')
    
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
            <form class="form-horizontal" id="editsaldo" action="/saldo/{{ $saldo->id }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <!-- PENGGUNA -->
                    <div class="row">
                        <div class="offset-sm-1 col-sm-10">
                            <div class="form-group row">
                                <label for="tanggal_saldo" class="col-sm-3">Tanggal</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal_saldo" id="tanggal_saldo" value="{{ $saldo->tanggal_saldo }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan_saldo" class="col-sm-3">Keterangan</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keterangan_saldo" id="keterangan_saldo" value="{{ $saldo->keterangan_saldo }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="saldo" class="col-sm-3">Saldo Masuk (Rp.)</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="saldo" id="saldo" value="{{ $saldo->saldo }}"required>
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

