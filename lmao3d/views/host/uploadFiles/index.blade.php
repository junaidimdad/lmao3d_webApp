@extends('layouts\HostLayout')
  
  
  @section('wrapper')
  <nav class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="{{route('host.hostDashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
        </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" >
          <i class="fas fa-fw fa-plus"></i>
          <span>Create Session</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" >
          <i class="fas fa-fw fa-camera"></i>
          <span>Start Session</span>
        </a>
      </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('host.File.index')}}" >
          <i class="fas fa-fw fa-file"></i>
          <span>Files</span>
        </a>
      </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link collapsed" href="ViewHostsList" >
        <i class="fas fa-fw fa-user"></i>
        <span>Questions</span>
      </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" >
        <i class="fas fa-fw fa-comment"></i>
        <span>Suggestions</span>
      </a>
    </li>
        
    <!--
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
              <a class="dropdown-item" href="{{route('host.hostProfile')}}">
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

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800">Presentation Files</h1>
          <a href="{{route('host.File.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Upload File</a>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Uploaded Files</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>DateTime</th>
                    <th>Actions</th>    
                </tr>
                </thead>
               <tbody>
               @foreach($files as $f)
                <tr>  
                    <td>{{$f->title}}</td>
                    <td>{{$f->description}}</td>
                    <td>{{$f->created_at}}</td>
                    <td>
                        <a href="/host/File/{{$f->id}}" class="btn btn-info btn-sm"><i class="fas fa-eye fa-sm text-white-50"></i>View</a>
                        <form action="{{route('host.File.destroy', $f)}}" method="POST" class="float-left">
                        @csrf 
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-sm text-white-50"></i>Delete</button>
                      </form>
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