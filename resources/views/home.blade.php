
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>ARK-GS | Dashboard</title>
  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('assets/css/icons.cs') }}s" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>
  
  
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
       <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">RockerAdmin</h5>
     </a>
	 </div>
	 <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="index.html" class="waves-effect">
          <i class="icon-home"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          <li><a href="index3.html"><i class="fa fa-circle-o"></i> Dashboard v3</a></li>
          <li><a href="index4.html"><i class="fa fa-circle-o"></i> Dashboard v4</a></li>
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-briefcase"></i>
          <span>UI Elements</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
  		  <li><a href="ui-typography.html"><i class="fa fa-circle-o"></i> Typography</a></li>
  		  <li><a href="ui-buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
  		  <li><a href="ui-checkbox-radio.html"><i class="fa fa-circle-o"></i> Checkboxes & Radios</a></li>
  		  <li><a href="ui-nav-tabs.html"><i class="fa fa-circle-o"></i> Nav Tabs</a></li>
        <li><a href="ui-accordions.html"><i class="fa fa-circle-o"></i> Accordions</a></li>
  		  <li><a href="ui-modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
  		  <li><a href="ui-bootstrap-elements.html"><i class="fa fa-circle-o"></i> BS Elements</a></li>
        <li><a href="ui-pagination.html"><i class="fa fa-circle-o"></i> Pagination</a></li>
        <li><a href="ui-list-groups.html"><i class="fa fa-circle-o"></i> List Groups</a></li>
        <li><a href="ui-alerts.html"><i class="fa fa-circle-o"></i> Alerts</a></li>
  		  <li><a href="ui-progressbars.html"><i class="fa fa-circle-o"></i> Progress Bars</a></li>
  		  <li><a href="ui-notification.html"><i class="fa fa-circle-o"></i> Notifications</a></li>
  		  <li><a href="ui-sweet-alert.html"><i class="fa fa-circle-o"></i> Sweet Alerts</a></li>
        </ul>
      </li>
      <li>
        <a href="calendar.html" class="waves-effect">
          <i class="icon-calendar"></i> <span>Calendar</span>
          <small class="badge float-right badge-info">New</small>
        </a>
      </li>
	  
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-envelope"></i>
          <span>Mailbox</span>
		       <small class="badge float-right badge-warning">12</small>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="mail-inbox.html"><i class="fa fa-circle-o"></i> Inbox</a></li>
    		  <li><a href="mail-compose.html"><i class="fa fa-circle-o"></i> Compose</a></li>
    		  <li><a href="mail-read.html"><i class="fa fa-circle-o"></i> Read Mail</a></li>
    		</ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-layers"></i>
          <span>Components</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="components-grid-layouts.html"><i class="fa fa-circle-o"></i> Grid Layouts</a></li>
    		  <li><a href="components-nestable.html"><i class="fa fa-circle-o"></i> Nesteble</a></li>
    		  <li><a href="components-tree-view-menu.html"><i class="fa fa-circle-o"></i> Tree View</a></li>
    		  <li><a href="components-switcher-buttons.html"><i class="fa fa-circle-o"></i> Switcher Buttons</a></li>
    		  <li><a href="components-range-slider.html"><i class="fa fa-circle-o"></i> Range Sliders</a></li>
    		  <li><a href="components-vertical-timeline.html"><i class="fa fa-circle-o"></i> Vertical Timeline</a></li>
    		  <li><a href="components-horizontal-timeline.html"><i class="fa fa-circle-o"></i> Horizontal Timeline</a></li>
    		  <li><a href="components-pricing-table.html"><i class="fa fa-circle-o"></i> Pricing Tables</a></li>
          <li><a href="components-fancy-lightbox.html"><i class="fa fa-circle-o"></i> Fancy Lightbox</a></li>
          <li><a href="components-image-carousel.html"><i class="fa fa-circle-o"></i> Image Carousels</a></li>
          <li><a href="components-color-palette.html"><i class="fa fa-circle-o"></i> Color Palette</a></li>
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-support"></i> <span>Cards</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="cards-image-cards.html"><i class="fa fa-circle-o"></i> Image Cards</a></li>
          <li><a href="cards-simple-cards.html"><i class="fa fa-circle-o"></i> Simple Cards</a></li>
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-note"></i> <span>Forms</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="form-inputs.html"><i class="fa fa-circle-o"></i> Basic Inputs</a></li>
    		  <li><a href="form-input-group.html"><i class="fa fa-circle-o"></i> Input Groups</a></li>
    		  <li><a href="form-layouts.html"><i class="fa fa-circle-o"></i> Form Layouts</a></li>
    		  <li><a href="form-advanced.html"><i class="fa fa-circle-o"></i> Form Advanced</a></li>
    		  <li><a href="form-validation.html"><i class="fa fa-circle-o"></i> Form Validation</a></li>
    		  <li><a href="form-step-wizard.html"><i class="fa fa-circle-o"></i> Form Wizard</a></li>
    		  <li><a href="form-text-editor.html"><i class="fa fa-circle-o"></i> Form Editor</a></li>
    		  <li><a href="form-uploads.html"><i class="fa fa-circle-o"></i> Form Uploads</a></li>
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-fire"></i> <span>UI Icons</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="icons-material-designs.html"><i class="fa fa-circle-o"></i> Material Design</a></li>
    		  <li><a href="icons-font-awesome.html"><i class="fa fa-circle-o"></i> Font Awesome</a></li>
    		  <li><a href="icons-themify.html"><i class="fa fa-circle-o"></i> Themify Icons</a></li>
    		  <li><a href="icons-simple-line-icons.html"><i class="fa fa-circle-o"></i> Line Icons</a></li>
    		  <li><a href="icons-flags.html"><i class="fa fa-circle-o"></i> Flag Icons</a></li>
        </ul>
      </li>
	  
       <li>
        <a href="widgets.html" class="waves-effect">
          <i class="icon-event"></i> <span>Widgets</span>
          <small class="badge float-right badge-danger">10</small>
        </a>
      </li>
	   
	   <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-grid"></i> <span>Tables</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="table-simple-tables.html"><i class="fa fa-circle-o"></i> Simple Tables</a></li>
    		  <li><a href="table-header-tables.html"><i class="fa fa-circle-o"></i> Header Tables</a></li>
    		  <li><a href="table-color-tables.html"><i class="fa fa-circle-o"></i> Color Tables</a></li>
    		  <li><a href="table-striped-color-tables.html"><i class="fa fa-circle-o"></i> Striped Color Tables</a></li>
    		  <li><a href="table-data-tables.html"><i class="fa fa-circle-o"></i> Data Tables</a></li>
        </ul>
       </li>
	   
	   <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-chart"></i> <span>Charts</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="charts-morris.html"><i class="fa fa-circle-o"></i> Morris Charts</a></li>
    		  <li><a href="charts-chartjs.html"><i class="fa fa-circle-o"></i> Chart JS</a></li>
    		  <li><a href="charts-flot.html"><i class="fa fa-circle-o"></i> Flot Chart</a></li>
          <li><a href="charts-c3-charts.html"><i class="fa fa-circle-o"></i> C3 Charts</a></li>
    		  <li><a href="charts-peity.html"><i class="fa fa-circle-o"></i> Peity Charts</a></li>
    		  <li><a href="charts-sparkline.html"><i class="fa fa-circle-o"></i> Sparkline Charts</a></li>
    		  <li><a href="charts-other.html"><i class="fa fa-circle-o"></i> Other Charts</a></li>
        </ul>
       </li>
	   
	   <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-map"></i> <span>Maps</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="maps-google.html"><i class="fa fa-circle-o"></i> Google Maps</a></li>
		      <li><a href="maps-vector.html"><i class="fa fa-circle-o"></i> Vector Maps</a></li>
        </ul>
       </li>

      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-lock"></i> <span>Authentication</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="authentication-signin.html"><i class="fa fa-circle-o"></i> SignIn 1</a></li>
          <li><a href="authentication-signin2.html"><i class="fa fa-circle-o"></i> SignIn 2</a></li>
          <li><a href="authentication-signup.html"><i class="fa fa-circle-o"></i> SignUp 1</a></li>
          <li><a href="authentication-signup2.html"><i class="fa fa-circle-o"></i> SignUp 2</a></li>
          <li><a href="authentication-reset-password.html"><i class="fa fa-circle-o"></i> Reset Password 1</a></li>
          <li><a href="authentication-reset-password2.html"><i class="fa fa-circle-o"></i> Reset Password 2</a></li>
        </ul>
       </li>
	   
	    <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-folder-alt"></i> <span>Sample Pages</span>
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

      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-share"></i> <span>Multilevel</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="javaScript:void();"><i class="fa fa-circle-o"></i> Level One</a></li>
          <li>
            <a href="javaScript:void();"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="javaScript:void();"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li>
                <a href="javaScript:void();"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="sidebar-submenu">
                  <li><a href="javaScript:void();"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  <li><a href="javaScript:void();"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="javaScript:void();" class="waves-effect"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li>
      <li class="sidebar-header">LABELS</li>
      <li><a href="javaScript:void();" class="waves-effect"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="javaScript:void();" class="waves-effect"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="javaScript:void();" class="waves-effect"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
	 
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top gradient-scooter">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
	    <i class="icon-envelope-open"></i><span class="badge badge-danger badge-up">24</span></a>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
         <li class="list-group-item d-flex justify-content-between align-items-center">
          You have 24 new messages
          <span class="badge badge-danger">24</span>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-1.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Jhon Deo</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            <small>Today, 4:10 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-2.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Sara Jen</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            <small>Yesterday, 8:30 AM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-3.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Dannish Josh</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
             <small>5/11/2018, 2:50 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-4.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Katrina Mccoy</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet.</p>
            <small>1/11/2018, 2:50 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item"><a href="javaScript:void();">See All Messages</a></li>
        </ul>
        </div>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
	  <i class="icon-bell"></i><span class="badge badge-primary badge-up">10</span></a>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
          You have 10 Notifications
          <span class="badge badge-primary">10</span>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="icon-people fa-2x mr-3 text-info"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Registered Users</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="icon-cup fa-2x mr-3 text-warning"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Received Orders</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="icon-bell fa-2x mr-3 text-danger"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Updates</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item"><a href="javaScript:void();">See All Notifications</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item language">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="pages-blank-page.html#"><i class="flag-icon flag-icon-gb"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="pages-blank-page.html#">
        <span class="user-profile"><img src="assets/images/avatars/avatar-17.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-17.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">Katrina Mccoy</h6>
            <p class="user-subtitle">mccoy@example.com</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Blank Page</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a href="javaScript:void();" class="dropdown-item">Action</a>
          <a href="javaScript:void();" class="dropdown-item">Another action</a>
          <a href="javaScript:void();" class="dropdown-item">Something else here</a>
          <div class="dropdown-divider"></div>
          <a href="javaScript:void();" class="dropdown-item">Separated link</a>
        </div>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
		  <div style="height:600px"> <!--Please remove the height before using this page-->
		      <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
		  </div>
        </div>
      </div>

    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Rocker Admin
        </div>
      </div>
    </footer>
	<!--End footer-->
   
  </div><!--End wrapper-->


  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	
  <!-- simplebar js -->
   <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
  <!-- waves effect js -->
  <script src="{{ asset('assets/js/waves.js') }}"></script>
  <!-- sidebar-menu js -->
  <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
  <!-- Custom scripts -->
  <script src="{{ asset('assets/js/app-script.js') }}"></script>
	
</body>
</html>
