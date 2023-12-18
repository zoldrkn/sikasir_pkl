@extends('layout.mainlayout')

@section('title', 'Karyawan')
    
@section('content')
<!-- Konten Utama -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
                @endif
                @if(session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        @if(Auth::user()->role == 'admin')
                        <div class="row">
                            <div class="col-12">
                                <a href="karyawan_tambah" class="btn btn-primary mb-3">
                                    <i class="far fa-plus"></i> Tambah Karyawan
                                </a>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <div class="col-2">
                                <label for="mySelector">Divisi</label>
                                <select class="form-control" id="mySelector">
                                    <option selected value="">Semua Divisi</option>
                                    @foreach ($karyawan as $no => $item)
                                    <option value="{{ $item->divisi }}">{{ $item->divisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="active text-center">
                                        <th>No</th>                                       
                                        <th>Nama Karyawan</th>
                                        <th>Divisi</th>               
                                        @if(Auth::user()->role == 'admin')                    
                                        <th width="14%">Tombol Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawan as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->nama_karyawan }}</td>
                                        <td class="text-center">{{ $item->divisi }}</td>  
                                        @if(Auth::user()->role == 'admin')                              
                                        <td class="text-center">                                        
                                                <a href="karyawan_edit/{{ $item->id }}" class="btn bg-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a data-toggle="modal" href="#delete_karyawan{{ $item->id }}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                               
                                        </td>
                                        @endif
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

@foreach ($karyawan as $no => $item)
<div class="modal fade" id="delete_karyawan{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <form action="karyawan_destroy/{{ $item->id }}" method="post">
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