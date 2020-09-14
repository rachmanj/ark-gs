<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo pl-3">
      <a href="{{ route('home') }}">
        <h5 class="logo-text">ARKA</h5>
        <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        <h5 class="logo-text">GS</h5>
      </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION</li>
     <li>
       <a href="index.html" class="waves-effect">
         <i class="icon-home"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">
         <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-circle-o"></i> Dashboard 1</a></li>
         <li><a href="{{ route('dashboard.page_2') }}"><i class="fa fa-circle-o"></i> Dashboard 2</a></li>
         {{-- <li><a href="index3.html"><i class="fa fa-circle-o"></i> Dashboard v3</a></li>
         <li><a href="index4.html"><i class="fa fa-circle-o"></i> Dashboard v4</a></li> --}}
       </ul>
     </li>   
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="icon-fire"></i> <span>Tables Upload</span>
         <i class="fa fa-angle-left float-right"></i>
       </a>
       <ul class="sidebar-submenu">
         <li><a href="{{ route('powithetas.index') }}"><i class="fa fa-circle-o"></i> PO With ETA</a></li>
             <li><a href="{{ route('migis.index') }}"><i class="fa fa-circle-o"></i> MI GI</a></li>
             <li><a href="{{ route('incomings.index') }}"><i class="fa fa-circle-o"></i> Incoming</a></li>
             <li><a href="{{ route('progresmrs.index') }}"><i class="fa fa-circle-o"></i> Progres MR</a></li>
             <li><a href="icons-flags.html"><i class="fa fa-circle-o"></i> Flag Icons</a></li>
       </ul>
     </li>
     <li class="sidebar-header">ADMIN AREA</li>
    <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="fa fa-users"></i> <span>User Management</span>
         <i class="fa fa-angle-left float-right"></i>
       </a>
       <ul class="sidebar-submenu">
             <li><a href="pages-invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
             <li><a href="pages-user-profile.html"><i class="fa fa-circle-o"></i> User Profile</a></li>
             <li><a href="pages-lock-screen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
             <li><a href="pages-blank-page.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
             <li><a href="pages-coming-soon.html"><i class="fa fa-circle-o"></i> Coming Soon</a></li>
             <li><a href="pages-403.html"><i class="fa fa-circle-o"></i> 403 Error</a></li>
             <li><a href="pages-404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
             <li><a href="pages-500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
       </ul>
      </li>
   </ul>
    
  </div>