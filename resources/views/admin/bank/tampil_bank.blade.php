
@extends('layout.mainlayout')

@section('title', 'Setoran Bank Depo')
    
@section('content')
<!-- Konten Utama -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(Auth::user()->role == 'kasir')
                        <div class="row">
                            <div class="col-12">
                                <a href="bank_tambah" class="btn btn-primary mb-3">
                                    <i class="far fa-plus"></i> Tambah Setoran Bank Depo
                                </a>
                                <div class="float-right">
                                    <p>Total Saldo</p>
                                    <h2>Rp. {{  number_format($saldoAkhir, 0, ',', '.')  }},00</h2>
                                </div>
                            </div>
                        </div>
                        @endif

                       


                        {{-- <div class="form-group">
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
                         --}}
                        {{-- @if(session::has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session::get('message') }}
                        </div>
                        @endif --}}

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="active text-center">
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>keterangan</th>
                                        <th>Setoran Bank</th>
                                        @if(Auth::user()->role == 'kasir')
                                        <th width="14%">Tombol Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bank as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->tanggal_setoran }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            Rp. {{  number_format($item->setoran_bank, 0, ',', '.')  }},00</td>
                                        
                                        @if(Auth::user()->role == 'kasir')
                                        <td class="text-center">
                                                <a href="bank_edit/{{ $item->id }}" class="btn bg-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a data-toggle="modal" href="#delete_bank{{ $item->id }}"
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

@foreach ($bank as $no => $item)
<div class="modal fade" id="delete_bank{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <form action="bank_destroy/{{ $item->id }}" method="post">
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