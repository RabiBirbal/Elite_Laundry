@extends('frontend.layout.master')
@section('content')
<style>
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
    .fa{
      font-size: 40px;
      margin: 10px;
    }
</style>

<hr>

<div class="banner-image">
    <img src="{{ asset('frontend/assets/image/contact-image.jpg') }}" width="100%">
</div>

<!-- contact details -->
<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="{{ asset('frontend/assets/image/1.jpg') }}">
			</div>
			<div class="col-md-4">
				<h2>Hours of Operation</h2>
				<p>Opening time: {{ $profile->working_hours }} </p>
				<p>{{ $profile->working_days }}</p>
			</div>
			<div class="col-md-4">
				{{-- <h2>Carrers</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. </p> --}}
        @if ($profile->facebook)
        <a href="{{ $profile->facebook }}" target="__blank" style="margin-right: 10px"><i class="fa fa-facebook"></i></a>
        @endif
        @if ($profile->twitter)
        <a href="{{ $profile->twitter }}" target="__blank" style="margin-right: 10px"><i class="fa fa-twitter"></i></a>
        @endif
        @if ($profile->instagram)
        <a href="{{ $profile->instagram }}" target="__blank" style="margin-right: 10px"><i class="fa fa-instagram"></i></a>
        @endif
        @if ($profile->youtube)
        <a href="{{ $profile->youtube }}" target="__blank" style="margin-right: 10px"><i class="fa fa-youtube"></i></a>
        @endif
        @if ($profile->linked_in)
        <a href="{{ $profile->linked_in }}" target="__blank" style="margin-right: 10px"><i class="fa fa-linkedin"></i></a>
        @endif                      
			</div>
		</div>
	</div>
</div>



<div class="google-map">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				{!! $profile->map !!}
			</div>
			<div class="col-md-6">
				      <div class="wrapper fadeInDown">
               <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{ asset('frontend/assets/image/elite-laundry-logos.png') }}" id="icon" alt="User Icon"  />
     
    </div>

    <!-- Login Form -->
    <form action="{{ route('contact.add') }}" method="post">
        @csrf
        @include('layouts.alert')
      <input type="text" id="name" class="fadeIn second" name="name" value="{{ old('name') }}" placeholder="Full Name">
      @error('name')
      <p style="color: red">{{ $message }}</p>
      @enderror                               
      <input type="email" id="email" class="fadeIn second" name="email" value="{{ old('email') }}" placeholder="Email">
      @error('email')
      <p style="color: red">{{ $message }}</p>
      @enderror  
      <input type="text" id="phone" class="fadeIn third" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
      @error('phone')
      <p style="color: red">{{ $message }}</p>
      @enderror  
       {{-- <input type="text" id="subject" class="fadeIn third" name="subject" value="{{ old('subject') }}" placeholder="Subject">
       @error('subject')
      <p style="color: red">{{ $message }}</p>
      @enderror   --}}
      <textarea name="message" id="" cols="30" rows="5" class="fadeIn third" placeholder="Message">{{ old('message') }}</textarea>
      @error('message')
      <p style="color: red">{{ $message }}</p>
      @enderror  
      <input type="submit" class="fadeIn fourth" value="Send">
    </form>

    <!-- Remind Passowrd -->
   <!--  <div id="formFooter">
      <a class="underlineHover" href="http://yohoniads.com/">Go to the Site</a>
    </div> -->

  </div>
</div>
			</div>
		</div>
	</div>
</div>

<!-- contact details  ends -->
@endsection