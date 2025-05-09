
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Vclaim</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       
                        {{-- peserta --}}
                        <h6 class="collapse-header"><strong>Peserta:</strong></h6>
                        <a class="collapse-item" href="{{ route('vclaim.peserta.noKaBPJS') }}">Peserta No.Kartu BPJS</a>
                        <a class="collapse-item" href="{{ route('vclaim.peserta.nikBPJS') }}">Peserta NIK</a>
                       
                        {{-- referensi --}}
                        <h6 class="collapse-header">Referensi:</h6>
                        <a class="collapse-item" href="{{ route('vclaim.referensi.diagnosa') }}">Diagnosa</a>
                        <a class="collapse-item" href="{{ route('vclaim.referensi.poli') }}">Poli</a>
                        <a class="collapse-item" href="{{ route('vclaim.referensi.fasilitas-kesehatan') }}">Fasilitas Kesehatan</a>
                        <a class="collapse-item" href="{{ route('vclaim.referensi.dpjp') }}">Dokter DPJP</a>
                        <a class="collapse-item" href="{{ route('vclaim.referensi.ObatGnerikPRBController') }}">Obat Gnerik PRB</a>
                        
                        {{-- prb --}}
                        <h6 class="collapse-header">PRB:</h6>
                        <a class="collapse-item" href="{{ route('vclaim.prb.NomorSRB') }}">Data PRB Nomor SRB</a>
                        
                        {{-- rencana kontrol --}}
                        <h6 class="collapse-header">Rencana Kontrol:</h6>
                        <a class="collapse-item" href="{{ route('vclaim.rencanKontrol.CariNoSuratKontrol') }}">Cari Nomor Surat Kontrol</a>
                        
                        {{-- SEP --}}
                        <h6 class="collapse-header">SEP:</h6>
                        <a class="collapse-item" href="{{ route('vclaim.sep.noKa') }}">Cari SEP dengan NO Ka</a>
                        <a class="collapse-item" href="{{ route('vclaim.sep.CariSepByNoKa') }}">Cari SEP dengan NO Rujukan</a>


                        {{-- <a class="collapse-item" href="{{ route('vclaim.peserta.nikBPJS') }}">Peserta NIK</a> --}}
                        {{-- <a class="collapse-item" href="">Peserta No.Kartu BPJS</a> --}}
                        {{-- <a class="collapse-item" href="">Cards</a> --}}
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu Antrian -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Antrian MJKN</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">WS BPJS:</h6>
                        <a class="collapse-item" href="{{ route('Antrian.DashboardPerTanggal') }}">Dashboard Antrian Per Tanggal</a>
                        <a class="collapse-item" href="{{ route('Antrian.DashboardPerBulan') }}">Dashboard Antrian Per Bulan</a>
                        
                        
                        
                        {{-- <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a> --}}
                    
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bedrs"
                    aria-expanded="true" aria-controls="bedrs">
                    <i class="fas fa-bed"></i>
                    <span>tempat tidur RS</span>
                </a>
                <div id="bedrs" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">BED RS:</h6>

                        <a class="collapse-item" href="{{ route('tempaTidur.index') }}">Dashbord BEd RS</a>
                        <a class="collapse-item" href="{{ route('jadwalOperasi.index') }}">jadwalOperasi</a>
                    
                    </div>
                </div>
            </li>


            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        