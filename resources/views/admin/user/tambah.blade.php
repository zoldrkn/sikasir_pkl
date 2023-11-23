@extends('layout.mainlayout')

@section('title', 'Tambah User')
    
@section('content')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                <h4>Tambah User</h4>
            </div>
            <form class="form-horizontal" id="tambahuser" action="user" method="post">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-info text-xs">
                        <div class="row">
                            <div class="col-2 col-sm-1"><i class="fa fa-info-circle fa-3x" aria-hidden="true"></i></div>
                            <div class="col-10 col-sm-11">
                                <div>&bull; Data pengguna digunakan untuk pengguna melakukan Login</div>
                                <div>&bull; Pastikan data sesuai dengan identitas</div>
                            </div>
                        </div>
                    </div>
                    <div><span class="required"></span> <b>Wajib Diisi</b></div>
                    <hr>
                    <!-- PENGGUNA -->
                    <div class="row">
                        <div class="offset-sm-1 col-sm-10">
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 required">Email</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 required">Nama</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 required">Level</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control" name="role">
                                            <option value="">-Pilih-</option>
                                            <option value="admin">Admin</option>
                                            <option value="kasir">Kasir</option>
                                        </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-dice" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 required">Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="passconf" class="col-sm-3 required">Konfirmasi Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="passconf" id="passconf" placeholder="Tulis ulang password">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class=" modal-footer right-content-between">
                    <a href="user" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

