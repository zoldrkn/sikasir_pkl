@extends('layout.mainlayout')

@section('title', 'Edit Setoran Bank')
    
@section('content')

<!-- Modal ADD Pengguna -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                <h4>Edit Setoran Bank</h4>
            </div>
            <form class="form-horizontal" id="editbank" action="/bank/{{ $bank->id }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <!-- PENGGUNA -->
                    <div class="row">
                        <div class="offset-sm-1 col-sm-10">
                            <div class="form-group row">
                                <label for="tanggal_setoran" class="col-sm-3">Tanggal</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal_setoran" id="tanggal_setoran" value="{{ $bank->tanggal_setoran }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan" class="col-sm-3">Keterangan</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ $bank->keterangan }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="setoran_bank" class="col-sm-3">Setoran Bank</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="setoran_bank" id="setoran_bank" value="{{ $bank->setoran_bank }}" required>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>

                <div class=" modal-footer right-content-between">
                    <a href="/bank" class="btn btn-default">Batal</a>
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

