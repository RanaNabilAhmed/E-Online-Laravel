@extends('frontend/layouts/default')


@section('content')
    <!-- content Start -->

<!-- start banner Area -->
<section class="banner-area">
	<div class="container">
		<div class="row fullscreen align-items-center justify-content-start" style="height: 654px;">
			<div class="col-lg-12">
				<div class="row single-slide align-items-center d-flex">
					<div class="col-lg-5 col-md-6">
						<div class="banner-content">
							<h1>Nike New <br>Collection!</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
						</div>
						<div class="add-bag d-flex align-items-center">
							<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
							<span class="add-text text-uppercase">Add to Bag</span>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="banner-img">
							<img class="img-fluid" src="{{URL::to('')}}/public/assets/frontend/img/banner/banner-img.png" alt="">
						</div>
					</div>	
				</div>
				</div>
				
			</div>

		</div>
	</div>
</section>
@stop
</body>
</html>
