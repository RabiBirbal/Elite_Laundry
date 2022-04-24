<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="fontAwesome/css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
	<script src="js/jquery-2.2.2.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/bower_components/owl.carousel/dist/assets/owl.carousel.min.css" />
	<link rel="stylesheet" href="/node_modules/owl.carousel/dist/assets/owl.carousel.min.css" />
	<link rel="icon" href="image/elite-laundry11.png" type="image/png" sizes="17x17">
	<style>
@import "font-awesome.min.css";
@import "font-awesome-ie7.min.css";
/* Space out content a bit */
body {
  padding-top: 20px;
  padding-bottom: 20px;
  background: linear-gradient(to top left, #153965 , #89bb40 );
      background-image: url('{{ asset('frontend/assets/image/hanging-cloth.jpg') }}');
        background-attachment: fixed;
        background-repeat: no-repeat;
        
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
  padding-right: 15px;
  padding-left: 15px;
}
.btn-info {
    color: #fff;
    background-color: #183A5E;
    border-color: #46b8da;
}

}
/* Custom page header */
.header {
  border-bottom: 1px solid #e5e5e5;
}
/* Make the masthead heading the same height as the navigation */
.header h3 {
  padding-bottom: 19px;
  margin-top: 0;
  margin-bottom: 0;
  line-height: 40px;
}
.well {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #8dc53e;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
}
/* Custom page footer */
.footer {
  padding-top: 19px;
  color: #777;
  border-top: 1px solid #e5e5e5;
}

/* Customize container */
@media (min-width: 768px) {
  .container {
    max-width: 730px;
  }
}
.container-narrow > hr {
  margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  border-bottom: 1px solid #e5e5e5;
}
.jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}

/* Supporting marketing content */
.marketing {
  margin: 40px 0;
}
.marketing p + h4 {
  margin-top: 28px;
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
  /* Remove the padding we set earlier */
  .header,
  .marketing,
  .footer {
    padding-right: 0;
    padding-left: 0;
  }
  /* Space out the masthead */
  .header {
    margin-bottom: 30px;
  }
  /* Remove the bottom border on the jumbotron for visual effect */
  .jumbotron {
    border-bottom: 0;
  }
}
	</style>
</head>
<body>
  @include('layouts.alert')
<div class="container order-form">
  <div class="row">
    <div class="col-md-12 text-right">
      <a href="{{ route('index') }}" class="btn btn-primary">Home</a>
    </div>
  </div>
    <h1 class="well">Order Confirmation</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="{{ route('post.order') }}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $id }}">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" class="form-control">
                @error('first_name')
                  <p style="color: red">{{ $message }}</p>
                @enderror
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" class="form-control">
                @error('last_name')
                  <p style="color: red">{{ $message }}</p>
                @enderror
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
						<input type="address" name="address" placeholder="Address" value="{{ old('address') }}" class="form-control">
            @error('address')
                  <p style="color: red">{{ $message }}</p>
                @enderror
						</div>	
			
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Phone Number</label>
								<input type="phone" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" class="form-control">
                @error('phone')
                  <p style="color: red">{{ $message }}</p>
                @enderror
							</div>		
							<div class="col-sm-6 form-group">
								<label>Email</label>
								<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control">
                @error('email')
                  <p style="color: red">{{ $message }}</p>
                @enderror
							</div>	
						</div>						
					<div class="form-group">
						<label>Preferred Pickup Date</label>
						<input type="date" name="pickup_date" placeholder="date" value="{{ old('pickup_date') }}" class="form-control">
            @error('pickup_date')
                  <p style="color: red">{{ $message }}</p>
                @enderror
					</div>		
					<div class="form-group">
						<label>Preferred Delivery Date</label>
						<input type="date" name="delivery_date" placeholder="date" value="{{ old('delivery_date') }}" class="form-control">
            @error('delivery_date')
                  <p style="color: red">{{ $message }}</p>
                @enderror
					</div>	
					<div class="form-group">
							<label>Description (if any)</label>
							<textarea placeholder="description (if any)" name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
              @error('description')
                  <p style="color: red">{{ $message }}</p>
                @enderror
						</div>	

					<div class="form-check">
				    <input type="checkbox" name="terms" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">I agree all the terms & conditions</label>
            @error('terms')
                  <p style="color: red">{{ $message }}</p>
                @enderror
				  </div>
					<div class="text-center" >
            <button type="submit" class="btn btn-info" >Order Now</button>
        </div>			
					</div>
				</form> 
				</div>
	</div>
	</div>


</body>
</html>