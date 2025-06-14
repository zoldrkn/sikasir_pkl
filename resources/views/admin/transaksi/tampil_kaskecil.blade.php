@extends('layout.mainlayout')

@section('title', 'Transaksi Kas Kecil')
    
@section('content')

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Di dalam tampilan -->
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
                                <a href="kaskecil_tambah" class="btn btn-primary mb-3">
                                    <i class="far fa-plus"></i> Tambah Transaksi
                                </a>@endif
                                <div id="menuDataTable" class="float-right"></div>
                            </div>
                        </div>
                        

                        <div class="float-right">
                            <p>Total Saldo</p>
                            <h2>Rp. {{  number_format($saldoAkhir, 0, ',', '.')  }},00</h2>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function($) {
                                $('table').show();
                        
                                $('#mySelector').change(function() {
                                    var selection = $(this).val();
                                    var dataset = $('#example1 tbody').find('tr');
                        
                                    dataset.show();
                        
                                    if (selection !== "") {
                                        dataset.filter(function(index, item) {
                                            var timestamp = $(item).find('td:nth-child(3)').text();
                                            var date = new Date(timestamp);
                                            var month = date.getMonth() + 1; // January is 0!
                        
                                            return month.toString() !== selection;
                                        }).hide();
                                    }
                                });
                            });
                        </script>

                        <div class="form-group">
                            <div class="col-2">
                                <label for="mySelector">Periode Bulan</label>
                                <select class="form-control" id="mySelector">
                                    <option selected value="">SEMUA</option>
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
                                        <th>Tanggal Keluar</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Keterangan</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Nota 1</th>
                                        <th>Nota 2</th>
                                        <th>Nota 3</th>
                                        <th>Nota 4</th>
                                        <th>Pendapatan Lain-Lain</th>
                                        <th>Beban Selisih</th>
                                        <th>Total Nota</th>
                                        @if(Auth::user()->role == 'kasir')
                                        <th width="14%">Tombol Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kaskecil as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ $item->kode_kaskeluar }}</td>
                                        
                                        <td>{{ date('d-M-Y', strtotime($item->tanggal_transaksi)) }}</td>
                                        <td>{{ date('d-M-Y', strtotime($item->tanggal_masuk)) }}</td>
                                 
                                        <td>{{ $item->keterangan_transaksi }}</td>
                                        <td>Rp. {{ number_format($item->jumlah_masuk, 0, ',', '.') }},00</td>
                                        <td>Rp. {{ number_format($item->jumlah_keluar, 0, ',', '.') }},00</td>
                                        <td>{{ $item->transaksi_relasi->ket1 }} <p> Rp. {{ number_format($item->transaksi_relasi->nominal1, 0, ',', '.') }},00</p></td>
                                        <td>{{ $item->transaksi_relasi->ket2 }} <p> Rp. {{ number_format($item->transaksi_relasi->nominal2, 0, ',', '.') }},00</p></td>
                                        <td>{{ $item->transaksi_relasi->ket3 }} <p> Rp. {{ number_format($item->transaksi_relasi->nominal3, 0, ',', '.') }},00</p></td>
                                        <td>{{ $item->transaksi_relasi->ket4 }} <p> Rp. {{ number_format($item->transaksi_relasi->nominal4, 0, ',', '.') }},00</p></td>
                                        <td>Rp. {{ number_format($item->transaksi_relasi->pendapatan_lain, 0, ',', '.') }},00</td>
                                        <td>Rp. {{ number_format($item->transaksi_relasi->beban_selisih, 0, ',', '.') }},00</td>
                                        <td>Rp. {{ number_format($item->transaksi_relasi->total_nota, 0, ',', '.') }},00</td>
                                        @if(Auth::user()->role == 'kasir')
                                        <td class="text-center">
                                            <a href="kaskecil_detail/{{ $item->id }}/{{ $item->karyawan_id }}/{{ $item->transaksi_relasi->id }}"
                                            class="btn bg-navy btn-sm"><i class="fas fa-eye"></i></a>
                                                <a href="kaskecil_edit/{{ $item->id }}/{{ $item->transaksi_relasi->id }}" class="btn bg-primary btn-sm"><i class="fas fa-edit"></i></a>
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