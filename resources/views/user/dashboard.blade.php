@extends('layouts.app')

@section('title', 'Dashboard Pengguna')

@section('content')
    <div class="main-content-inner">
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h2>Dashboard Pengguna</h2>
                        </div>
                        <div class="market-status-table mt-4">
                            <div class="table-responsive">
                                Selamat datang di sistem informasi Penerimaan Peserta Didik Baru (PPDB) Online.
                                <br>Sistem ini disusun oleh Kelompok 1
                                <br><br>
                                Panduan Pendaftaran:
                                <br>1. Isi seluruh formulir yang ditampilkan kemudian periksa kembali, pastikan tidak ada data yang salah.
                                <br>2. Klik submit, kemudian klik Confirm. Setelah di-confirm, data tidak dapat diubah kembali.
                                <br>3. Jika sudah, bukti pendaftaran akan ditampilkan dan dapat diunduh menjadi PDF
                                <br>
                                <br>*Note: Pihak sekolah baru akan menerima data Anda setelah Anda klik 'Confirm'
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h2>Status Pendaftaran Anda</h2>
                        </div>
                        <div class="market-status-table mt-4">
                            <div class="table-responsive" style="overflow-x:hidden;">
                                @if ($pendaftar)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap:</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->nama_lengkap }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NISN:</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->nisn }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Verifikasi:</label>
                                        <input type="text" class="form-control" value="{{ ucfirst($pendaftar->status_verifikasi) }}" disabled>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('user.mydata') }}" class="btn btn-primary">Lihat Detail Data</a>
                                        @if($pendaftar->status_verifikasi == 'terverifikasi')
                                            <a href="{{ route('user.report') }}" class="btn btn-info">Cetak Bukti Pendaftaran</a>
                                        @endif
                                    </div>
                                @else
                                    <div class="alert alert-info" role="alert">
                                        Anda belum mengisi data pendaftaran. Silakan isi formulir pendaftaran.
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('user.daftar.form') }}" class="btn btn-success">Isi Data Pendaftaran Sekarang</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

