<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    @include('user.include.headerusercss')
   </head>
   <!-- body -->
   @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('user/images/loading.gif')}}" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         @include('user.include.navbaruser')
      </header>
      <!-- end header inner -->

      <!-- end header -->
      <!-- banner -->
      @yield('content')

      @include('user.include.footeruser')
      <!-- end footer -->
      <!-- Javascript files-->
      @include('user.include.scriptuser')
   </body>
</html>
