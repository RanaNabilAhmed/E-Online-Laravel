
	<!-- Start Nav Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="{{URL::to('')}}/"><img src="{{URL::to('')}}/public/assets/frontend/img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="{{URL::to('')}}/">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="{{URL::to('')}}/category">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="{{URL::to('')}}/checkout">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="{{URL::to('')}}/cart">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="{{URL::to('')}}/confirmation">Confirmation</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="blog" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="{{URL::to('')}}/signup">Login</a></li>
									<li class="nav-item"><a class="nav-link" href="{{URL::to('')}}/registration">Registration</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="{{URL::to('')}}/contact">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="{{URL::to('')}}/cart" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
							 @if(Auth::guest())
							 
								 
							 
							 @else
								<a class="navbar-brand logo_h" href="{{URL::to('')}}/index"><img style="border-radius:50%;" src="{{URL::to('')}}//public/assets/images/{{Auth::user()->image }}" alt=""></a>
								<a href="{{URL::to('')}}/admin" class="cart"><span >{{ Auth::user()->name }}</span> -->
								<a href="{{URL::to('')}}/logout">logout</a>
								</a>
							
							@endif
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<!-- <div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div> -->
	</header>
	<!-- End Nav Area -->