@extends('frontend.layout.master')
@section('content')

<style>
    .gurantee{
         background-image: url('{{ asset('frontend/assets/image/hanging.jpg') }}');
         background-attachment: fixed;
         background-repeat: no-repeat;
 
       }
       .btn-info {
			color: #fff;
			background-color: #5bc0de;
			border-color: #46b8da;
		}
		.btn {
		margin-right: auto;
		margin-left: auto;
			display: block;
			margin-bottom: 0;
			font-weight: 400;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			background-image: none;
			border: 1px solid transparent;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;
			border-radius: 4px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
			
			hr {
		width: 100%;
			height: 21px;
		margin-left: auto;
		margin-right: auto;
		/*background-color:#89ba40;*/
		border: 0 none;
		margin-top: 0;
		margin-bottom:0;
		}
</style>
<hr>
<div class="banner-image">
    <img src="{{ asset('frontend/assets/image/contact-image.jpg') }}" width="100%">
</div>




<!-- pricing -->
<div class="pricing">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <h1>Pricing</h1>
      </div>
      @foreach ($pricings as $pricing)
      <div class="col-md-3">
        <img src="{{ asset('upload/images/pricing/'.$pricing['image']) }}">
        <h3><b>{{ $pricing->title }}</b></h3>
        <h4>Price Rs.{{$pricing->price}}/- per kg</h4>
		<a href="{{ route('get.order',$pricing['id']) }}" target="__blank"><button type="button" class="btn btn-info">Order Now</button></a>
      </div>
      @endforeach
    </div>
  </div>
</div>
 <!--  <div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title ">
						<h1><b>More Details on Pricing</b></h1>
					</div>
				</div>
			</div>
			<div class="row">				
				<div class="col-md-12">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Wash and Fold
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p>Price Rs. 100/- per kg</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingTwo">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Wash and Iron
									</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								<div class="panel-body">
									<p>Price Rs. 150/- per kg</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingThree">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										Wash
									</a>
								</h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
								<div class="panel-body">
									<p>Price Rs. 1000/-</p>
									
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingFour">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								Dry Cleaning
									</a>
								</h4>
							</div>
							<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
								<div class="panel-body">
								
									<p>Price Rs. 1000/-</p>
									
								</div>
							</div>
						</div>
	 -->				<!-- 	<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingFive">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
										How Titanic give customer support? 
									</a>
								</h4>
							</div>
							<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
								<div class="panel-body">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
								</div>
							</div>
						</div> -->
					</div>
				</div><!--- END COL -->		
			</div><!--- END ROW -->			
		</div>
<!-- pricing ends -->



<!-- type of services -->
<div class="service-types">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12">
				<h2><b>Types of Services</b></h2>
			</div>
			<div class="col-md-3">
				<img src="{{ asset('frontend/assets/image/hanger-towel.png') }}">
				<h6>Wash & Fold</h6>
			</div>
			<div class="col-md-3">
				<img src="{{ asset('frontend/assets/image/iron1.png') }}">
				<h6>Wash & Iron</h6> 
			</div>
			<div class="col-md-3">
				<img src="{{ asset('frontend/assets/image/washes.png') }}">
				<h6>Wash</h6>
		</div>
		<div class="col-md-3">
				<img src="{{ asset('frontend/assets/image/cleaning.png') }}">
				<h6>Dry Cleaning</h6>
		</div>
	</div>
</div>

<!-- type of services ends -->











<!-- gurantee -->
<div class="gurantee">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-md-12">
				<h1>100% Satisfaction guaranteed</h1>
				<h3>Dry Cleaning & Laundry Services</h3>
				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
			</div>
		</div>
	</div>
</div>

<!-- gurantee -->
@endsection