@extends('frontend.layout.master')
@section('content')
@livewireStyles
@livewireScripts
@include('layouts.alert')
            <br>
            <div class="page-content" >
                <div class="container" style="background-color: white;">
                    <div >
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr class="text-center">
                                    <th>Image</th>
                                    <th>Name</th>


                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @if ($cart_items)
                                @foreach ($cart_items as $cart_item)
                                {{-- @foreach ($cart_item->product as $product) --}}
                                    <tr class="text-center">
                                        <td class="price-col" >
                                            <img style="width: 100%;" src="{{ asset('upload/images/product/'.$cart_item['thumbnail']) }}" alt="">
                                        </td>
    
    
    
                                        <td>
                                            <h6>{{ $cart_item->name }}</h6>
                                              
                                          
                                        </td>
                                       
                                        <td class="price-col">${{ $cart_item->price }}</td>
                                        <td class="price-col">
                                            @if($cart_item->discount)
                                            ${{ $cart_item->discount }}
                                            @endif
                                        </td>
                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">
                                                {{-- <input type="number" class="form-control" value="{{ $cart_item->qty }}" min="1" max="10" step="1" data-decimals="0"
                                                    required="" style="display: none;"> --}}
                                                    <select class="form-control" uid='{{$cart_item->id}}' name="qty" id="qty">
                                                        <option value="{{ $cart_item->qty }}">{{ $cart_item->qty }}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                      </select>
                                            </div><!-- End .cart-product-quantity -->
                                        </td>
                                        <td class="total-col">${{ $cart_item->total }}</td>
                                        <td class="remove-col">
                                            <form action="{{ route('cart.delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" id="" value="{{ $cart_item->id }}">
                                                <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn-remove">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                @endforeach
                                @endif
                                
                                
                            </tbody>


                        </table><!-- End .table table-wishlist -->

                    

                       
                       
                    </div>
                </div>
                <br>

                <div class="container" style="background: white;">
                    <table class="table table-cart table-mobile">
                        <thead>
                            <tr class="text-center">
                                <th></th>
                                <th>TOTAL ITEMS</th>
                                <th>TOTAL Discount</th>
                                <th> TOTAL Price</th>
                                <th></th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            <tr class="text-center">
                    
                    
                    
                                <td>
                                    <h6>YOU CAN GENERATE PDF OF YOUR ORDER </h6>
                    
                    
                                </td>
                    
                                <td class="price-col"> {{ $cart_item_count }} items</td>
                                <td class="price-col">
                                    @if ($discount)
                                        ${{ $discount }}
                                    @else
                                        $0
                                    @endif
                                </td>
                                <td class="price-col">
                                    @if ($cart_sum)
                                        ${{ $cart_sum }}
                                    @else
                                        $0
                                    @endif
                                </td>
                            </tr>
                    
                        </tbody>
                    
                    
                    </table><!-- End .table table-wishlist -->

                </div>
            </div>
            @if ($cart_items)
            <div class="container-fluid row mb-3">
                <div class="col-md-12 text-right">
                    <a class="btn btn-primary" href="{{route('view.pdf')}}" target="__blank">View PDF</a>
                </div>
                
            </div>
            @endif
                
{{-- cart quantity change --}}
                <script type="text/javascript">
                    $('select').change(function () {
                     var optionSelected = $(this).find("option:selected");
                     var valueSelected  = optionSelected.val();
                     var textSelected   = optionSelected.text();
                      var adminid = $(this).attr('uid');
                      alert("Are you sure want to change the status??");
                    //   alert(valueSelected);
                      // alert(adminid);
                      $.ajax({
                      url: "{{route('cart-quantity-change')}}",
                      type:"POST",
                      data:{
                        "_token": "{{ csrf_token() }}",
                        value:valueSelected,
                        id: adminid,
                      },
                      success: function (response) {
                        window.location.reload(); 
                    },

                      error: function(data){
                         alert('Error occured.');
                      }
                     });
                    });
                  </script>
@endsection            
