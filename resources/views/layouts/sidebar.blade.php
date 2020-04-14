<aside class="main-sidebar control-sidebar-light">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('user') }}"><i class="fa fa-circle-o"></i> Tampil User</a></li>
            <li><a href="{{ url('user/tambah') }}"><i class="fa fa-circle-o"></i> Tambah User</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card"></i> <span>Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('karyawan') }}"><i class="fa fa-circle-o"></i> Tampil Karyawan</a></li>
            <li><a href="{{ url('karyawan/tambah') }}"><i class="fa fa-circle-o"></i> Tambah Karyawan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card"></i> <span>Barang Mentah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('barang_mentah') }}"><i class="fa fa-circle-o"></i> Tampil Barang Mentah</a></li>
            <li><a href="{{ url('barang_mentah/tambah') }}"><i class="fa fa-circle-o"></i> Tambah Barang Mentah</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card"></i> <span>Barang Jadi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('barang_jadi') }}"><i class="fa fa-circle-o"></i> Tampil Barang Jadi</a></li>
            <li><a href="{{ url('barang_jadi/tambah') }}"><i class="fa fa-circle-o"></i> Tambah Barang Jadi</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-underline"></i> <span>Satuan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('satuan') }}"><i class="fa fa-circle-o"></i> Tampil Satuan</a></li>
            <li><a href="{{ url('satuan/tambah') }}"><i class="fa fa-circle-o"></i> Tambah Satuan</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>