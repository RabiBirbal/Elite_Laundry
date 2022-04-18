<!-- footer and copyright -->
<div class="footer-bottom-area bg-dark-light section-padding-sm">
    <div class="container">
        <div class="row widgets footer-widgets">

            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-widget widget-about">
                    <h5 class="widget-title">About Us</h5>
                    @if ($profile)
                    <p>
                        {!! $profile->short_introduction !!}
                    </p>
                    @endif
                    
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-widget widget-quick-links">
                    <h5 class="widget-title">Useful Links</h5>
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="{{ route('service') }}">Our Services</a></li>
                        <li><a href="{{ route('pricing') }}">Pricing</a></li>
                        <li><a href="{{ route('contact') }}">Contact us</a></li>
                    </ul>
                </div>
            </div>

            
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-widget widget-contact">
                    <h5 class="widget-title">Contact Us</h5>
                    @if ($profile)
                    <ul>
                        <li class="address">
                            <span class="icon"><i class="fa fa-map-marker"></i></span>
                            <p>{{ $profile->address }}</p>
                        </li>
                        <li class="phone">
                            <span class="icon"><i class="fa fa-phone"></i></span>
                            <p>{{ $profile->phone }}</p>
                        </li>
                        <!-- <li class="fax">
                            <span class="icon"><i class="fa fa-fax"></i></span>
                            <p><a href="#">+91 7568 54 3012</a></p>
                        </li> -->
                        <li class="email">
                            <span class="icon"><i class="fa fa-envelope-o"></i></span>
                            <p>{{ $profile->email }}</p>
                        </li>
                    </ul>
                    @endif
                    
                </div>
            </div>

        </div>
    </div>
</div>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-9 ">
                <h4>Copyright © 2022 | All Right Reserved Elite Laundry Services Pvt. Ltd.</h4>
            </div>
            <div class="col-md-3">
                <h5>Powered by: <a href="http://yohoniads.com/">Yohoni Ad Marketing</a> </h5></div>
            </div>
        </div>
    </div>
</div>
<!-- footer and copyright ends -->

<div class="scroll-top-wrapper ">
<span class="scroll-top-inner">
<i class="fa fa-2x fa-arrow-circle-up"></i>
</span>
</div>
<!-- footer ends -->