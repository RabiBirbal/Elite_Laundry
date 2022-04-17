<!-- navbar  -->
<nav class="navbar navbar-default navbar-fixed-top navcarbox" role="navigation">
    <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
   <!--  <a class="navbar-brand" href="#">Brand</a> -->
   @if($profile)
   <a href="{{ route('index') }}">
    <img src="{{ asset('upload/images/company_profile/'.$profile['logo']) }}" alt="logo">
   </a>
   @endif
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ route('index') }}">Home</a></li>
      <li><a href="{{ route('about') }}">About us</a></li>
      <li><a href="{{ route('service') }}">Our Services</a></li>
      <li><a href="{{ route('pricing') }}">Pricing</a></li>
      <li><a href="{{ route('contact') }}">Contact Us</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
    </div><!-- /.container-collapse -->
</nav>

<!-- navbar ends -->