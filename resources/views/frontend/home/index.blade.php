@extends('frontend.layout.master')
@section('content')
<style>
  input{
    width: 100%;
  }
  .youtube-video iframe{
  margin-top: 30px;
  margin-right: auto;
  margin-left: auto;
  display: block;
}
.youtube-video {
  position: relative;
  width: 100%;
  padding-bottom: 44%;
  height: 0;
}
@media only screen and (max-width:600px){
  .youtube-video iframe{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
}

</style>

<!-- slider  -->
<br>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach ($sliders as $key => $slider)
      <li data-target="#myCarousel" data-slide-to="0" class="{{$key == 0 ? 'active' : ''}}"></li>
      @endforeach
      {{-- <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li> --}}
     
    </ol>
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    
    @foreach ($sliders as $key => $slider)
    <div class="item {{$key == 0 ? 'active' : ''}} ">
        <img src="{{ asset('upload/images/slider/'.$slider['image']) }}" alt="Chania"  width="100%">
    </div>
    @endforeach
  
    </div>
  
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- slider ends -->
 
  <!-- A Little Introduction -->
<div class="little-intro">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset('frontend/assets/image/Webp.net-gifmaker (1).gif') }}" width="90%">
      </div>
      <div class="col-md-6">
        <h1><font color="1a3a63"><b>We Made Dry Cleaning & Laundry Simple</b></font></h1>
        <p>Laundry cleaning uses water as the solvent, while dry cleaning uses a chemical solution other than water. The solvent used will depend on the dry cleaners' preferences. Perchloroethylene, also known as Perc, is commonly used by many dry cleaners though some contradicting issues are surrounding it.<br>Dry cleaners use a variety of solvents to clean fabric. Early solvents included gasoline, kerosene, benzene, turpentine and petroleum, which were very flammable and dangerous, according to the State Coalition for Remediation of Drycleaners (SCRD), a group whose members share information about cleanup programs.<br>Detergents are typically added to the solvents to aid in the removal of soils, according to an SCRD report titled "Chemicals Used in Drycleaning Operations." Detergents aid dry cleaning in three ways:  </p>
        <p> &#10004;&nbsp Carrying moisture to aid in the removal of water-soluble soils.</p>
        <p> &#10004;&nbspSuspending soil after it has been removed from the fabric so it won't be reabsorbed.</p>
        <p> &#10004;&nbspActing as a spotting agent to penetrate the fabric so that the solvents will be able to remove the stains. </p>
      </div>
    </div>
  </div>
