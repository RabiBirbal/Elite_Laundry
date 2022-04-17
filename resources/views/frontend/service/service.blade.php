@extends('frontend.layout.master')
@section('content')
<hr>
<!-- banner image -->
<div class="banner-image">
<img src="{{ asset('frontend/assets/image/contact-image.jpg') }}" width="100%">
</div>
<!-- banner image ends -->


<!-- service about laundry -->
<div class="service">
<div class="container">
    <div class="row">
        <p hidden>{{ $n=1; }}</p>
        @foreach ($services as $service)
        <div class="col-md-3">
            <img src="{{ asset('upload/images/service/'.$service['thumbnail']) }}" width="100%">
        </div>
        <div class="col-md-3">
            <h2><font color="89ba40">{{ $n }}</font> / {{ $service->name }}</h2>
            <p>
                {!! $service->description !!}
            </p>
        </div>
        <p hidden>{{ $n++; }}</p>
        @endforeach
    </div>
</div>
{{-- </div>

<div class="about-laundry">
<div class="container">
    <div class="row">
        <div class="col-md-3">
        <h2><font color="89ba40">03</font> /Drapery</h2>
        <p>Dupioni silk is centuries old and has always remained a favorite as it offers the intricately woven silk yarns of varying thickness.  The texture & the strength of the material optimizes the light.</p>
        </div>
        <div class="col-md-3">
            <img src="image/drapery.jpg">
        </div>
        <div class="col-md-3">
        <h2><font color="89ba40">04</font> /Silk & Suede</h2>
        <p>Dupioni silk is centuries old and has always remained a favorite as it offers the intricately woven silk yarns of varying thickness.  The texture & the strength of the material optimizes the light.</p>
        </div>
        <div class="col-md-3">
            <img src="image/silk.jpg">
        </div>
    </div>
</div>
</div> --}}
<!-- service about laundry ends -->


<!-- why choosing dry cleaner -->
<div class="choose-drycleaner">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <h1>Why <b>Choose Dry Cleaning</b></h1>
        </div>
    </div>
</div>
</div>
<div class="why-choosing">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('frontend/assets/image/dry-cleaning.jpeg') }}" width="100%">
        </div>
        <div class="col-md-6">
            <h2><b>Being perfectly dressed gives a tranquility that no religion can bestow.</b></h2>
            <p>The way you dress and carry yourself sends a message to everyone around you. Your clothing and outward appearance shape assumptions about your personality, your education level, your individuality and the type of person you are.</p>
        </div>
    </div>
</div>
</div>
<!-- why choosing dry cleaner ends -->
@endsection