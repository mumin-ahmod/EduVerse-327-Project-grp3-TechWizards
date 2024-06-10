 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="z-index: 999999">

     <!-- Sidebar Toggle (Topbar) -->
     <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
         <i class="fa fa-bars"></i>
     </button>

     <a class="navbar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-book"></i>
         </div>
         <div class="sidebar-brand-text mx-3">EduVerse</div>
     </a>

     <!-- Topbar Search -->
     <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
         <div class="input-group">
             <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                 aria-label="Search" aria-describedby="basic-addon2">
             <div class="input-group-append">
                 <button class="btn btn-primary" type="button">
                     <i class="fas fa-search fa-sm"></i>
                 </button>
             </div>
         </div>
     </form>

     <!-- Topbar Navbar -->
     <ul class="navbar-nav ml-auto">

         <!-- Nav Item - Search Dropdown (Visible Only XS) -->
         <li class="nav-item dropdown no-arrow d-sm-none">
             <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-search fa-fw"></i>
             </a>
             <!-- Dropdown - Messages -->
             <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                 aria-labelledby="searchDropdown">
                 <form class="form-inline mr-auto w-100 navbar-search">
                     <div class="input-group">
                         <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                             aria-label="Search" aria-describedby="basic-addon2">
                         <div class="input-group-append">
                             <button class="btn btn-primary" type="button">
                                 <i class="fas fa-search fa-sm"></i>
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </li>

        
         <li class="nav-item dropdown no-arrow ">
            <a class="nav-link dropdown-toggle" href="{{ route('home') }}" id="courseDrop" role="button"
               aria-expanded="false">
                <h6 class="text-success">Home</h6>
            </a>
        </li>



         <li class="nav-item dropdown no-arrow ">
             <a class="nav-link dropdown-toggle" href="#" id="courseDrop" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                 <h6 class="text-success">Courses</h6>
             </a>

             <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="courseDrop">

                 <a class="dropdown-item" href="{{ route('courses.index') }}">All Courses</a>

                 <a class="dropdown-item" href="{{ route('courses.myCourses') }}">My Courses</a>

                 <a class="dropdown-item" href="{{ route('enrollments.myEnrollments') }}">My Enrollments</a>

             </div>



         </li>

         <li class="nav-item dropdown no-arrow mx-3">
             <a class="nav-link dropdown-toggle" href="" id="catDrop" role="button" data-toggle="dropdown"
                 aria-haspopup="true">
                 <h6 class="text-success">Categories</h6>
             </a>


             <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="catDrop">

                 <a class="dropdown-item" href="{{ route('courses.categories') }}">All Categories</a>

                 <a class="dropdown-item" href="{{ route('courses.levels') }}">Find By Level</a>

             </div>
             </a>
         </li>

         <li class="nav-item dropdown no-arrow mx-1">
             <a class="nav-link dropdown-toggle" href="#" id="blogDrop" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                 <h6 class="text-success">Blogs</h6>
             </a>

             <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
             aria-labelledby="courseDrop">

             <a class="dropdown-item" href="{{ route('blogs.index') }}">All Blogs</a>

             <a class="dropdown-item" href="{{ route('blogs.create') }}">Post A Blog!</a>

         </div>


         </li>


         <!-- Nav Item - Alerts -->
         <li class="nav-item dropdown no-arrow mx-1">
             <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-bell fa-fw"></i>
                 <!-- Counter - Alerts -->
                 <span class="badge badge-danger badge-counter">3+</span>
             </a>
             <!-- Dropdown - Alerts -->
             <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                 <h6 class="dropdown-header">
                     Alerts Center
                 </h6>
                 <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="mr-3">
                         <div class="icon-circle bg-primary">
                             <i class="fas fa-file-alt text-white"></i>
                         </div>
                     </div>
                     <div>
                         <div class="small text-gray-500">December 12, 2019</div>
                         <span class="font-weight-bold">A new monthly report is ready to download!</span>
                     </div>
                 </a>
                 <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="mr-3">
                         <div class="icon-circle bg-success">
                             <i class="fas fa-donate text-white"></i>
                         </div>
                     </div>
                     <div>
                         <div class="small text-gray-500">December 7, 2019</div>
                         $290.29 has been deposited into your account!
                     </div>
                 </a>
                 <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="mr-3">
                         <div class="icon-circle bg-warning">
                             <i class="fas fa-exclamation-triangle text-white"></i>
                         </div>
                     </div>
                     <div>
                         <div class="small text-gray-500">December 2, 2019</div>
                         Spending Alert: We've noticed unusually high spending for your account.
                     </div>
                 </a>
                 <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
             </div>
         </li>

         <!-- Nav Item - Messages -->


         <div class="topbar-divider d-none d-sm-block"></div>

         <!-- Nav Item - User Information -->
         <li class="nav-item dropdown no-arrow">
             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                 <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name ?? 'Profile' }}</span>


                 <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
             </a>
             <!-- Dropdown - User Information -->
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                 <h5 class="text-center">{{ Auth::user()->name ?? '' }}</h5>

                 @if (Auth::check())
                     <a class="dropdown-item" href="{{ route('dashboard') }}">
                         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                         My Dashboard
                     </a>

                     <a class="dropdown-item" href="{{ route('profile.edit') }}">
                         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                         My Profile
                     </a>
                     <a class="dropdown-item" href="">
                         <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                         Settings
                     </a>
                 @endif


                 <div class="dropdown-divider"></div>

                 @if (Auth::check())
                     <form method="POST" action="{{ route('logout') }}">

                         <button class="dropdown-item" type="submit">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Logout
                         </button>
                         @csrf
                     </form>
                 @else
                     <a class="dropdown-item" href="{{ route('login') }}">Login</a>

                     <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                 @endif

             </div>



         </li>

     </ul>

 </nav>
 <!-- End of Topbar -->
