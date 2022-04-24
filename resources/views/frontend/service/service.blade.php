@extends('frontend.layout.master')
@section('content')

{{-- <style>

    .feature--image img {
      box-shadow: 2px 2px 6px rgba(0, 0, 0, .33);
    }

    .feature-pair:nth-child(even) {
      flex-direction: row-reverse;
    }

    .feature-pair {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-bottom: 64px;
    }

    .feature {
      flex-basis: 45%;
      text-align: center;
    }

    .feature--text {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 0 20px;
    }

    .features {
      margin: 64px 0;
      h4 {
        font-size: 23px;
        font-weight: bold;
        padding: 10px 0;
        border-bottom: 1px solid rgb(219, 219, 219);
        margin: 0;
        line-height: 27px;
      }
      p {
        font-size: 18px;
        font-weight: 300;
        color: #4e4e4e;
        line-height: 28.8px;
        margin-top: 5px;
      }
    }
</style> --}}

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
        {{-- <p hidden>{{ $n=1; }}</p> --}}
        {{-- <section class="features"> --}}
        @foreach ($services as $service)
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <img src="{{ asset('upload/images/service/'.$service['thumbnail']) }}" width="100%">
          </div>
          <div class="col-md-6">
              <h2>{{ $service->name }}</h2>
              <p>
                  {!! $service->description !!}
              </p>
          </div>
          </div>
        
    </div>
        {{-- <p hidden>{{ $n++; }}</p> --}}

        
            {{-- <section class="feature-pair col-md-6">
                <div class="col-md-6">
              <article class="feature feature--image">
                <img src="{{ asset('upload/images/service/'.$service['thumbnail']) }}" width="100%">
              </article>
                </div>
              <div class="col-md-6">
              <article class="feature feature--text">
                <h4><font color="89ba40">{{ $n }}</font> / {{ $service->name }}</h4>
                <p>Creating tracking links shouldn't be difficult, so we've streamlined the entire process. Whenever you create a link, we save the data so it's at your fingertips next time you need it. No more wondering whether you usually use facebook.com or facebook.</p>
              </article>
              </div>
            </section> --}}
        @endforeach
        {{-- </section> --}}
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