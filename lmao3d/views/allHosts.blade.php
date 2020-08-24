@extends('layouts\LandingLayout')

  
 @section('header')
  <!-- header-area start -->
  <div id="sticker" class="header-area">
      <div class="container">
      <div class="row">
          <div class="col-md-12 col-sm-12">

          <!-- Navigation -->
          <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                      <span class="sr-only">Toggle navigation</span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                  </button>
              <!-- Brand -->
              <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>L</span>MAO 3D</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                              </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
              <ul class="nav navbar-nav navbar-right">
                  <li>
                  <a class="page-scroll" href="{{route('welcome')}}">Home</a>
                  </li>
                  <li class="active">
                  <a class="page-scroll" href="{{route('allHosts')}}">Forum</a>
                  </li>
                  <li>
                  <a class="page-scroll" href="{{route('client.login')}}">SignIn</a>
                  </li>
              </ul>
              </div>
              <!-- navbar-collapse -->
          </nav>
          <!-- END: Navigation -->
          </div>
      </div>
      </div>
  </div>
  @endsection

  @section('all-title-box')
   <!-- Start Bottom Header -->
   <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Forum</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3">Profesional Discussion Forum</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Header -->
  @endsection



