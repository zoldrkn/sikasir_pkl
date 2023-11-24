@extends('layout.mainlayout')

@section('title', 'Transaksi Kas Kecil')
    
@section('content')

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(Auth::user()->role == 'kasir')
                        <div class="row">
                            <div class="col-12">
                                <a href="kaskecil_tambah" class="btn btn-primary mb-3">
                                    <i class="far fa-plus"></i> Tambah Transaksi
                                </a>
                            </div>
                        </div>
                        @endif

                        {{-- @if(session::has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session::get('message') }}
                        </div>
                        @endif --}}

                        <div class="form-group">
                            <div class="col-2">
                                <label for="mySelector">Periode/Bln</label>
                                <select class="form-control" id="mySelector">
                                    <option selected value="">Semua Bulan</option>
                                    <?php for ($i = 01; $i <= 12; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-sm table-hover" width="100%">
                                <thead>
                                    <tr class="active text-center">
                                        <th>No</th>
                                        <th>KK</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        @if(Auth::user()->role == 'kasir')
                                        <th width="14%">Tombol Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kaskecil as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tanggal_tansaksi }}</td>
                                        <td>{{ $item->keterangan_transaksi }}</td>
                                        <td>{{ $item->jumlah_masuk }}</td>
                                        <td>{{ $item->jumlah_keluar }}</td>
                                        @if(Auth::user()->role == 'kasir')
                                        <td class="text-center">
                                            <a data-toggle="modal" href=""
                                            class="btn bg-navy btn-sm"><i class="fas fa-eye"></i></a>
                                                <a href="kaskecil_edit/{{ $item->id }}" class="btn bg-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a data-toggle="modal" href="#delete_kaskecil{{ $item->id }}"
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

@foreach ($kaskecil as $no => $item)
<div class="modal fade" id="delete_kaskecil{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <form action="kaskecil_destroy/{{ $item->id }}" method="post">
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