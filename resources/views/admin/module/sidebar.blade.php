	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Main">
				<li class="active"><a href="{{route('admin.home')}}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
			</ul>
			
			<ul data-submenu-title="Listings">
				<li><a><i class="sl sl-icon-layers"></i> Informasi </a>
					<ul>
						<li><a href="dashboard-my-listings.html">Alumni <span class="nav-tag green">6</span></a></li>
						<li><a href="dashboard-my-listings.html">Perusahaan <span class="nav-tag yellow">1</span></a></li>
					</ul>	
				</li>
				<li><a href="dashboard-add-listing.html"><i class="sl sl-icon-plus"></i> Lowongan</a></li>
			</ul>	

			<ul data-submenu-title="Account">
				<li><a href="dashboard-my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li>
				<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i> Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
			</ul>
			
		</div>
	</div>
	<!-- Navigation / End -->
