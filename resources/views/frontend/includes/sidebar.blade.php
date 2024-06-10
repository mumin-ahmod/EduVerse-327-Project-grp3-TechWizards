   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       {{-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
           <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-book"></i>
           </div>
           <div class="sidebar-brand-text mx-3">EduHub</div>
       </a> --}}

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item active">
           <a class="nav-link" href="{{ route('dashboard') }}">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">


       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">

               <i class="fas fa-fw fa-file"></i>
               <span>My Courses</span>
           </a>
           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <ul>
                   <li> <a href="{{ route('courses.index') }}"><span class="text-white">All Courses</span></a></li>
                   <li><a href="{{ route('courses.create') }}"><span class="text-white">Add New Course</span></a></li>
                   <li><a href="{{ route('courses.myCourses') }}"><span class="text-white">My Courses</span></a></li>

                   <li><a href="{{ route('enrollments.myEnrollments') }}"><span class="text-white">My Enrolled
                               Courses</span></a></li>
               </ul>
           </div>
       </li>

       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThr"
               aria-expanded="true" aria-controls="collapseThr">
               <i class="fas fa-fw fa-cog"></i>
               <span>Categories</span>
           </a>
           <div id="collapseThr" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <ul>

                   <li><a href="{{ route('courses.categories') }}"><span class="text-white">All Category</span></a></li>
                  
               </ul>
           </div>
       </li>




       <!-- Nav Item - Utilities Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
               <i class="fas fa-fw fa-wrench"></i>
               <span>Level</span>
           </a>
           <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
               data-parent="#accordionSidebar">

               <ul>

                   <li><a href="{{ route('courses.levels') }}"><span class="text-white">All Levels</span></a></li>
                  
               </ul>

           </div>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">


       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
               <i class="fas fa-fw fa-folder"></i>
               <span>Pages</span>
           </a>
           <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

            <ul>

                <li><a href=""><span class="text-white">About</span></a></li>
                <li><a href=""><span class="text-white">Contact us</span></a></li>
            </ul>
           </div>
       </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseB"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Blogs</span>
        </a>
        <div id="collapseB" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

         <ul>

             <li><a href="{{ route('blogs.index') }}"><span class="text-white">All Blogs</span></a></li>
             <li><a href="{{ route('blogs.my') }}"><span class="text-white">My Blogs</span></a></li>
             <li><a href="{{ route('blogs.create') }}"><span class="text-white">Post a Blog</span></a></li>
         </ul>
        </div>
    </li>

       <!-- Nav Item - Charts -->
       <li class="nav-item">
           <a class="nav-link" href="charts.html">
               <i class="fas fa-fw fa-chart-area"></i>
               <span>Analysis</span></a>
       </li>


       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>


   </ul>
   <!-- End of Sidebar -->
