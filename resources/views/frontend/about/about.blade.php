@extends('frontend.layout.master')
@section('content')
<style>
    .specialize{
         background-image: url('{{ asset('frontend/assets/image/iron.jpg') }}');
         background-attachment: fixed;
         background-repeat: no-repeat;
 
       }
 
        .delivery{
         background-image: url('{{ asset('frontend/assets/image/cloth-folding.jpg') }}');
         background-attachment: fixed;
         background-repeat: no-repeat;
 
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

<!-- image and text -->
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1><b>Professional care that is reliable at affordable Price</b></h1>
				<p>Dry Cleaning pioneered the latest technology in washing and dry cleaning.  Our services combine our expertise and experience acquired  over a period of time to provide you with clean laundry, linen and curtains in a shortest possible turnaround time.</p>
			</div>
			<div class="col-md-6">
				<img src="{{ asset('frontend/assets/image/washing-cloth.png') }}">
			</div>
		</div>
	</div>
</div>
<!-- image and text ends -->


<!-- specialize -->
<div class="specialize">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('frontend/assets/image/hanger.png') }}">
                <h4>STEAM IRON SERVICE</h4>
                <p>The temperature control iron boxes ensure different types of garments get appropriate heat for pressing.</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('frontend/assets/image/shirt.png') }}">
                <h4>DRY CLEANING SERVICE</h4>
                <p>Oil stains are stubborn and may not be entirely possible to remove by water.  Moreover, synthetic fibers like polyester respond well to only dry cleaning.</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('frontend/assets/image/detergent.png') }}">
                <h4>STAIN REMOVAL</h4>
                <p>Among the advantages of dry cleaning is its ability to dissolve grease and oils in a superior way that water can never match.</p>
            </div>

              <div class="col-md-4">
                <img src="{{ asset('frontend/assets/image/steam-iron.png') }}">
                <h4>CURTAINS & DRAPERY</h4>
                <p>The curtains and drapery come in different materials such as pure cotton lining, linen and cotton blend drapes in superior color and texture.</p>
            </div>

              <div class="col-md-4">
                <img src="{{ asset('frontend/assets/image/tap.png') }}">
                <h4>SILK & SUEDE</h4>
                <p>Often food, beverage stains and others like pen ink marks could mar your suede and silk handbags or jackets making an attractive fashion statement.</p>
            </div>

              <div class="col-md-4">
                <img src="{{ asset('frontend/assets/image/basket-cloth.png') }}">
                <h4>COMMERCIAL LAUNDRY</h4>
                <p>Check out our special pricing for commercial laundry for hotels, hospitals and large factories and defense establishments.</p>
            </div>
        </div>
    </div>
</div>

<!-- specialize ends -->


<!-- we are working -->

<section class="details-card">
    <div class="container working">
        <div class="row">
              <div class="col-md-12 col-sm-12 col-lg-12">
                <h1><b>We are working with</b></h1>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="{{ asset('frontend/assets/image/norvic-hospital-788x445.jpg') }}" alt="">
                    </div>
                    <div class="card-desc">
                        <h3>Norvic International Hospital</h3>
                            <!-- <a href="#" class="btn-card">Read</a>    -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="{{ asset('frontend/assets/image/Grande_hospital.jpg') }}" alt="">
                       
                    </div>
                    <div class="card-desc">
                        <h3>Grande International Hospital</h3>
                          <!--   <a href="#" class="btn-card">Read</a>    -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="{{ asset('frontend/assets/image/yellow-pagoda.jpg') }}" alt="" width="50%">
                    </div>
                    <div class="card-desc">
                        <h3>Yellow Pagoda</h3>
                           <!--  <a href="#" class="btn-card">Read</a>    -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- we are working ends -->





<!-- delivery -->

<div class="delivery">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="image/delivery-person.png">
            </div>
            <div class="col-md-6">
                <p>Dry Cleaning is the latest dry cleaning & laundry service with many types of the quality cleaning process.  It is a  star laundry service replacing the local launderette or dry cleaner. Dry Cleaning offers a quick & reliable laundry pick-up service directly from your home.  Using our laundry App, you can place your online laundry order easily through the website.</p>
                <h2>Drycleaners always provide hassle free door step delivery.</h2>
            </div>
        </div>
    </div>
</div>




<!-- delivery ends -->
@endsection