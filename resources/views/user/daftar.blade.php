@extends('layouts.app')

@section('title', 'Form Pendaftaran')

@section('content')
    <div class="main-content-inner">
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h2>Pendaftaran</h2>
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

        <form method="post" action="{{ route('user.daftar.submit') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <h2>Data Pribadi</h2>
                                <p>* Data yang telah diinput tidak dapat diubah kembali, harap isi dengan teliti dan benar</p>
                            </div>
                            <div class="market-status-table mt-4">
                                <div class="table-responsive" style="overflow-x:hidden;">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NISN*</label>
                                                <input name="nisn" type="text" class="form-control" placeholder="NISN" maxlength="12" value="{{ old('nisn') }}" required>
                                                @error('nisn')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NIK*</label>
                                                <input name="nik" type="text" class="form-control" placeholder="NIK" maxlength="16" value="{{ old('nik') }}" required>
                                                @error('nik')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Lengkap*</label>
                                                <input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" maxlength="50" value="{{ old('nama_lengkap') }}" required>
                                                @error('nama_lengkap')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Jenis Kelamin*</label>
                                                <select class="form-control" name="jenis_kelamin">
                                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tempat Lahir*</label>
                                                <input name="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" maxlength="100" value="{{ old('tempat_lahir') }}" required>
                                                @error('tempat_lahir')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tanggal Lahir*</label>
                                                <input name="tanggal_lahir" type="date" class="form-control" value="{{ old('tanggal_lahir') }}" required>
                                                @error('tanggal_lahir')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Lengkap*</label>
                                        <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{ old('alamat') }}" required>
                                        @error('alamat')<div class="text-danger">{{ $message }}</div>@enderror
                                    </div>
                                    
                                    {{-- Bagian Alamat Dinamis (Provinsi, Kota, Kecamatan, Kelurahan) --}}
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Provinsi*:</label>
                                                <div class="col-sm-9 p-0">
                                                    <select class="form-control" name="provinsi" id="provinsi">
                                                        <option></option>
                                                        @foreach($wilayahs as $wilayah)
                                                            <option value="{{ $wilayah->id }}" {{ old('provinsi') == $wilayah->id ? 'selected' : '' }}>{{ $wilayah->nama_wilayah }}</option>
                                                        @endforeach
                                                    </select>
                                                    <img src="{{ asset('assets/img/loading.gif') }}" width="35" id="load1" style="display:none;" />
                                                </div>
                                                @error('provinsi')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kota/Kabupaten*:</label>
                                                <div class="col-sm-9 p-0">          
                                                    <select class="form-control" name="kota" id="kota">
                                                        <option></option>
                                                    </select>
                                                    <img src="{{ asset('assets/img/loading.gif') }}" width="35" id="load2" style="display:none;" />
                                                </div>
                                                @error('kota')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kecamatan*:</label>
                                                <div class="col-sm-9 p-0">          
                                                    <select class="form-control" name="kecamatan" id="kecamatan">
                                                        <option></option>
                                                    </select>
                                                    <img src="{{ asset('assets/img/loading.gif') }}" width="35" id="load3" style="display:none;" />
                                                </div>
                                                @error('kecamatan')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kelurahan*:</label>
                                                <div class="col-sm-9 p-0">          
                                                    <select class="form-control" name="kelurahan" id="kelurahan">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                @error('kelurahan')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Agama*</label>
                                                <select class="form-control" name="agama">
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                                @error('agama')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon*</label>
                                                <input name="telepon" type="text" class="form-control" maxlength="15" value="{{ old('telepon') }}" required>
                                                @error('telepon')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
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
                                <h2>Data Orang Tua</h2>
                            </div>
                            <div class="market-status-table mt-4">
                                <div class="table-responsive" style="overflow-x:hidden;">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NIK Ayah*</label>
                                                <input name="ayah_nik" type="text" class="form-control" placeholder="NIK Ayah" maxlength="16" value="{{ old('ayah_nik') }}" required>
                                                @error('ayah_nik')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Ayah*</label>
                                                <input name="ayah_nama" type="text" class="form-control" placeholder="Nama Ayah" maxlength="40" value="{{ old('ayah_nama') }}" required>
                                                @error('ayah_nama')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Ayah</label>
                                                <select class="form-control" name="ayah_pendidikan">
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA/SMK/Sederajat</option>
                                                    <option value="S1">S1/Sederajat</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                                @error('ayah_pendidikan')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Ayah</label>
                                                <select class="form-control" name="ayah_pekerjaan">
                                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                                @error('ayah_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Ayah per bulan</label>
                                                <select class="form-control" name="ayah_penghasilan">
                                                    <option value="<500.000">< Rp500.000</option>
                                                    <option value="500.000-1.000.000">Rp500.000-Rp1.500.000</option>
                                                    <option value="1.500.000-3.500.000">Rp1.500.000-Rp3.500.000</option>
                                                    <option value="3.000.000-5.000.000">Rp3.500.000-Rp5.000.000</option>
                                                    <option value="5.000.000-10.000.000">Rp5.000.000-Rp10.000.000</option>
                                                    <option value="10.000.000-20.000.000">Rp10.000.000-20.000.000</option>
                                                    <option value=">20.000.000">> Rp20.000.000</option>
                                                </select>
                                                @error('ayah_penghasilan')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Ayah</label>
                                                <input name="ayah_telepon" type="text" class="form-control" maxlength="15" value="{{ old('ayah_telepon') }}">
                                                @error('ayah_telepon')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br><hr><br>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NIK Ibu*</label>
                                                <input name="ibu_nik" type="text" class="form-control" placeholder="NIK Ibu" maxlength="16" value="{{ old('ibu_nik') }}" required>
                                                @error('ibu_nik')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Ibu*</label>
                                                <input name="ibu_nama" type="text" class="form-control" placeholder="Nama Ibu" maxlength="40" value="{{ old('ibu_nama') }}" required>
                                                @error('ibu_nama')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Ibu</label>
                                                <select class="form-control" name="ibu_pendidikan">
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA/SMK/Sederajat</option>
                                                    <option value="S1">S1/Sederajat</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                                @error('ibu_pendidikan')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Ibu</label>
                                                <select class="form-control" name="ibu_pekerjaan">
                                                    <option value="Tidak Bekerja">Ibu Rumah Tangga</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                                @error('ibu_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Ibu per bulan</label>
                                                <select class="form-control" name="ibu_penghasilan">
                                                    <option value="<500.000">< Rp500.000</option>
                                                    <option value="500.000-1.000.000">Rp500.000-Rp1.500.000</option>
                                                    <option value="1.500.000-3.500.000">Rp1.500.000-Rp3.500.000</option>
                                                    <option value="3.000.000-5.000.000">Rp3.500.000-Rp5.000.000</option>
                                                    <option value="5.000.000-10.000.000">Rp5.000.000-Rp10.000.000</option>
                                                    <option value="10.000.000-20.000.000">Rp10.000.000-20.000.000</option>
                                                    <option value=">20.000.000">> Rp20.000.000</option>
                                                </select>
                                                @error('ibu_penghasilan')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Ibu</label>
                                                <input name="ibu_telepon" type="text" class="form-control" maxlength="15" value="{{ old('ibu_telepon') }}">
                                                @error('ibu_telepon')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br><hr><br>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NIK Wali</label>
                                                <input name="wali_nik" type="text" class="form-control" placeholder="NIK Wali" maxlength="16" value="{{ old('wali_nik') }}">
                                                @error('wali_nik')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Wali</label>
                                                <input name="wali_nama" type="text" class="form-control" placeholder="Nama Wali" maxlength="40" value="{{ old('wali_nama') }}">
                                                @error('wali_nama')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Wali</label>
                                                <select class="form-control" name="wali_pekerjaan">
                                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                                @error('wali_pekerjaan')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Wali</label>
                                                <input name="wali_telepon" type="text" class="form-control" maxlength="15" value="{{ old('wali_telepon') }}">
                                                @error('wali_telepon')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
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
                                <h2>Data Sekolah Asal & Berkas</h2>
                                <p>Data yang telah diinput tidak dapat diubah kembali</p>
                            </div>
                            <div class="market-status-table mt-4">
                                <div class="table-responsive" style="overflow-x:hidden;">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NPSN Sekolah Asal</label>
                                                <input name="sekolah_npsn" type="text" class="form-control" placeholder="NPSN Sekolah Asal" maxlength="12" value="{{ old('sekolah_npsn') }}" required>
                                                @error('sekolah_npsn')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Sekolah Asal</label>
                                                <input name="sekolah_nama" type="text" class="form-control" placeholder="Nama Sekolah Asal" maxlength="40" value="{{ old('sekolah_nama') }}" required>
                                                @error('sekolah_nama')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="foto" class=" form-control-label">Pas Foto 4x6 (JPG/PNG), maks 500kb</label>
                                                <input type="file" id="foto" name="foto" class="form-control-file" required>
                                                @error('foto')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="scan_ijazah_depan" class=" form-control-label">Scan Ijazah Bagian Depan (JPG/PNG), maks 500kb</label>
                                                <input type="file" id="scan_ijazah_depan" name="scan_ijazah_depan" class="form-control-file" required>
                                                @error('scan_ijazah_depan')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="scan_ijazah_belakang" class=" form-control-label">Scan Ijazah Bagian Belakang (JPG/PNG), maks 500kb</label>
                                                <input type="file" id="scan_ijazah_belakang" name="scan_ijazah_belakang" class="form-control-file" required>
                                                @error('scan_ijazah_belakang')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