</div>
<!-- A Little Introduction ends -->
  
  
  <!-- our services -->
  <div class="our-service">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
          <h1><font color="1a3a63">Our Services</font></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="details">
    <div class="container">
      <div class="row">
        @foreach ($services as $service)
        <div class="col-md-4">
          <div class="flip-card">
           <div class="flip-card-inner">
            <div class="flip-card-front">
            <img src="{{ asset('upload/images/service/'.$service['thumbnail']) }}" alt="Avatar" width="100%">
            <h1>{{ $service->name }}</h1>
           </div>
            <div class="flip-card-back">
         
            <p>
              {!! $service->description !!}  
            </p> 
    
            </div>
        </div>
      </div>

       </div>
        @endforeach
          </div>
      </div>
    </div>
  </div>
  <!-- our services ends -->
  
  
  <!-- pricing -->
  <br><br><br>
  <div class="pricing">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
          <h1>Pricing</h1>
        </div>
        @include('layouts.alert')
        @foreach ($pricings as $pricing)
        <div class="col-md-3">
          <img src="{{ asset('upload/images/pricing/'.$pricing['image']) }}">
          <h3><b>{{ $pricing->title }}</b></h3>
          <h4>Price Rs. {{ $pricing->price }}/- per kg</h4>
          <div class="text-center" >
            <a href="{{ route('get.order',$pricing['id']) }}" target="__blank"><button type="button" class="btn btn-info">Order Now</button></a>
        </div>
        <!-- Modal -->
	  <div class="modal fade" id="myModal-{{ $pricing->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle">Order Now</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('post.order') }}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $pricing->id }}">
          <div class="col-md-12 form-group input-group">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            <label for="name">Full Name</label>
          <input name="name" class="form-control" placeholder="Full Name" type="text" >
          <br>
          @error('name')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
            </span>
          @enderror                  
          </div> <!-- form-group// -->
          
          <div class="col-md-12 form-group input-group">
            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            <label for="name">Phone Number</label>
            <input name="phone" class="form-control" placeholder="Phone Number" type="text">
            <br>
            @error('phone')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
            </span>
          @enderror  
          </div> <!-- form-group// -->
          <div class="col-md-12 form-group input-group">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            <label for="email">Email</label>
          <input name="email" class="form-control" placeholder="Email Address" type="email" >
          <br>
          @error('email')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
            </span>
          @enderror                  
          </div> <!-- form-group// -->
          
          <div class="col-md-12 form-group input-group">
            <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
            <label for="name">Address</label>
            <input name="address" class="form-control" placeholder="Address" type="text">
            <br>
            @error('address')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
            </span>
          @enderror  
          </div> <!-- form-group// -->
          
          <div class="col-md-12 form-group input-group">
            <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
            <label for="name">Preferred Pickup Date</label>
            <input name="pickup_date" class="form-control" placeholder="Date" type="date">
            <br>
            @error('pickup_date')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
            </span>
          @enderror  
          </div> <!-- form-group// -->
  
          <div class="col-md-12 form-group input-group">
            <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
            <label for="name">Preferred Delivery Date</label>
            <input name="delivery_date" class="form-control" placeholder="Date" type="date">
            <br>
            @error('delivery_date')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
            </span>
          @enderror  
          </div> <!-- form-group// -->
  
          <div class="col-md-12 form-group input-group">
            <span class="input-group-text"> <i class="fa fa-comment"></i> </span>
            <label for="name">Instruction (If Any)</label>
            <textarea name="instruction" id="" cols="30" rows="5" class="form-control" placeholder="Instruction"></textarea>
          </div> <!-- form-group// -->
          <div class="form-groupinput-group">
            <div class="row">
            <div class="col-md-1 col-xm-1 col-sm-1">
              <input class="form-check-input" type="checkbox" name="terms" value="on" id="flexCheckDefault" required>
            </div>
            <div class="col-md-11 col-xm-11 col-sm-11">
              <label class="form-check-label" for="flexCheckDefault">
              I agree all the terms and conditions.
              </label>
              <br>
              @error('terms')
            <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
            </span>
          @enderror 
            </div>
            </div>
            
            
          </div> <!-- form-group// -->                               
          <div class="form-group">
            <button type="submit" onclick="return confirm('Are you sure want to continue?')" id="submit" value="submit" class="btn btn-primary btn-block"> Send </button>
          </div> <!-- form-group// -->                                                                       
        </form>
        </div>
        </div>
      </div>
      </div>
      {{-- modal ends --}}
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- pricing ends -->
  
  
  
  <!-- how we works -->
  <div class="we-works">
    <div class="container">
      <div class="row">
        <div class="cl-md-12 col-sm-12 col-lg-12">
          <h1><b>How We Works</b></h1>
        </div>
        <div class="col-md-4">
          <img src="{{ asset('frontend/assets/image/basket.png') }}">
          <h3>Pick Up Your Clothes</h3>
        </div>
  
         <div class="col-md-4">
          <img src="{{ asset('frontend/assets/image/washing-machine.png') }}" >
          <h3>Laundry & Dry Clean</h3>
        </div>
  
         <div class="col-md-4">
          <img src="{{ asset('frontend/assets/image/folded clothes.png') }}">
          <h3>Fold Clothes & Deliver</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- how we works ends -->

  <!-- spinnet number -->
  <div class="container">
    <div class="row">
        <br/>
       <div class="col text-center">
      <!-- <h2>Bootstrap 4 counter</h2>
      <p>counter to count up to a target number</p> -->
      </div>
    </div>
      <div class="row text-center">
            <div class="col-md-3">
            <div class="counter">
        <i class="fa fa-code fa-2x"></i>
        <h2 class="timer count-title count-number" data-to="20" data-speed="1500"></h2>
         <p class="count-text ">Corporate Client</p>
      </div>
            </div>
                <div class="col-md-3">
                 <div class="counter">
        <i class="fa fa-coffee fa-2x"></i>
        <h2 class="timer count-title count-number" data-to="200" data-speed="1500"></h2>
        <p class="count-text ">Happy Clients</p>
      </div>
                </div>
                <div class="col-md-3">
                    <div class="counter">
        <i class="fa fa-lightbulb-o fa-2x"></i>
        <h2 class="timer count-title count-number" data-to="4" data-speed="1500"></h2>
        <p class="count-text ">Collection Center</p>
      </div></div>
                <div class="col-md-3">
                <div class="counter">
        <i class="fa fa-bug fa-2x"></i>
        <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
        <p class="count-text ">Jobs done</p>
      </div>
                </div>
           </div>
  </div>
  
  <!-- spinnet number ends -->

  <!-- commerical service -->
<div class="commerical">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <h1>Elite Laundry Services</h1>
       
       
      </div>
       <div class="col-md-6">
        <img src="{{ asset('frontend/assets/image/girl.png') }}" width="100%">
      </div>
       <div class="col-md-6">
         <p>&#9745;&nbspElite Laundry is Kathmandu Valley based online on-demand laundry service that aims at providing high quality laundry services.</p>
         <p>&#9745;&nbspElite Laundry is the smart laundry solution which provides laundry service at exceptionally cheapest rate.</p>
         <p>&#9745;&nbspWe provide washing, steam ironing and other value added services to make your life free of laundry hassles.</p>
         <p>&#9745;&nbspWe provide on time home delivery service too.</p>
       
      </div>
    </div>
  </div>
</div>
<div class="commerical">
  <div class="container">
    <div class="row">
     
    </div>
  </div>
</div>
<!-- commerical service ends -->
  
<!-- video -->
<div class="youtube-video">
  {!! $profile->video !!}
</div>
<!-- video ends -->
  
  <!-- we are working -->
  
  <section class="details-card">
      <div class="container working">
          <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12" style="margin-top: -60px; margin-bottom: 10px;">
                  <h1><b>We are working with</b></h1>
              </div>
              @foreach ($news_list as $news)
              <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="{{ asset('upload/images/news/'.$news['image']) }}" alt="">
                    </div>
                    <div class="card-desc">
                        <h3>{{ $news->title }}</h3>
                            <a href="{{ route('news.detail',$news->id) }}" class="btn-card">Read</a>   
                    </div>
                </div>
            </div>
              @endforeach
          </div>
      </div>
  </section>
  <!-- we are working ends -->
@endsection  