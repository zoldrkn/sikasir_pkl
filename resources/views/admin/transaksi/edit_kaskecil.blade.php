@extends('layout.mainlayout')

@section('title', 'Edit Transaksi')
    
@section('content')

<!-- Modal ADD Pengguna -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                <h4>Edit Transaksi ( {{ $kaskecil->kode_kaskeluar }} // {{ $kaskecil->tanggal_transaksi }} )</h4>
            </div>
            <form class="form-horizontal" id="editkaskecil" action="/kaskecil/{{ $kaskecil->id }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <!-- PENGGUNA -->
                    <div class="row">
                        <div class="offset-sm-1 col-sm-10">
                            <div class="form-group row">
                                <label for="keterangan_transaksi" class="col-sm-3">Keterangan</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keterangan_transaksi" id="keterangan_transaksi" value="{{ $kaskecil->keterangan_transaksi }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_keluar" class="col-sm-3">Jumlah Kas Keluar</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="jumlah_keluar" id="jumlah_keluar" value="{{ $kaskecil->jumlah_keluar }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_masuk" class="col-sm-3">Tanggal Kembali</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="{{ $kaskecil->tanggal_masuk }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_masuk" class="col-sm-3">Jumlah Kembali</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="jumlah_masuk" id="jumlah_masuk" value="{{ $kaskecil->jumlah_masuk }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ket1" class="col-sm-3">Lainnya (1)</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="ket1" id="ket1" value="{{ $kaskecil->nominal1 }}" >
                                    </div><br>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="nominal1" id="nominal1" value="{{ $kaskecil->nominal1 }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ket2" class="col-sm-3">Lainnya (2)</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="ket2" id="ket2" value="{{ $kaskecil->ket2 }}" >
                                    </div><br>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="nominal2" id="nominal2" value="{{ $kaskecil->nominal2 }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ket3" class="col-sm-3">Lainnya (3)</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="ket3" id="ket3" value="{{ $kaskecil->ket3 }}" >
                                    </div><br>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="nominal3" id="nominal3" value="{{ $kaskecil->nominal3 }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ket4" class="col-sm-3">Lainnya (4)</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="ket4" id="ket4" value="{{ $kaskecil->ket4 }}" >
                                    </div><br>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="nominal4" id="nominal4" value="{{ $kaskecil->nominal4 }}" >
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="" class="col-sm-3">Lainnya (3)</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="" id="" value="" >
                                    </div><br>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="" id="" value="" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3">Lainnya (4)</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="" id="" value="" >
                                    </div><br>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="" id="" value="" >
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-sm-3">Ket</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control" name="lainnya">
                                            <option value="">-Pilih-</option>
                                            <option value="Pendapatan Lain-Lain">Pendapatan Lain-Lain</option>
                                            <option value="Beban Selisih">Beban Selisih</option>
                                        </select><br>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="lainnya_nominal" id="lainnya_nominal" value="{{ $kaskecil->nominal_lainnya }}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="profit" class="col-sm-3 ">Ket</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control">
                                        {{ $kaskecil->lainnya }}
                                <option value="" {{ $kaskecil == '' ? "selected" : null;}}>--Pilih--</option>
                                <option value="Pendapatan Lain-Lain" {{ $kaskecil->lainnya=='Pendapatan Lain-Lain'? "selected": null; }}>Pendapatan Lain-Lain</option>
                                <option value="Beban Selisih" {{ $kaskecil->lainnya=='Beban Selisih'? "selected": null; }}>Beban Selisih</option>      
                                    </select><br>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="" id="" value="   {{ $kaskecil->nominal_lainnya }}" >
                                    </div>
                                </div>
                                
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class=" modal-footer right-content-between">
                    <a href="/kaskecil" class="btn btn-default">Batal</a>
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

