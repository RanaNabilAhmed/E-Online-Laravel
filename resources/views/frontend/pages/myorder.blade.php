@extends('frontend/layouts/default')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>cart</title>
    </head>
    <body>
    
@section('content')

  	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation"></h3>
			<div class="row order_d_inner">
			@foreach($order as $orders)
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Order Number</h4>
						<ul class="list">
							<li>{{ $orders->id}}</li>
						</ul>
                        <a class="primary-btn" href="{{URL::to('')}}/">Cancel Order</a>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>{{$orders->total_amount}}</h4>
						<ul class="list">
						</ul>
					</div>
				</div>{{app\helpers\user_count()}}
				{{app\helpers\order_count()}}
				<div class="col-lg-4">
					<div class="details_item">
						<h4></h4>
						<ul class="list">
						@if($orders->pay_status == 0)
						 <li class="btn btn-danger">Pendig</li>
						 @else
						 <li class="btn btn-primary">Completed</li>
						 @endif
						</ul>
                        <a class="primary-btn" href="{{URL::to('')}}/index">Continue Shopping</a>
					</div>
				</div>
			@endforeach
			</div>
            <a class="primary-btn" href="{{URL::to('')}}/">Pay Payment</a>			
		</div>
	</section>
	<!--================End Order Details Area =================-->

@stop
    </body>
</html>
