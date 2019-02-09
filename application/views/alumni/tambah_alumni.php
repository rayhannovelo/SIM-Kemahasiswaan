            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="m-t" role="form" action="<?php echo site_url('alumni/tambah_alumni_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data alumni akan ditambahkan. Apakah Anda yakin?');">
                                        <center><h1>Data Alumni</h1></center>
                                        <hr>
                                        <div class="form-group">
                                            <label>NIM (Username Akun) :</label>
                                            <input type="text" name="nim" class="form-control" placeholder="NIM" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Password Akun :</label>
                                            <input type="text" name="password" class="form-control" placeholder="Password Akun" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama :</label>
                                            <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Program Studi :</label>
                                            <div class="form-group">
                                                <select name="prodi" class="form-control">
                                                    <option value="">-- Pilih Program Studi --</option>
                                                    <option value="Teknik Informatika (S1 Reguler)">Teknik Informatika (S1 Reguler)</option>
                                                    <option value="Teknik Informatika (S1 Bilingual)">Teknik Informatika (S1 Bilingual)</option>
                                                    <option value="Sistem Komputer (S1 Reguler)">Sistem Komputer (S1 Reguler)</option>
                                                    <option value="Sistem Komputer (S1 Profesional)">Sistem Komputer (S1 Profesional)</option>
                                                    <option value="Teknik Komputer (D3)">Teknik Komputer (D3)</option>
                                                    <option value="Teknisi Komputer dan Jaringan (TKJ) (D3)">Teknisi Komputer dan Jaringan (TKJ) (D3)</option>
                                                    <option value="Sistem Informasi (S1 Reguler)">Sistem Informasi (S1 Reguler)</option>
                                                    <option value="Sistem Informasi (S1 Profesional)">Sistem Informasi (S1 Profesional)</option>
                                                    <option value="Sistem Informasi (S1 Bilingual)">Sistem Informasi (S1 Bilingual)</option>
                                                    <option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
                                                    <option value="Komputer Akuntansi (D3)">Komputer Akuntansi (D3)</option>
                                                    <option value="Magister Informatika (S2)">Magister Informatika (S2)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Strata :</label>
                                            <div class="form-group">
                                                <select name="strata" class="form-control">
                                                    <option value="">-- Pilih Strata --</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Lulus :</label>
                                            <input type="number" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus">
                                        </div>
                                        <div class="form-group">
                                            <label>Yudisium Ke- :</label>
                                            <input type="number" name="yudisium_ke" class="form-control" placeholder="Yudisium Ke-">
                                        </div>
                                        <div class="form-group">
                                            <label>No. Ijazah :</label>
                                            <input type="text" name="no_ijazah" class="form-control" placeholder="No. Ijazah">
                                        </div>
                                        <div class="form-group">
                                            <label>No. Seri Transkrip :</label>
                                            <input type="text" name="no_seri_transkrip" class="form-control" placeholder="No. Seri Transkrip">
                                        </div>
                                        <div class="form-group">
                                            <label>No. HP :</label>
                                            <input type="text" name="no_hp" class="form-control" placeholder="No. HP">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat :</label>
                                            <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                                        </div>
                                        <hr>
                                        <center><h1>Data Legalisir</h1></center>
                                        <div class="form-group">
                                            <label>Tambah Data Legalisir? </label>
                                            <label class="checkbox-inline"> 
                                                <input id="legalisir1" name="legalisir" value="Tidak" type="radio" checked> Tidak
                                            </label> 
                                            <label class="checkbox-inline"> 
                                                <input id="legalisir2" name="legalisir" value="Ya" type="radio"> Ya
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Ijazah :</label>
                                            <input id="jumlah_ijazah" type="number" name="jumlah_ijazah" class="form-control" placeholder="Jumlah Ijazah">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Transkrip :</label>
                                            <input id="jumlah_transkrip" type="number" name="jumlah_transkrip" class="form-control" placeholder="Jumlah Transkrip">
                                        </div>
                                        <div class="form-group">
                                            <label>Total Bayar :</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span> 
                                                <input id="total_bayar" type="number" name="total_bayar" placeholder="Total Bayar" class="form-control" >
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <center><h1>Data Pekerjaan</h1></center>
                                        <div class="form-group">
                                            <label>Tambah Data Pekerjaan? </label>
                                            <label class="checkbox-inline"> 
                                                <input id="pekerjaan1" name="pekerjaan" value="Tidak" type="radio" checked> Tidak
                                            </label> 
                                            <label class="checkbox-inline"> 
                                                <input id="pekerjaan2" name="pekerjaan" value="Ya" type="radio"> Ya
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Bulan Bekerja :</label>
                                            <input id="bulan_bekerja" type="number" name="bulan_bekerja" min="1" max="12" class="form-control" placeholder="Bulan Bekerja">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Bekerja :</label>
                                            <input id="tahun_bekerja" type="number" name="tahun_bekerja" class="form-control" placeholder="Tahun Bekerja">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Perusahaan :</label>
                                            <input id="nama_perusahaan" type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Perusahaan :</label>
                                            <textarea id="alamat_perusahaan" name="alamat_perusahaan" class="form-control" placeholder="Alamat Perusahaan"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Unit Kerja :</label>
                                            <input id="unit_kerja" type="text" name="unit_kerja" class="form-control" placeholder="Unit Kerja">
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan :</label>
                                            <input id="jabatan" type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Gaji :</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span> 
                                                <input id="jumlah_gaji" type="number" name="jumlah_gaji" placeholder="Jumlah Gaji" class="form-control" >
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                            <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                var legalisir1 = document.getElementById("legalisir1");
                var legalisir2 = document.getElementById("legalisir2");
                var pekerjaan1 = document.getElementById("pekerjaan1");
                var pekerjaan2 = document.getElementById("pekerjaan2");
                var jumlah_ijazah = document.getElementById("jumlah_ijazah");
                var jumlah_transkrip = document.getElementById("jumlah_transkrip");
                var total_bayar = document.getElementById("total_bayar");
                var bulan_bekerja = document.getElementById("bulan_bekerja");
                var tahun_bekerja = document.getElementById("tahun_bekerja");
                var nama_perusahaan = document.getElementById("nama_perusahaan");
                var alamat_perusahaan = document.getElementById("alamat_perusahaan");
                var unit_kerja = document.getElementById("unit_kerja");
                var jabatan = document.getElementById("jabatan");
                var jumlah_gaji = document.getElementById("jumlah_gaji");

                // Disable the button on initial page load
                jumlah_ijazah.disabled = true;
                jumlah_transkrip.disabled = true;
                total_bayar.disabled = true;
                bulan_bekerja.disabled = true;
                tahun_bekerja.disabled = true;
                nama_perusahaan.disabled = true;
                alamat_perusahaan.disabled = true;
                unit_kerja.disabled = true;
                jabatan.disabled = true;
                jumlah_gaji.disabled = true;

                //add event listener
                legalisir1.addEventListener('click', function(event) {
                    jumlah_ijazah.disabled = true;
                    jumlah_transkrip.disabled = true;
                    total_bayar.disabled = true;
                });

                legalisir2.addEventListener('click', function(event) {
                    jumlah_ijazah.disabled = false;
                    jumlah_transkrip.disabled = false;
                    total_bayar.disabled = false;
                });

                pekerjaan1.addEventListener('click', function(event) {
                    bulan_bekerja.disabled = true;
                    tahun_bekerja.disabled = true;
                    nama_perusahaan.disabled = true;
                    alamat_perusahaan.disabled = true;
                    unit_kerja.disabled = true;
                    jabatan.disabled = true;
                    jumlah_gaji.disabled = true;
                });

                pekerjaan2.addEventListener('click', function(event) {
                    bulan_bekerja.disabled = false;
                    tahun_bekerja.disabled = false;
                    nama_perusahaan.disabled = false;
                    alamat_perusahaan.disabled = false;
                    unit_kerja.disabled = false;
                    jabatan.disabled = false;
                    jumlah_gaji.disabled = false;
                });
            </script>