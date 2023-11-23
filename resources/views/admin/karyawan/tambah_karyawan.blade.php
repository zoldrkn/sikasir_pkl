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
                <h4>Tambah Karyawan</h4>
            </div>
            <form class="form-horizontal" id="tambahkaryawan" action="karyawan" method="post">
                @csrf
                <div class="modal-body">
                    <!-- PENGGUNA -->
                    <div class="row">
                        <div class="offset-sm-1 col-sm-10">
                            <div class="form-group row">
                                <label for="nama_karyawan" class="col-sm-3">Nama Karyawan</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="divisi" class="col-sm-3">Divisi</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="divisi" id="divisi" placeholder="Divisi" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" modal-footer right-content-between">
                    <a href="karyawan" class="btn btn-default">Batal</a>
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

