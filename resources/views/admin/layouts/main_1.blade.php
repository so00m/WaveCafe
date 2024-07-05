<!DOCTYPE html>
<html lang="en">
	<head>
		@include('admin.includes.head')
	</head>

	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="index.html" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Beverages Admin</span></a>
						</div>

						<div class="clearfix">
                        </div>
						<!-- menu profile quick info -->
						@include('admin.includes.menu_profile_info')
						<!-- /menu profile quick info -->

						<br />

						<!-- sidebar menu -->
						@include('admin.includes.side_bar_menu')
						<!-- /sidebar menu -->

						<!-- /menu footer buttons -->
						@include('admin.includes.footer_buttons')
						<!-- /menu footer buttons -->
					</div>
				</div>

				<!-- top navigation -->
				@include('admin.includes.top_navigation')
				<!-- /top navigation -->

				<!-- page content -->
				@yield('content')
				<!-- /page content -->

				<!-- footer content -->
				@include('admin.includes.footer')
				<!-- /footer content -->
			</div>
		</div>

	<!--java scripts  -->
	@include('admin.includes.javaScripts')
	<!--/java scripts -->
	</body>
</html>
