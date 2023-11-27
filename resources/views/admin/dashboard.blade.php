@extends('layout.mainlayout')

@section('title', 'Dashboard')
    
@section('content')
<!-- Konten Utama -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-sm-8 col-16">
          <div class="info-box text-white" style="background-color: #05427A;">
              <span class="info-box-icon"><i class="fas fa-sticky-note"></i></span>

              <div class="info-box-content">
                  <span class="info-box-text">Pengeluaran</span>
                  <span class="info-box-number">Rp. 00000</span>
              </div>
              <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4 col-sm-8 col-16">
          <div class="info-box bg-primary">
              <span class="info-box-icon"><i class="fas fa-sticky-note"></i></span>

              <div class="info-box-content">
                  <span class="info-box-text">Pemasukan</span>
                  <span class="info-box-number">Rp. 00000</span>
              </div>
              <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>
      <div class="col-md-4 col-sm-8 col-16">
        <div class="info-box text-white" style="background-color: #05427A;">
            <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Saldo</span>
                <span class="info-box-number">Rp. {{ $saldo_baru->jumlah_saldo }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
        <div class="card card-primary card-outline">
          
          @if(Auth::user()->role == 'admin')
            <div class="card-body">
                <h5>Hai 👋, Admin</h5>
                Selamat datang di Sistem Informasi Kas Kecil PT. Panen Embun Kemakmuran
            </div>
            @endif
            @if(Auth::user()->role == 'kasir')
            <div class="card-body">
                <h5>Hai 👋, Kasir</h5>
                Selamat datang di Sistem Informasi Kas Kecil PT. Panen Embun Kemakmuran
            </div>
            @endif
            <!-- /.card-body -->
        </div>
    </div>
</section>
<!-- /Konten Utama  -->
@endsection