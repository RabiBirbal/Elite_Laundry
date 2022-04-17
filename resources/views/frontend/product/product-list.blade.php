@extends('frontend.layout.master')
@section('content')
<style>
    .w-5{
        display: none;
    }
</style>
@include('layouts.alert')
            <div class="product-sec">
            
                <br>

                <div class="container">
                    <div class="grid-container">
                        @foreach ($products as $product)
                        <a href="{{ route('product.details',$product['id']) }}">
                        <div class="grid-item">
                            <img src="{{ asset('upload/images/product/'.$product['thumbnail']) }}" alt="">
                            <center>
                                <h6>
                                    {{ $product->name }}
                                </h6>
                                <h6>
                                    Nrs. {{ $product->price }}
                                </h6>
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
                            </center>
                            <br>
                        </div>
                        </a>
                        @endforeach
            
                    </div>
                    {{ $products->links() }} 
                </div>
                <br>
             
            
                <br>
            </div>
@endsection
