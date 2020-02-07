<header class="main-header">
    <!-- Logo -->
    <a class="logo">
      Hello
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="navbar-custom-menu">
      <a class="text-bold-black" aria-labelledby="text-bold-black ">
                                    <a class="text-black" href="{{ url('proseslogoutadmin') }}">
                                        Logout
                                    </a>
 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
    </a>
    </nav>
    
  </header>
  