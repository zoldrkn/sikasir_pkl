@extends('layout.mainlayout')

@section('title', 'Saldo')
    
@section('content')

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
                        
                        <div class="row">
                            <div class="col-12">
                                @if(Auth::user()->role == 'kasir')
                                <a href="saldo_tambah" class="btn btn-primary mb-3">
                                    <i class="far fa-plus"></i> Tambah Saldo
                                </a>@endif
                                <div id="menuDataTable" class="float-right"></div>
                                <div class="float-right">
                                    <p>Total Saldo</p>
                                    <h2>Rp. {{  number_format($saldoAkhir, 0, ',', '.')  }},00</h2>
                                </div>
                            </div>   
                        </div>    
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-sm table-hover" width="100%">
                                <thead>
                                    <tr class="active text-center">
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Saldo Masuk</th>
                                        @if(Auth::user()->role == 'kasir')
                                        <th width="14%">Tombol Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($saldo as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->tanggal_saldo }}</td>
                                        <td>{{ $item->keterangan_saldo }}</td>
                                        <td>Rp. {{ number_format($item->jumlah_saldo, 0, ',', '.') }},00</td>
                                        @if(Auth::user()->role == 'kasir')
                                        <td class="text-center">
                                                <a href="saldo_edit/{{ $item->id }}" class="btn bg-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a data-toggle="modal" href="#delete_saldo{{ $item->id }}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                                @endif
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

@foreach ($saldo as $no => $item)
<div class="modal fade" id="delete_saldo{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <form action="saldo_destroy/{{ $item->id }}" method="post">
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