<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">

        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Hotel Room </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('createroom') }}">Add Room</a></li>
                <li><a href="{{ url('viewroom') }}">View Room</a></li>
            </ul>
        </li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Book Room </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('books') }}">view book Room</a></li>
                {{-- <li><a href="{{url('viewroom')}}">View Room</a></li> --}}
            </ul>
        </li>
        <li><a href="{{ url('viewgallery') }}"><i class="icon-windows"></i>View Gallery</a></li>
        <li><a href="{{ url('message') }}"><i class="icon-windows"></i>View message</a></li>

        <li><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i> About </a>
            <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                <li><a href="{{ url('aboutdatas') }}">Add about</a></li>
                <li><a href="{{ url('add-aboutdata') }}">View about</a></li>
            </ul>
        </li>


        <li><a href="{{ url('viewcatagory') }}"><i class="icon-windows"></i>Add Catagory</a></li>

        <li><a href="{{ url('order') }}"><i class="icon-windows"></i> view order</a></li>

        <li><a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i> Product </a>
            <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                <li class="nav-item"> <a class="nav-link" href="{{ url('view_product') }}"><i
                    class="icon-windows"></i> Add Product</a></li>

                <li class="nav-item"> <a class="nav-link" href="{{ url('/show_product') }}"><i
                    class="icon-windows"></i> Show Product</a></li>

            </ul>
        </li>
    </ul>

</nav>
