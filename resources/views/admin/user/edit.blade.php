@extends('layout.mainlayout')

@section('title', 'Edit User')
    
@section('content')

<!-- Modal ADD Pengguna -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                <h4>Edit User</h4>
            </div>
            <form class="form-horizontal" id="edituser" action="/user/{{ $user->id }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="offset-sm-1 col-sm-10">
                            <div class="form-group row">
                                <label for="email" class="col-sm-3">Email</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-sm-3">Level</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="col col-sm-4 form-control" name="role" id="role"
                                placeholder="Level">
                                {{ $user->role }}
                                <option value=" {{ $user->id }}">{{ $user->role }}</option>
                                <option value="admin" {{ $user->role }}>Admin</option>
                                <option value="kasir" {{ $user->role }}>Kasir
                                </option>
                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_password" class="col-sm-3">Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="new_password" id="new_password{{ $user->id }}" placeholder="Password Baru">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_passconf" class="col-sm-3">Konfirmasi Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="new_passconf" id="new_passconf" placeholder="Tulis ulang password">
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
                    <a href="/user" class="btn btn-default">Batal</a>
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

