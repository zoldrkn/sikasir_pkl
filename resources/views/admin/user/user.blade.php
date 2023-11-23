@extends('layout.mainlayout')

@section('title', 'User')
    
@section('content')
<!-- Konten Utama -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="user_tambah" class="btn btn-primary mb-3">
                                    <i class="far fa-plus"></i> Tambah User
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="active text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Level</th>
                                        <th>Email</th>
                                        <th width="14%">Tombol Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->role }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td class="text-center">
                                            <a href="user_edit/{{ $item->id }}" class="btn bg-warning btn-sm"><i class="fas fa-key"></i></a>
                                            {{-- <button data-toggle="modal" data-target="" class="btn btn-warning btn-sm"><i class="fa fa-key"></i></button> --}}
                                            <a data-toggle="modal" href="#delete_user{{ $item->id }}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection

@foreach ($user as $no => $item)
<div class="modal fade" id="delete_user{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <form action="user_destroy/{{ $item->id }}" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <h5>Yakin ingin menghapus data ini?</h5>
                </div>
                <div class=" modal-footer right-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-danger">HAPUS</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach