<div id="wrapper">

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="<?php echo base_url()."assets" ?>/img/profile_small.jpg" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION ['data']['nama']; ?></strong>
                         </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li <?php if($page==1)echo "class='active'"; ?>>
                <a href="<?php echo base_url()."admin/home"?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li <?php if(substr($page,0,1)=='2')echo "class='active'"; ?>>
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Master Data</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                  <li <?php if(substr($page,0,2)=='21')echo "class='active'"; ?>>
                    <a href="#">Master Pusat <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                      <li <?php if(substr($page,0,3)=='211')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/perguruantinggi"?>">Perguruan Tinggi</a>
                      </li>
                      <li <?php if(substr($page,0,3)=='212')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datafakultas"?>">Fakultas</a>
                      </li>
                      <li <?php if(substr($page,0,3)=='213')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datajurusan"?>">Program Studi</a>
                      </li>
                      <li <?php if(substr($page,0,3)=='214')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datapimpinan"?>">Pimpinan</a>
                      </li>
                    </ul>
                  </li>
                  <li <?php if(substr($page,0,2)=='22')echo "class='active'"; ?>>
                    <a href="#">Akademik <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                      <li <?php if(substr($page,0,3)=='221')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datamatakuliah"?>">Mata Kuliah</a>
                      </li>
                      <li <?php if(substr($page,0,3)=='222')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/tahunakademik"?>">Tahun Akademik</a>
                      </li>
                      <li <?php if(substr($page,0,3)=='223')echo "class='active'"; ?>>
                        <a href="<?php echo base_url()."admin/datakelas"?>">Kelas</a>
                      </li>
                      <li <?php if(substr($page,0,3)=='224')echo "class='active'"; ?>>
                        <a href="#">Gedung & Ruangan <span class="fa arrow"></span></a>
                      <ul class="nav nav-fourth-level">
                        <li <?php if(substr($page,0,4)=='2241')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datagedung"?>">&nbsp;&nbsp; Data Gedung</a>
                        </li>
                        <li <?php if(substr($page,0,4)=='2242')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/dataruangan"?>">&nbsp;&nbsp; Data Ruangan</a>
                        </li>
                      </ul>
                    </li>
                    </ul>
                  </li>
                  <li <?php if(substr($page,0,2)=='23')echo "class='active'"; ?>>
                    <a href="#">Civitas <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                      <li <?php if(substr($page,0,3)=='231')echo "class='active'"; ?>><a href="<?php echo base_url()."admin/akunpegawai"?>">Data Akun Pegawai</a></li>
                      <li <?php if(substr($page,0,3)=='232')echo "class='active'"; ?>>
                        <a href="#">Data Pimpinan <span class="fa arrow"></span></a>
                      <ul class="nav nav-fourth-level">
                        <li <?php if(substr($page,0,4)=='2321')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datarektor"?>">&nbsp;&nbsp; Data Rektor</a>
                        </li>
                        <li <?php if(substr($page,0,4)=='2322')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datadekan"?>">&nbsp;&nbsp; Data Dekan</a>
                        </li>
                        <li <?php if(substr($page,0,4)=='2323')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datakaprodi"?>">&nbsp;&nbsp; Data Kaprodi</a>
                        </li>
                      </ul>
                    </li>
                      <li <?php if(substr($page,0,3)=='233')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datadosen"?>">Data Dosen</a>
                      </li>
                      <li <?php if(substr($page,0,3)=='234')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datamahasiswa"?>">Data Mahasiswa</a>
                      </li>
                      <li <?php if(substr($page,0,3)=='235')echo "class='active'"; ?>>
                          <a href="<?php echo base_url()."admin/datastaff"?>">Data Staff</a>
                      </li>
                    </ul>
                  </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-group"></i> <span class="nav-label">PMB Online </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="#">Konfigurasi<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                          <li>
                              <a href="<?php echo base_url()."admin/periodepmb"?>">Periode PMB</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url()."admin/masterjalurpmb"?>">Master Jalur PMB</a>
                          </li>
                          <li>
                              <a href="#">Master Berkas Upload</a>
                          </li>
                          <li>
                              <a href="#">Asal Sekolah</a>
                          </li>
                          <li>
                              <a href="#">Asal Perguruan Tinggi</a>
                          </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">MABA<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                          <li>
                              <a href="#">Calon MABA</a>
                          </li>
                          <li>
                              <a href="#">Nilai USM</a>
                          </li>
                          <li>
                              <a href="#">HER MABA</a>
                          </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li <?php if(substr($page,0,1)=='4')echo "class='active'"; ?>>
                <a href="#"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Akademika </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li <?php if(substr($page,0,2)=='41')echo "class='active'"; ?>>
                        <a href="#">KRS<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                          <li>
                              <a href="#">Data KRS</a>
                          </li>
                          <li <?php if(substr($page,0,3)=='412')echo "class='active'"; ?>>
                              <a href="<?php echo base_url()."admin/jadwalkrs"?>">Jadwal KRS</a>
                          </li>
                          <li>
                              <a href="#">Ekuivalensi Mata Kuliah</a>
                          </li>
                        </ul>
                      </li>
                    <li>
                        <a href="#">Status Mahasiswa<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                          <li>
                              <a href="#">Pengajuan Cuti</a>
                          </li>
                          <li>
                              <a href="#">Mahasiswa Cuti</a>
                          </li>
                          <li>
                              <a href="#">Lulus Semester</a>
                          </li>
                          <li>
                              <a href="#">Lulus Akademik</a>
                          </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Perkuliahan<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                          <li>
                              <a href="#">Aspek Nilai</a>
                          </li>
                          <li>
                              <a href="#">Jadwal Kuliah</a>
                          </li>
                          <li>
                              <a href="#">Presensi Dosen</a>
                          </li>
                          <li>
                              <a href="#">Presensi Mahasiswa</a>
                          </li>
                          <li>
                              <a href="#">Mata Kuliah Aktif</a>
                          </li>
                        </ul>
                    </li>
                    <li>
                      <a href="#">KHS<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                          <li>
                              <a href="#">Nilai Semester</a>
                          </li>
                          <li>
                            <a href="#">Transkrip Nilai</a>
                          </li>
                          <li>
                            <a href="#">Laporan Nilai</a>
                          </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-credit-card"></i> <span class="nav-label">Keuangan </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Data Saldo</a></li>
                    <li>
                        <a href="#">Keuangan Mahasiswa<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                          <li>
                              <a href="#">Data Biaya Kuliah</a>
                          </li>
                          <li>
                              <a href="#">Data Pembayaran</a>
                          </li>
                          <li>
                              <a href="#">Laporan Pembayaran</a>
                          </li>
                        </ul>
                    </li>
                    <li><a href="#">Rencana Anggaran</a></li>
                    <li><a href="#">Jurnal</a></li>
                    <li><a href="#">Laporan Keuangan</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-pie-chart"></i> <span class="nav-label">Data Grafik </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Presensi</a></li>
                    <li><a href="#">PMB</a></li>
                    <li><a href="#">Mahasiswa</a></li>
                    <li><a href="#">IP Semester</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url()."admin/feederdikti"?>"><i class="fa fa-institution"></i> <span class="nav-label">Feeder Dikti</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Ticketing</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-gear"></i> <span class="nav-label">Konfigurasi</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                  <li><a href="#">Backup Data</a></li>
                  <li><a href="#">Restore Data</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">LKD</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                  <li><a href="<?php echo base_url()."admin/datalkd"?>">Data Kegiatan</a></li>
                  <li><a href="<?php echo base_url()."admin/konfigwaktu"?>" class="hidden">Konfigurasi Waktu</a></li>
                </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Akun Saya</span></a>
            </li>
        </ul>

    </div>
</nav>
