<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('Backend/main-dashboard/../images/opera.png')}}">

    <title>Errandz ::  Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('Backend/main-dashboard/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('Backend/main-dashboard/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('Backend/main-dashboard/css/skin_color.css')}}">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  <header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
					<i data-feather="grid"></i>
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>			
		
			
		  </ul>
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		  <!-- full Screen -->
	      <li class="search-bar">		  
			  <div class="lookup lookup-circle lookup-right">
			     <input type="text" name="s">
			  </div>
		  </li>			
		  <!-- Notifications -->
		  <li class="dropdown notifications-menu">
			<a href="#" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown" title="Notifications">
			  <i class="ti-bell"></i>
			</a>
			<ul class="dropdown-menu animated bounceIn">

			  <li class="header">
				<div class="p-20">
					<div class="flexbox">
						<div>
							<h4 class="mb-0 mt-0">Notifications</h4>
						</div>
						<div>
							<a href="#" class="text-danger">Clear All</a>
						</div>
					</div>
				</div>
			  </li>

			  <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu sm-scrol">
				  <li>
					<a href="#">
					  <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
					</a>
				  </li>
				 
				  
				</ul>
			  </li>
			  <li class="footer">
				  <a href="#">View all</a>
			  </li>
			</ul>
		  </li>	
		  
	      <!-- User Account-->
          <li class="dropdown user user-menu">	
			<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
				<img src="{{asset('Backend/images/avatar/avatar-13.png')}}" alt="">
			</a>
			<ul class="dropdown-menu animated flipInX">
			  <li class="user-body">
				 <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a>
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="ti-lock text-muted mr-2"></i>    {{ __('Logout') }}
                                    </a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
				 
			  </li>
			</ul>
          </li>	
		  <li>
              <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
			  	<i class="ti-settings"></i>
			  </a>
          </li>
			
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{'/Vx/Dashboard'}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('Backend/main-dashboard/../images/opera.png')}}" alt="">
						  <h3><b>Errandz</b> </h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li>
          <a href="{{'/Vx/Dashboard'}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Application</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="ti-more"></i>Chat</a></li>
            <li><a href="#"><i class="ti-more"></i>Calendar</a></li>
          </ul>
        </li> 
			  
		 
        <li class="header nav-small-cap">Overview </li>
		
  
        <li class="treeview">
          <a href="#">
            <i data-feather="map"></i>
			<span>Map</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="ti-more"></i>Google Map</a></li>
          </ul>
        </li> 			  
		  
		<li class="treeview">
          <a href="#">
            <i data-feather="alert-triangle"></i>
			<span>Authentication</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="ti-more"></i>Login</a></li>
		 </ul>
        </li> 		  		  
		  
		<li class="header nav-small-cap">--</li>		  
		
		  
		<li>
          <a href="#">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		
	
		<a class="link" data-toggle="tooltip" title="" data-original-title="Logout" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="ti-lock"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

	
	</div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
				
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title align-items-start flex-column">
								 Errandz Dashboard
								<small class="subtitle">More than 5000+ Customers</small>
							</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-border">
									<thead>
										<tr class="text-uppercase bg-lightest">
											<th style="min-width: 250px"><span class="text-white">products</span></th>
											<th style="min-width: 100px"><span class="text-fade">pruce</span></th>
											<th style="min-width: 100px"><span class="text-fade">deposit</span></th>
											<th style="min-width: 150px"><span class="text-fade">agent</span></th>
											<th style="min-width: 130px"><span class="text-fade">status</span></th>
											<th style="min-width: 120px"></th>
										</tr>
									</thead>
									<tbody>
										
										<tr>										
											<td class="pl-0 py-8">
												<div class="d-flex align-items-center">
													<div class="flex-shrink-0 mr-20">
														<div class="bg-img h-50 w-50" style="background-image: url({{asset('Backend/main-dashboard/../images/gallery/creative/img-4.jpg')}})"></div>
													</div>

													<div>
														<a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Vivamus consectetur</a>
														<span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
													</div>
												</div>
											</td>
											<td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													Paid
												</span>
												<span class="text-white font-weight-600 d-block font-size-16">
													$45,800k
												</span>
											</td>
											<td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													Paid
												</span>
												<span class="text-white font-weight-600 d-block font-size-16">
													$45k
												</span>
											</td>
											<td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													Sophia
												</span>
												<span class="text-white font-weight-600 d-block font-size-16">
													Pharetra
												</span>
											</td>
											<td>
												<span class="badge badge-danger-light badge-lg">Rejected</span>
											</td>
											<td class="text-right">
												<a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
												<a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
											</td>
										</tr>
										<tr>										
											<td class="pl-0 py-8">
												<div class="d-flex align-items-center">
													<div class="flex-shrink-0 mr-20">
														<div class="bg-img h-50 w-50" style="background-image: url({{asset('Backend/main-dashboard/../images/gallery/creative/img-5.jpg')}})"></div>
													</div>

													<div>
														<a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Vivamus consectetur</a>
														<span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
													</div>
												</div>
											</td>
											<td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													Paid
												</span>
												<span class="text-white font-weight-600 d-block font-size-16">
													$45,800k
												</span>
											</td>
											<td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													Paid
												</span>
												<span class="text-white font-weight-600 d-block font-size-16">
													$45k
												</span>
											</td>
											<td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													Sophia
												</span>
												<span class="text-white font-weight-600 d-block font-size-16">
													Pharetra
												</span>
											</td>
											<td>
												<span class="badge badge-warning-light badge-lg">In Progress</span>
											</td>
											<td class="text-right">
												<a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
												<a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>  
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
	  &copy; {{ now()->year }}<a href="#">Errandz App</a>. All Rights Reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab" class="active">Chat</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey"><i class="ti-minus"></i></a>	
			<p>Online Users</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
		  <div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
		  </div>
		  @foreach ($users as $user)  
          <div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
			 
			
			<a class="avatar avatar-lg status-success" href="#">
				<img src="{{asset('Backend/images/avatar/avatar-1.png')}}" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-13">
				  <a class="hover-primary" href="#"><strong>{{ Auth::user()->firstname}}{{ Auth::user()->lastname}}</strong></a>
				</p>
				<p>{{ Auth::user()->address}}</p>
				  <span> {{ Carbon\Carbon::parse($user->last_login)->diffForHumans()}}  </span>
			  </div>
			</div>
		
			  
		  </div>
		  @endforeach
		  
      </div>
      <!-- /.tab-pane -->
      
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<script src="{{asset('Backend/main-dashboard/js/vendors.min.js')}}"></script>
    <script src="{{asset('Backend/assets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src="{{asset('Backend/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{asset('Backend/assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src="{{asset('Backend/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	
	<script src="{{asset('Backend/main-dashboard/js/template.js')}}"></script>
	<script src="{{asset('Backend/main-dashboard/js/pages/dashboard.js')}}"></script>
	
	
</body>
</html>
