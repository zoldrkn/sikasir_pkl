{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="bg-secondary">
  <div class="bg-white container-sm col-6 border my-3 rounded px-5 py-3 pb-5">
    <h1>Halo!!</h1>
    <div>Selamat datang di halaman admin</div>
    <div><a href="/logout" class="btn btn-sm btn-secondary">Logout >></a></div>
    <div class="card mt-3">
      <ul class="list-group list-group-flush">
        @if(Auth::user()->role == 'admin')
        <li class="list-group-item">Menu Operator</li>
        @endif
        @if(Auth::user()->role == 'kasir')
        <li class="list-group-item">Menu Kasir</li>
        @endif
      </ul>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
</body>

</html> --}}

@extends('layout.mainlayout')

@section('title', 'Setoran Penjualan')
    
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
                        @if(Auth::user()->role == 'kasir')
                        <div class="row">
                            <div class="col-12">
                                <a href="penjualan_tambah" class="btn btn-primary mb-3">
                                    <i class="far fa-plus"></i> Tambah Setoran
                                </a>
                                <div class="float-right">
                                    <p>Total Saldo</p>
                                    <h2>Rp. {{  number_format($saldoAkhir, 0, ',', '.')  }},00</h2>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- <h5>JUMLAH SETORAN</h5>
                        <p>Tanggal: </p>
                        <select class="form-control" name="selectedDate" id="selectedDate" onchange="updateJumlahSetoran()">
                            <option value="">-Pilih-</option>
                            @foreach ($penjualan as $tanggal_penjualan)
                                <option value="{{ $tanggal_penjualan->tanggal_penjualan }}">{{ $tanggal_penjualan->tanggal_penjualan }}</option>
                            @endforeach
                        </select>
                        <p id="jumlahSetoran"></p>

                        <script>
                            function updateJumlahSetoran() {
                                var selectedDate = document.getElementById('selectedDate').value;
                    
                                // Lakukan sesuatu dengan selectedDate (misalnya, cari jumlah setoran langsung di sisi klien)
                                // Gantilah logika ini dengan sesuatu yang sesuai dengan kebutuhan Anda
                                var jumlahSetoran = "Logika Penghitungan Jumlah Setoran di Sisi Klien";
                    
                                // Menampilkan jumlah setoran
                                document.getElementById('jumlahSetoran').innerText = 'Jumlah Setoran: ' + jumlahSetoran;
                            }
                        </script> --}}

                        <h5>JUMLAH SETORAN</h5>
                        <p>Tanggal: 
                        <select name="selectedDate" id="selectedDate" onchange="updateJumlahSetoran()">
                            <option value="">-Pilih-</option>
                            @php
                                $uniqueDates = [];
                            @endphp
                            @foreach ($penjualan as $tanggal_penjualan)
                                @if (!in_array($tanggal_penjualan->tanggal_penjualan, $uniqueDates))
                                    <option value="{{ $tanggal_penjualan->tanggal_penjualan }}">{{ date('d-M-Y', strtotime ($tanggal_penjualan->tanggal_penjualan ))}}</option>
                                    @php
                                        $uniqueDates[] = $tanggal_penjualan->tanggal_penjualan;
                                    @endphp
                                @endif
                            @endforeach
                        </select></p>
                        <p id="jumlahSetoran">Jumlah Setoran: <strong><span id="totalSetoran">Rp. 0</span></strong></p>


                        <script>
                            // Simulasi data penjualan, gantilah dengan data sebenarnya
                            var penjualanData = {!! json_encode($penjualan) !!};
                    
                            function formatRupiah(angka) {
                                var formatter = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                });
                                return formatter.format(angka);
                            }
                    
                            function updateJumlahSetoran() {
                                var selectedDate = document.getElementById('selectedDate').value;
                    
                                // Inisialisasi jumlah setoran
                                var jumlahSetoran = 0;
                    
                                // Iterasi data penjualan dan hitung jumlah setoran berdasarkan tanggal yang dipilih
                                for (var i = 0; i < penjualanData.length; i++) {
                                    if (penjualanData[i].tanggal_penjualan === selectedDate) {
                                        jumlahSetoran += parseFloat(penjualanData[i].setoran_penjualan);
                                    }
                                }
                    
                                // Menampilkan jumlah setoran dengan format rupiah
                                document.getElementById('totalSetoran').innerText = formatRupiah(jumlahSetoran);
                            }
                        </script>

                        {{-- @if(session::has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session::get('message') }}
                        </div>
                        @endif --}}

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
                        </div> --}}

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="active text-center">
                                        <th>No</th>
                                        <th>Tanggal Penjualan</th>
                                        <th>Keterangan Penjualan</th>
                                        <th>C/K</th>
                                        <th>Setoran Penjualan</th>
                                        @if(Auth::user()->role == 'kasir')
                                        <th width="14%">Tombol Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penjualan as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no+1 }}</td>
                                        <td>{{ date('d-M-Y', strtotime($item->tanggal_penjualan)) }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->pembayaran }}</td>
                                        <td>Rp. {{  number_format($item->setoran_penjualan, 0, ',', '.')  }},00</td>
                                        @if(Auth::user()->role == 'kasir')
                                        <td class="text-center">
                                                <a href="penjualan_edit/{{ $item->id }}" class="btn bg-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a data-toggle="modal" href="#delete_penjualan{{ $item->id }}"
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

@foreach ($penjualan as $no => $item)
<div class="modal fade" id="delete_penjualan{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <form action="penjualan_destroy/{{ $item->id }}" method="post">
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
