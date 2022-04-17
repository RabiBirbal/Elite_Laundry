@extends('frontend.layout.master')
@section('content')
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
    * {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    }

    body {
    color: #545454;
    font-family: "Open Sans", sans-serif;
    }

    .wrapper {
    margin: 0 auto;
    max-width: 960px;
    width: 100%;
    }

    .master {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding-top: 40px;
    }

    h1 {
    font-size: 20px;
    margin-bottom: 20px;
    }

    h2 {
    line-height: 160%;
    margin-bottom: 20px;
    text-align: center;
    }

    .rating-component {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-bottom: 10px;
    }

    .rating-component .status-msg {
    margin-bottom: 10px;
    text-align: center;
    }

    .rating-component .status-msg strong {
    display: block;
    font-weight: bold;
    margin-bottom: 10px;
    }

    .rating-component .stars-box {
    -ms-flex-item-align: center;
    align-self: center;
    margin-bottom: 15px;
    }

    .rating-component .stars-box .star {
    color: #ccc;
    cursor: pointer;
    }

    .rating-component .stars-box .star.hover {
    color: #ff5a49;
    }

    .rating-component .stars-box .star.selected {
    color: #ff5a49;
    }

    .feedback-tags {
    min-height: 119px;
    }

    .feedback-tags .tags-container {
    display: none;
    }

    .feedback-tags .tags-container .question-tag {
    text-align: center;
    margin-bottom: 40px;
    }

    .feedback-tags .tags-box {
    display: -webkit-box;
    display: -ms-flexbox;
    text-align: center;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    }

    .feedback-tags .tags-container .make-compliment {
    padding-bottom: 20px;
    }

    .feedback-tags .tags-container .make-compliment .compliment-container {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    color: #000;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    }

    .feedback-tags
    .tags-container
    .make-compliment
    .compliment-container
    .fa-smile-wink {
    color: #ff5a49;
    cursor: pointer;
    font-size: 40px;
    margin-top: 15px;
    -webkit-animation-name: compliment;
    animation-name: compliment;
    -webkit-animation-duration: 2s;
    animation-duration: 2s;
    -webkit-animation-iteration-count: 1;
    animation-iteration-count: 1;
    }

    .feedback-tags
    .tags-container
    .make-compliment
    .compliment-container
    .list-of-compliment {
    display: none;
    margin-top: 15px;
    }

    .feedback-tags .tag {
    border: 1px solid #ff5a49;
    border-radius: 5px;
    color: #ff5a49;
    cursor: pointer;
    margin-bottom: 10px;
    margin-left: 10px;
    padding: 10px;
    }

    .feedback-tags .tag.choosed {
    background-color: #ff5a49;
    color: #fff;
    }

    .list-of-compliment ul {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    }

    .list-of-compliment ul li {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    cursor: pointer;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-bottom: 10px;
    margin-left: 20px;
    min-width: 90px;
    }

    .list-of-compliment ul li:first-child {
    margin-left: 0;
    }

    .list-of-compliment ul li .icon-compliment {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    border: 2px solid #ff5a49;
    border-radius: 50%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    height: 70px;
    margin-bottom: 15px;
    overflow: hidden;
    padding: 0 10px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    width: 70px;
    }

    .list-of-compliment ul li .icon-compliment i {
    color: #ff5a49;
    font-size: 30px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    }

    .list-of-compliment ul li.actived .icon-compliment {
    background-color: #ff5a49;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    }

    .list-of-compliment ul li.actived .icon-compliment i {
    color: #fff;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    }

    .button-box .done {
    background-color: #ff5a49;
    border: 1px solid #ff5a49;
    border-radius: 3px;
    color: #fff;
    cursor: pointer;
    display: none;
    min-width: 100px;
    padding: 10px;
    }

    .button-box .done:disabled,
    .button-box .done[disabled] {
    border: 1px solid #ff9b95;
    background-color: #ff9b95;
    color: #fff;
    cursor: initial;
    }

    .submited-box {
    display: none;
    padding: 20px;
    }

    .submited-box .loader,
    .submited-box .success-message {
    display: none;
    }

    .submited-box .loader {
    border: 5px solid transparent;
    border-top: 5px solid #4dc7b7;
    border-bottom: 5px solid #ff5a49;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    -webkit-animation: spin 0.8s linear infinite;
    animation: spin 0.8s linear infinite;
    }

    @-webkit-keyframes compliment {
    1% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    25% {
        -webkit-transform: rotate(-30deg);
        transform: rotate(-30deg);
    }

    50% {
        -webkit-transform: rotate(30deg);
        transform: rotate(30deg);
    }

    75% {
        -webkit-transform: rotate(-30deg);
        transform: rotate(-30deg);
    }

    100% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    }

    @keyframes compliment {
    1% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    25% {
        -webkit-transform: rotate(-30deg);
        transform: rotate(-30deg);
    }

    50% {
        -webkit-transform: rotate(30deg);
        transform: rotate(30deg);
    }

    75% {
        -webkit-transform: rotate(-30deg);
        transform: rotate(-30deg);
    }

    100% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    }

    @-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
    }

    @keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
    }

</style>
@include('layouts.alert')
            <br>
            <div class="page-content">
                <div class="container">
                    <div class="product-details-top mb-2">
                        <div class="row" style="align-items: center;">
                            <div class="col-md-6">
                                <div class="product-gallery">
                                    <figure class="product-main-image">
                                        <img id="product-zoom" src="{{ asset('upload/images/product/'.$product['thumbnail']) }}"
                                            data-zoom-image="{{ asset('upload/images/product/'.$product['thumbnail']) }}" alt="product image">
            
                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->
            
                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        <?php
                                        $vv=json_decode($product->images, true);
                                        
                                        ?>
                                        @foreach($vv as $image)
                                        <a class="product-gallery-item" href="#"
                                            data-image="{{ asset('upload/images/product/'.$image) }}"
                                            data-zoom-image="{{ asset('upload/images/product/'.$image) }}">
                                            <img src="{{ asset('upload/images/product/'.$image) }}" alt="product side">
                                        </a>
                                        @endforeach
            
                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->
            
                            <div class="col-md-6">
                                <div class="product-details" style="padding-left: 30px;">
                                    <h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->
                                    <div class="product-price">
                                        ${{ $product->price }}
                                    </div><!-- End .product-price -->
            
                                    <div class="product-content">
                                        <p>
                                            {!! $product->description !!}
                                            </p>
                                    </div><!-- End .product-content -->
             
                                </div><!-- End .product-details -->
                                <form action="{{ route('add.to.cart') }}" method="post">
                                    @csrf
                                <div class="product-details-action">
                                    <div class="details-action-col">
                                        <div class="product-details-quantity">
                                            <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0"
                                                required="" style="display: none;">
                                           
                                        </div><!-- End .product-details-quantity -->
                                
                                        
                                    </div><!-- End .details-action-col -->
                                    <div class="details-action-col">
                                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                                            <input type="hidden" name="price" value="{{ $product['price'] }}">
                                            <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                    
                                        
                                    </div
                                
                                </div>
                            </form>
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->
                </div><!-- End .container -->
                <div class="container">
                    <form action="{{ route('product.review') }}" method="post">
                        @csrf
                        <div class="wrapper">
                            <div class="master">
                            <h1>Review And rating</h1>
                            <h2>How was your experience about our product?</h2>
                            @include('layouts.alert')
                            <div class="rating-component">
                                <div class="status-msg">
                                <label>
                                                <input  class="rating_msg" type="hidden" name="rating_msg" name="rating" value=""/>
                                                
                                            </label>
                                </div>
                                <div class="stars-box">
                                <i class="star fa fa-star" title="1 star" data-message="Poor" data-value="1"></i>
                                <i class="star fa fa-star" title="2 stars" data-message="Too bad" data-value="2"></i>
                                <i class="star fa fa-star" title="3 stars" data-message="Average quality" data-value="3"></i>
                                <i class="star fa fa-star" title="4 stars" data-message="Nice" data-value="4"></i>
                                <i class="star fa fa-star" title="5 stars" data-message="very good qality" data-value="5"></i>
                                </div>
                                <div class="starrate">
                                <label>
                                                <input  class="ratevalue" name="rating" type="hidden" value=""/>
                                                @error('rating')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </label>
                                </div>
                            </div>
                        
                            <div class="feedback-tags">
                                <div class="tags-container" data-tag-set="1">
                                <div class="question-tag">
                                    Why was your experience so bad?
                                </div>
                                </div>
                                <div class="tags-container" data-tag-set="2">
                                <div class="question-tag">
                                    Why was your experience so bad?
                                </div>
                        
                                </div>
                        
                                <div class="tags-container" data-tag-set="3">
                                <div class="question-tag">
                                    Why was your average rating experience ?
                                </div>
                                </div>
                                <div class="tags-container" data-tag-set="4">
                                <div class="question-tag">
                                    Why was your experience good?
                                </div>
                                </div>
                        
                                <div class="tags-container" data-tag-set="5">
                                <div class="make-compliment">
                                    <div class="compliment-container">
                                    Give a compliment
                                    <i class="far fa-smile-wink"></i>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="tags-box">
                                    <input type="text" class="tag form-control" name="name" id="inlineFormInputName" placeholder="Your Name">
                                    @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                    <input type="email" class="tag form-control" name="email" id="inlineFormInputName" placeholder="Your Email">
                                    @error('email')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                    <textarea name="feedback" id="" cols="30" rows="5" class=" tag form-control" placeholder="Please Enter Your Feedback......" autofocus></textarea>
                                    @error('feedback')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                    <input type="hidden" name="id" value="{{ $product->id }}" />
                                </div>
                                
                            </div>
                        
                            <div class="button-box">
                                <input type="submit" class=" done btn btn-warning" onclick="return confirm('Are you sure want to continue?')" value="Add review" />
                            </div>
                        
                            <div class="submited-box">
                                <div class="loader"></div>
                                <div class="success-message">
                                Thank you!
                                </div>
                            </div>
                            </div>
                        
                        </div>
                    </form>
                </div>
            <br>
                <div class="product-details-tab product-details-extended">
                    <div class="container">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                    role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab"
                                    aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab"
                                    aria-controls="product-review-tab" aria-selected="false">Reviews ({{ $review_count }})</a>
                            </li>
                        </ul>
                    </div><!-- End .container -->
            
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <div class="container">
                                <h3>Information</h3>
                                <p>
                                    {!! $product->description !!}
                                </p>
                            </div><!-- End .container -->
                        </div>
                        
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                            <div class="product-desc-content">
                                <div class="container">
                                    <h3>Information</h3>
                                    @if ($product->additional_information != null)
                                    {!! $product->additional_information !!}
                                    @else
                                    <h2>No Additional Informations</h2>
                                    @endif
                                    
                                </div><!-- End .container -->
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                            <div class="reviews">
                                <div class="container">
                                    <h3>Reviews ({{ $review_count }})</h3>
                                    @foreach ($product->review as $review)
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">{{ $review->name }}</a></h4>
                                                <div class="ratings-container">
                                                    {{-- <div class="ratings"> --}}
                                                        @for ($n=1; $n<=$review->rating; $n++)
                                                        <i class="fa fa-star" style="color: green"></i>
                                                        @endfor
                                                        
                                                    {{-- </div><!-- End .ratings --> --}}
                                                </div><!-- End .rating-container -->
                                                <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4>{{ $review->feedback }}</h4>
            
                                                {{-- <div class="review-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores
                                                        assumenda asperiores facilis porro reprehenderit animi culpa atque
                                                        blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit
                                                        beatae quae voluptas!</p>
                                                </div><!-- End .review-content --> --}}
            
                                                
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->
                                    @endforeach
                                </div><!-- End .container -->
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->
            
        
            </div>

<script>
    $(".rating-component .star").on("mouseover", function () {
    var onStar = parseInt($(this).data("value"), 10); //
    $(this).parent().children("i.star").each(function (e) {
        if (e < onStar) {
        $(this).addClass("hover");
        } else {
        $(this).removeClass("hover");
        }
    });
    }).on("mouseout", function () {
    $(this).parent().children("i.star").each(function (e) {
        $(this).removeClass("hover");
    });
    });

    $(".rating-component .stars-box .star").on("click", function () {
    var onStar = parseInt($(this).data("value"), 10);
    var stars = $(this).parent().children("i.star");
    var ratingMessage = $(this).data("message");

    var msg = "";
    if (onStar > 1) {
        msg = onStar;
    } else {
        msg = onStar;
    }
    $('.rating-component .starrate .ratevalue').val(msg);
    

    
    $(".fa-smile-wink").show();
    
    $(".button-box .done").show();

    if (onStar === 5) {
        $(".button-box .done").removeAttr("disabled");
    } else {
        $(".button-box .done").attr("disabled", "true");
    }

    for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass("selected");
    }

    for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass("selected");
    }

    $(".status-msg .rating_msg").val(ratingMessage);
    $(".status-msg").html(ratingMessage);
    $("[data-tag-set]").hide();
    $("[data-tag-set=" + onStar + "]").show();
    });

    $(".feedback-tags  ").on("click", function () {
    var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
    choosedTagsLength = choosedTagsLength + 1;

    if ($(this).hasClass("choosed")) {
        $(this).removeClass("choosed");
        choosedTagsLength = choosedTagsLength - 2;
    } else {
        $(this).addClass("choosed");
        $(".button-box .done").removeAttr("disabled");
    }

    console.log(choosedTagsLength);

    if (choosedTagsLength <= 0) {
        $(".button-box .done").attr("enabled", "false");
    }
    });



    $(".compliment-container .fa-smile-wink").on("click", function () {
    $(this).fadeOut("slow", function () {
        $(".list-of-compliment").fadeIn();
    });
    });



    $(".done").on("click", function () {
    $(".rating-component").hide();
    $(".feedback-tags").hide();
    $(".button-box").hide();
    $(".submited-box").show();
    $(".submited-box .loader").show();

    setTimeout(function () {
        $(".submited-box .loader").hide();
        $(".submited-box .success-message").show();
    }, 1500);
    });

</script>         

 @endsection           