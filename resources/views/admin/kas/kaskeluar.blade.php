@extends('layout.mainlayout')

@section('title', 'Kas Keluar')
    
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
                                <a href="kaskeluar_tambah" class="btn btn-primary mb-3">
                                    <i class="far fa-plus"></i> Tambah Kas Keluar
                                </a>
                            </div>
                        </div>
                        @endif

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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="active text-center">
                                        <th>No</th>
                                        <th>KK</th>
                                        <th>Tanggal</th>
                                        <th>Divisi</th>
                                        <th>Keterangan</th>
                                        <th>Kredit</th>
                                        <th width="14%">Tombol Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">
                                            <a data-toggle="modal" href=""
                                                class="btn bg-navy btn-sm"><i class="fas fa-eye"></i></a>
                                                @if(Auth::user()->role == 'kasir')
                                            <button data-toggle="modal" data-target=""
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                            <a data-toggle="modal" href=""
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                                @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
{{-- {{ view('admin.kas.tambahKasKeluar') }} --}}
<!-- /Konten Utama  -->
@endsection