<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container-fluid" style="padding: 5%">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 15px ">
              <div class="pull-right">
                <button id="download" class="btn btn-success float-right ml-3">Generate PDF</button>
                {{-- <a class="btn btn-primary" href="{{route('generate.pdf',['download'=>'pdf'])}}">Download PDF</a> --}}
              </div>
            </div>
          </div><br>
          <div id="invoice">
            <h1>Product Details</h1>
        <table class="table table-bordered table-striped" id="invoice">
            <thead class="thead-dark text-center">
                <tr class="text-center">
                    <th class="text-center">SN</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Discount</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                <p hidden>{{ $n=1 }}</p>
                @foreach ($data['cart_items'] as $cart_item)
                                {{-- @foreach ($cart_item->product as $product) --}}
                                    <tr class="text-center">
                                        <td>{{ $n }}</td>
                                        <td class="price-col" >
                                            <img style="width: 100px" src="{{ asset('upload/images/product/'.$cart_item['thumbnail']) }}" alt="">
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
                                            {{ $cart_item->qty }}
                                        </td>
                                        <td class="total-col">${{ $cart_item->total }}</td>
                                    </tr>
                                    {{-- @endforeach --}}
                                    <p hidden>{{ $n++ }}</p>
                                @endforeach
            </tbody>
        </table>
        <h1>Summary</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th></th>
                    <th class="text-center">TOTAL ITEMS</th>
        
        
                    <th class="text-center"> TOTAL Price</th>
                    <th class="text-center">TOTAL Discount</th>
        
                </tr>
            </thead>
        
            <tbody>
                <tr class="text-center">
        
        
        
                    <td>
                        <h6>YOU CAN GENERATE PDF OF YOUR ORDER </h6>
        
        
                    </td>
        
                    <td class="price-col"> {{ $data['cart_item_count'] }} items</td>
                    <td class="price-col">${{ $data['cart_sum'] }}</td>
                    <td class="price-col">
                        ${{ $data['discount'] }}
                    </td>
        
                </tr>
        
            </tbody>
        
        
        </table><!-- End .table table-wishlist -->
          </div>
        
    </div>

    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script type="text/javascript">
    window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'cart_details.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 1 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>
</body>
</html>