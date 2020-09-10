<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top gradient-scooter">
     <ul class="navbar-nav mr-auto align-items-center">
       <li class="nav-item">
         <a class="nav-link toggle-menu" href="javascript:void();">
          <i class="icon-menu menu-icon"></i>
        </a>
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
       <li class="nav-item">
         <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="pages-blank-page.html#">
           <span class="user-profile"><img src="{{ asset('assets/images/avatars/me.png') }}" class="img-circle" alt="user avatar"></span>
         </a>
         <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item user-details">
           <a href="javaScript:void();">
              <div class="media">
                <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/me.png" alt="user avatar"></div>
               <div class="media-body">
               <h6 class="mt-2 user-title">{{ auth()->user()->name }}</h6>
               <p class="user-subtitle">{{ auth()->user()->email }}</p>
               </div>
              </div>
             </a>
           </li>
           <li class="dropdown-divider"></li>
           <li class="dropdown-item"><i class="icon-settings mr-2"></i> Change Password</li>
           <li class="dropdown-divider"></li>
           <li class="dropdown-item"><a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"><i class="icon-power mr-2"></i> Logout</a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST">
             @csrf
         </form></li>
         </ul>
       </li>
     </ul>
   </nav>
   </header>
