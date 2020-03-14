@extends('frontend/layouts/default')

<body>
@section('content')
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{URL::to('')}}/public/assets/frontend/img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Register Your Account</h3>
						<form class="row login_form" action="{{ URL::to('/registration') }}" method="post" enctype="multipart/form-data" >
						{{ csrf_field() }}

							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="User Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'User name'">
							</div>					
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="name" name="email" placeholder="Email@" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email@'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
							</div>
							<div class="col-md-12 form-group">
								<input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        		<label class="custom-file-label" for="exampleInputFile">Choose file</label>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Log In</button>
								<a href="#">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
@stop
	
</body>

</html>