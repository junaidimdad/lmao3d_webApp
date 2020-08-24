@extends('layouts\AdminLayout')

@section('wrapper')
      <nav class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
              <a class="nav-link" href="{{route('admin.adminDashboard')}}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
              <hr class="sidebar-divider">

        <!--######### Multi User Role Management##############################
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('admin.users.index')}}" >
            <i class="fas fa-fw fa-users"></i>
            <span>Roles Management</span>
          </a>
        </li>

         <hr class="sidebar-divider">
         -->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('admin.viewHosts')}}" >
            <i class="fas fa-fw fa-user"></i>
            <span>View Hosts</span>
          </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('admin.viewsuggestions.index')}}" >
            <i class="fas fa-fw fa-comment"></i>
            <span>View Suggestions</span>
          </a>
        </li>
            
              
        <!--###############Sidebar Toggle Area#################
          <hr class="sidebar-divider d-none d-md-block">
          <hr class="sidebar-divider d-none d-md-block">      
          <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle mr-3" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
          </div>
        -->
      </nav>

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
           @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            Welcome {{ Auth::user()->name }}!!
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1 h4">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
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
      
            <div class="topbar-divider d-none d-sm-block"></div>
      
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span><img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px;  top:17px; left:10px;  border-radius:50%"></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
      
          </ul>
      
        </nav>
      
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Hosts Management</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Subject</th>
                    <th>Suggestions</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DateTime</th>
                    <th>Status</th>                  
                </tr>
                </thead>
               <tbody>
               @foreach($suggestion as $s)
                <tr>  
                    <td>{{$s->subject}}</td>
                    <td>{{$s->suggestion}}</td>
                    <td>{{$s->name}}</td>
                    <td>{{$s->email}}</td>
                    <td>{{$s->created_at}}</td>
                    <td>
                      @if($s->vstatus_code=="0")
                        <span class="btn btn-success btn-sm">Unblocked<span>
                      @else
                        <span class="btn btn-danger btn-sm">Blocked<span>
                      @endif   
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Team LMAO 3D</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

@endsection