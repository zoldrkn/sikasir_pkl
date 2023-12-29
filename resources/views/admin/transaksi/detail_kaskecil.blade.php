@extends('layout.mainlayout')

@section('title', 'Detail Transaksi')
    
@section('content')

<!-- Modal ADD Pengguna -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">        
                <div class="card">
                    <div class="card-body">
                <h4>Detail Transaksi ( {{ $kaskecil->kode_kaskeluar }} // {{ $kaskecil->tanggal_transaksi }} )</h4>
            </div>
            <form class="form-horizontal" id="editkaskecil" action="/kaskecil/{{ $kaskecil->id }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">   
                    <!-- PENGGUNA -->
                    <div class="row">
                        <div class="offset-sm-1 col-sm-10">
                            <div class="form-group row">
                                <label for="karyawan_id" class="col-sm-3">Nama/Divisi</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>{{ $kaskecil->karyawan_relasi->nama_karyawan }} - {{ $kaskecil->karyawan_relasi->divisi }}                             
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan_transaksi" class="col-sm-3">Keterangan</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>{{ $kaskecil->keterangan_transaksi }}                             
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_keluar" class="col-sm-3">Jumlah Kas Keluar</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>
                                            Rp. {{ number_format($kaskecil->jumlah_keluar, 0, ',', '.') }},00                                                     
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_masuk" class="col-sm-3">Tanggal Kembali</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>{{ $kaskecil->tanggal_masuk }}                             
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_masuk" class="col-sm-3">Jumlah Kembali</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>
                                            Rp. {{ number_format($kaskecil->jumlah_masuk, 0, ',', '.') }},00                                                    
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ket1" class="col-sm-3">Nota (1)</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>{{ $kaskecil->transaksi_relasi->ket1}}                            
                                        </p>
                                    </div><br>
                                    <div>                                               
                                        <p>
                                            Rp. {{ number_format($kaskecil->transaksi_relasi->nominal1, 0, ',', '.') }},00                          
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ket2" class="col-sm-3">Nota (2)</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>{{ $kaskecil->transaksi_relasi->ket2}}                            
                                        </p>
                                    </div><br>
                                    <div>                                               
                                        <p>
                                            Rp. {{ number_format($kaskecil->transaksi_relasi->nominal2, 0, ',', '.') }},00                          
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ket3" class="col-sm-3">Nota (3)</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>
                                            {{ $kaskecil->transaksi_relasi->ket3}}                            
                                        </p>
                                    </div><br>
                                    <div>                                               
                                        <p>
                                            Rp. {{ number_format($kaskecil->transaksi_relasi->nominal3, 0, ',', '.') }},00                                                   
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ket4" class="col-sm-3">Nota (4)</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>{{ $kaskecil->transaksi_relasi->ket4}}                            
                                        </p>
                                    </div><br>
                                    <div>                                               
                                        <p>
                                            Rp. {{ number_format($kaskecil->transaksi_relasi->nominal4, 0, ',', '.') }},00                                               
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="pendapatan_lain" class="col-sm-3">Ket</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>{{ $kaskecil->transaksi_relasi->pendapatan_lain}}                            
                                        </p>
                                    </div><br>
                                    <div>                                               
                                        <p>Rp. {{ $kaskecil->transaksi_relasi->nominal_lainnya}}                           
                                        </p>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label for="pendapatan_lain" class="col-sm-3">Pendapatan Lain-Lain</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>
                                            Rp. {{ number_format($kaskecil->transaksi_relasi->pendapatan_lain, 0, ',', '.') }},00                          
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="beban_selisih" class="col-sm-3">Beban Selisih</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>
                                            Rp. {{ number_format($kaskecil->transaksi_relasi->beban_selisih, 0, ',', '.') }},00                          
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="total_nota" class="col-sm-3">Total Nota</label>
                                <div class="col-sm-9">
                                    <div>                                               
                                        <p>
                                            Rp. {{ number_format($kaskecil->transaksi_relasi->total_nota, 0, ',', '.') }},00                          
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class=" modal-footer right-content-between">
                    <a href="/kaskecil" class="btn btn-primary">Oke</a>
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

