<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Anggota</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
      
            <li><a href="{{ url('home') }}"><i class="fa fa-circle-o"></i> Data Anggota</a></li>
            <li><a href="{{ url('anggota/tambah') }}"><i class="fa fa-circle-o"></i> Tambah Anggota</a></li>
        
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('produk') }}"><i class="fa fa-circle-o"></i> List Produk</a></li>
            <li><a href="{{ url('produk/tambah') }}"><i class="fa fa-circle-o"></i> Tambah Produk</a></li>
            <li><a href="{{ url('produk/produk_pengajuan') }}"><i class="fa fa-circle-o"></i> Pengajuan Produk</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Bahan Materi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('materi') }}"><i class="fa fa-circle-o"></i> Tampil Materi</a></li>
            
            <li><a href="{{ url('materi/upload') }}"><i class="fa fa-circle-o"></i> Upload Materi </a></li>
            
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Level Jabatan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('jabatan') }}"><i class="fa fa-circle-o"></i> Tampil Level</a></li>
            <li><a href="{{ url('jabatan/tambah') }}"><i class="fa fa-circle-o"></i> Tambah Level</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Email</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('email') }}"><i class="fa fa-circle-o"></i> Kirim Email </a></li>
            <li><a href="{{ url('emailtampil') }}"><i class="fa fa-circle-o"></i> Tampil Email </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin') }}"><i class="fa fa-circle-o"></i> Tampil Admin</a></li>
            <li><a href="{{ url('admin/tambah') }}"><i class="fa fa-circle-o"></i> Tambah Admin</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Pembayaran Komisi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('komisi/tampil') }}"><i class="fa fa-circle-o"></i> Tampil Komisi</a></li>
          </ul>
        </li>
     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>