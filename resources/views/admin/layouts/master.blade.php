<!DOCTYPE html>
<html>
  <head>
 @include('admin.includes.headeradmin')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <header class="header">
@include('admin.includes.navbaradmin')
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.includes.sidebaradmin')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
       @yield('content')
        @include('admin.includes.footer')
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.includes.script')
  </body>
</html>
