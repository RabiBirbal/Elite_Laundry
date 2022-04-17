@extends('layouts.app')
@section('content')

@include('layouts.alert')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-right">
          <p><a href="{{ route('home') }}">Home</a> / <a href="{{ route('pricing.show') }}">Pricing</a> / Show</p>
        </div>
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Pricing Lists</h3>
            </div>
            <!-- /.card-header -->
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pricings)
                    @foreach($pricings as $key => $pricing)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $pricing->title }}</td>
                        <td class="text-center">
                          @if ($pricing->image != null)
                            <img src="{{ asset('upload/images/pricing/'.$pricing->image) }}" alt="Image" width="130px">
                          @else
                            <img src="{{ asset('no-image.jpg') }}" alt="Image" width="100px">
                          @endif
                        </td>
                        <td>{{ $pricing->price }}</td>
                        <td class="text-center">
                            @if ($pricing->status == "on")
                                <a href="{{ route('pricing.status',$pricing->id) }}" class="btn btn-success" onclick="return confirm('Are you sure want to continue?')">On</a>
                            @else
                                <a href="{{ route('pricing.status',$pricing->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to continue?')">Off</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pricing.edit',$pricing['id']) }}" class="btn btn-warning" ><i class="fas fa-edit"></i> Edit</a>
                              
                              <form action="{{ route('pricing.delete') }}" method="post" class="mt-1">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $pricing['id'] }}">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to continue?')"><i class="fas fa-trash"></i> Remove</button>
                              </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <p>Sub Category not found!!!</p>
                    @endif
                </tbody>
            </table>
          <!-- /.card -->

        </div>
        </div>
        <!--/.col (left) -->
      
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection