@extends('layouts.app')

@section('title', 'Data Pendaftaran Saya')

@section('content')
    <!-- page title area end -->
    <div class="main-content-inner">
        <!-- panduan -->
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h2>Data Pendaftaran Saya</h2>
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

        @if ($pendaftar)
            <!-- formulir Data Pribadi -->
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center" style="position: relative;">
                                <h2>Data Pribadi</h2>
                                <hr style="position: absolute; top: 50%; left: 0; right: 0; border: 1px solid #ccc; z-index: 1;">
                                <button type="button" class="fa fa-caret-down" id="toggleButtonVisibility" style="font-size: larger; border:none;"></button>
                            </div>
                            <div id="dataPribadi" class="market-status-table mt-4" style="display: none;">
                                <div class="table-responsive" style="overflow-x:hidden;">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NISN</label>
                                                <input name="nisn" type="text" class="form-control" maxlength="12" value="{{ $pendaftar->nisn }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input name="nik" type="text" class="form-control" maxlength="16" value="{{ $pendaftar->nik ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input name="nama_lengkap" type="text" class="form-control" maxlength="50" value="{{ $pendaftar->nama_lengkap }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control" name="jenis_kelamin" disabled>
                                                    <option>{{ $pendaftar->jenis_kelamin }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input name="tempat_lahir" type="text" class="form-control" maxlength="20" value="{{ $pendaftar->tempat_lahir }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input name="tanggal_lahir" type="date" class="form-control" value="{{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('Y-m-d') }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Lengkap</label>
                                        <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{ $pendaftar->alamat }}" disabled>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Provinsi:</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->wilayah->nama_wilayah ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kota/Kabupaten:</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->kabupaten ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kecamatan:</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->kecamatan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kelurahan:</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->kelurahan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->agama ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input name="telepon" type="text" class="form-control" maxlength="15" value="{{ $pendaftar->telepon ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- formulir Data Orang Tua -->
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center" style="position: relative;">
                                <h2>Data Orang Tua</h2>
                                <hr style="position: absolute; top: 50%; left: 0; right: 0; border: 1px solid #ccc; z-index: 1;">
                                <button type="button" class="fa fa-caret-down" id="toggleButtonOrangTua" style="font-size: larger; border:none;"></button>
                            </div>
                            <div id="dataOrangTua" class="market-status-table mt-4" style="display: none;">
                                <div class="table-responsive" style="overflow-x:hidden;">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NIK Ayah</label>
                                                <input name="ayah_nik" type="text" class="form-control" value="{{ $pendaftar->ayah_nik ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Ayah</label>
                                                <input name="ayah_nama" type="text" class="form-control" value="{{ $pendaftar->ayah_nama ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Ayah</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->ayah_pendidikan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Ayah</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->ayah_pekerjaan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Ayah per bulan</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->ayah_penghasilan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Ayah</label>
                                                <input name="ayah_telepon" type="text" class="form-control" maxlength="15" value="{{ $pendaftar->ayah_telepon ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <br><hr><br>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NIK Ibu</label>
                                                <input name="ibu_nik" type="text" class="form-control" value="{{ $pendaftar->ibu_nik ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Ibu</label>
                                                <input name="ibu_nama" type="text" class="form-control" value="{{ $pendaftar->ibu_nama ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Ibu</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->ibu_pendidikan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Ibu</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->ibu_pekerjaan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Ibu per bulan</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->ibu_penghasilan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Ibu</label>
                                                <input name="ibu_telepon" type="text" class="form-control" maxlength="15" value="{{ $pendaftar->ibu_telepon ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <br><hr><br>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NIK Wali</label>
                                                <input name="wali_nik" type="text" class="form-control" value="{{ $pendaftar->wali_nik ?? 'N/A' }}" maxlength="16" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Wali</label>
                                                <input name="wali_nama" type="text" class="form-control" value="{{ $pendaftar->wali_nama ?? 'N/A' }}" maxlength="40" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Wali</label>
                                                <input type="text" class="form-control" value="{{ $pendaftar->wali_pekerjaan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Wali</label>
                                                <input name="wali_telepon" type="text" class="form-control" maxlength="15" value="{{ $pendaftar->wali_telepon ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- formulir Data Sekolah Asal & Berkas -->
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center" style="position: relative;">
                                <h2>Data Sekolah Asal & Berkas</h2>
                                <hr style="position: absolute; top: 50%; left: 0; right: 0; border: 1px solid #ccc; z-index: 1;">
                                <button type="button" class="fa fa-caret-down" id="toggleButtonSekolah" style="font-size: larger; border:none;"></button>
                            </div>
                            <div id="dataSekolah" class="market-status-table mt-4" style="display: none;">
                                <div class="table-responsive" style="overflow-x:hidden;">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NPSN Sekolah Asal</label>
                                                <input name="sekolah_npsn" type="text" class="form-control" value="{{ $pendaftar->sekolah_npsn ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Sekolah Asal</label>
                                                <input name="sekolah_nama" type="text" class="form-control" value="{{ $pendaftar->sekolah_nama ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="foto" class=" form-control-label">Pas Foto 4x6</label>
                                                @if($pendaftar->foto)
                                                    <img src="{{ asset($pendaftar->foto) }}" width="50%" class="img-fluid">
                                                @else
                                                    <p>Foto belum diunggah.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="scan_ijazah_depan" class=" form-control-label">Scan Ijazah Bagian Depan</label>
                                                @if($pendaftar->scan_ijazah_depan)
                                                    <img src="{{ asset($pendaftar->scan_ijazah_depan) }}" width="50%" class="img-fluid">
                                                @else
                                                    <p>Scan Ijazah Depan belum diunggah.</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="scan_ijazah_belakang" class=" form-control-label">Scan Ijazah Bagian Belakang</label>
                                                @if($pendaftar->scan_ijazah_belakang)
                                                    <img src="{{ asset($pendaftar->scan_ijazah_belakang) }}" width="50%" class="img-fluid">
                                                @else
                                                    <p>Scan Ijazah Belakang belum diunggah.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {{-- Tombol Edit (jika ingin mengizinkan user mengedit data setelah submit tapi sebelum verified) --}}
                {{-- <a href="{{ route('user.daftar.edit') }}" class="btn btn-warning">Edit Data</a> --}}

                @if($pendaftar->status_verifikasi === 'pending')
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirmModal">Konfirmasi</button>
                @elseif($pendaftar->status_verifikasi === 'terverifikasi')
                    <a href="{{ route('user.report') }}" class="btn btn-info">Lihat Bukti Pendaftaran</a>
                @endif
            </div>

            <!-- The Konfirmasi Modal -->
            <div class="modal fade" id="confirmModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('user.daftar.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="action" value="confirm">
                            <input type="hidden" name="id_pendaftar" value="{{ $pendaftar->id_pendaftar }}">

                            <!-- Modal body -->
                            <div class="modal-body">
                                Apakah Anda yakin untuk konfirmasi data Anda? Setelah dikonfirmasi, data tidak dapat diubah kembali.
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Konfirmasi</button>
                            </div>
                        </form>
                    </div>
                </div>
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

    {{-- Script untuk toggle section --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Toggle Data Pribadi
            const toggleButtonVisibility = document.getElementById('toggleButtonVisibility');
            const dataPribadi = document.getElementById('dataPribadi');
            if (toggleButtonVisibility && dataPribadi) {
                toggleButtonVisibility.addEventListener('click', function() {
                    if (dataPribadi.style.display === "none") {
                        dataPribadi.style.display = "block";
                        this.classList.remove('fa-caret-down');
                        this.classList.add('fa-caret-up');
                    } else {
                        dataPribadi.style.display = "none";
                        this.classList.remove('fa-caret-up');
                        this.classList.add('fa-caret-down');
                    }
                });
            }

            // Toggle Data Orang Tua
            const toggleButtonOrangTua = document.getElementById('toggleButtonOrangTua');
            const dataOrangTua = document.getElementById('dataOrangTua');
            if (toggleButtonOrangTua && dataOrangTua) {
                toggleButtonOrangTua.addEventListener('click', function() {
                    if (dataOrangTua.style.display === "none") {
                        dataOrangTua.style.display = "block";
                        this.classList.remove('fa-caret-down');
                        this.classList.add('fa-caret-up');
                    } else {
                        dataOrangTua.style.display = "none";
                        this.classList.remove('fa-caret-up');
                        this.classList.add('fa-caret-down');
                    }
                });
            }

            // Toggle Data Sekolah Asal & Berkas
            const toggleButtonSekolah = document.getElementById('toggleButtonSekolah');
            const dataSekolah = document.getElementById('dataSekolah');
            if (toggleButtonSekolah && dataSekolah) {
                toggleButtonSekolah.addEventListener('click', function() {
                    if (dataSekolah.style.display === "none") {
                        dataSekolah.style.display = "block";
                        this.classList.remove('fa-caret-down');
                        this.classList.add('fa-caret-up');
                    } else {
                        dataSekolah.style.display = "none";
                        this.classList.remove('fa-caret-up');
                        this.classList.add('fa-caret-down');
                    }
                });
            }
        });
    </script>
@endsection
