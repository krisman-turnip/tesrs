<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('homeanggota') }}"><i class="fa fa-circle-o"></i> Home</a></li>
            <li><a href="{{ url('beranda') }}"><i class="fa fa-circle-o"></i> Profile</a></li>
            
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
            <li><a href="{{ url('produkanggota') }}"><i class="fa fa-circle-o"></i> List Produk</a></li>
            <li><a href="{{ url('produkanggota/pengajuan') }}"><i class="fa fa-circle-o"></i> pengajuan Produk</a></li>
            <li><a href="{{ url('produkanggota/diterima') }}"><i class="fa fa-circle-o"></i> Penjualan Produk</a></li>
            <li><a href="{{ url('produkanggota/ditolak') }}"><i class="fa fa-circle-o"></i> Penjualan Ditolak</a></li>
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
            <li><a href="{{ url('materianggota') }}"><i class="fa fa-circle-o"></i> Tampil Materi</a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Komisi </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('requestkomisi') }}"><i class="fa fa-circle-o"></i> Request Komisi </a></li>
            <li><a href="{{ url('lihatrequestkomisi') }}"><i class="fa fa-circle-o"></i> Status Request Komisi</a></li>
            <li><a href="{{ url('komisianggota') }}"><i class="fa fa-circle-o"></i> Komisi Anggota</a></li>
            <li><a href="{{ url('pembayaran') }}"><i class="fa fa-circle-o"></i> Pembayaran Komisi</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>LogOut</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('proseslogoutanggota') }}"><i class="fa fa-circle-o"></i> LogOut </a></li>
          </ul>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>