@extends('layouts.app')
@section('content')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<style>
    .ui-sortable-placeholder { 
    	border: 1px dashed black!important; 
        visibility: visible !important;
        background: #eeeeee78 !important;
       }
    .ui-sortable-placeholder * { visibility: hidden; }
        .RearangeBox.dragElemThumbnail{opacity:0.6;}
        .RearangeBox {
            width: 180px;
            height:240px;
            padding:10px 5px;
            cursor: all-scroll;
            float: left;
            border: 1px solid #9E9E9E;
            font-family: sans-serif;
            display: inline-block;            
            margin: 5px!important;
            text-align: center;
            color: #673ab7;
            background: #ffc107;
          /*color: rgb(34, 34, 34);
            background: #f3f2f1;     */
        }




        body{
        font-family: sans-serif;
        margin: 0px;
        }

        .IMGthumbnail{
            /* max-width:168px;
            height:220px; */
            margin:auto;
        background-color: #ececec;
        padding:2px;
        border:none;
        }

        .IMGthumbnail img{
            max-width:100px;
            max-height:100;
        }

        .imgThumbContainer{
            height: auto;
        margin:4px;
        border: solid;
        display: inline-block;
        justify-content: center;
            position: relative;
            border: 1px solid rgba(0,0,0,0.14);
        -webkit-box-shadow: 0 0 4px 0 rgba(0,0,0,0.2);
            box-shadow: 0 0 4px 0 rgba(0,0,0,.2);
        }



        .imgThumbContainer > .imgName{
        text-align:center;
        padding: 2px 6px;
        margin-top:4px;
        font-size:13px;
        height: 15px;
        overflow: hidden;
        }

        .imgThumbContainer > .imgRemoveBtn{
            position: absolute;
            color: #fa0c03ba;
            right: 2px;
            top: 2px;
            cursor: pointer;
            display: none;
        }

        .RearangeBox:hover > .imgRemoveBtn{ 
            display: block;
        }
</style>
<style>
    /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>
@include('layouts.alert')
<section class="content">
    @if(!$pricing)
    <div class="container-fluid">
        <div class="col-md-12 text-right">
            <p><a href="{{ route('home') }}">Home</a> / <a href="{{ route('pricing.show') }}">Pricing</a> / Add</p>
        </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Pricing</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('post.pricing.add') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Title">
                            @error('title')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" value="{{ old('image') }}" onchange="showPreview1(event);" name="image">
                          <div class="invalid-feedback">Please choose the service image.</div>
                          @error('image')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                          <div class="preview mt-2">
                            <img src="" id="file-ip-1-preview" width="200px">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Enter Price">
                            @error('price')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Rounded switch -->
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="publish">Publish?</label><br>
                        <label class="switch">
                            <input type="checkbox" class="form-control" name="status">
                            <span class="slider round"></span>
                        </label>
                        </div>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div><!-- /.container-fluid -->
    @else
    <div class="container-fluid">
        <div class="col-md-12 text-right">
            <p><a href="{{ route('home') }}">Home</a> / <a href="{{ route('pricing.show') }}">Pricing</a> / Edit</p>
        </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Pricing</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('pricing.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $pricing['id'] }}">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" class="form-control" name="title" id="title" value="{{ $pricing['title'] }}" placeholder="Enter Title">
                              @error('title')
                                  <p style="color: red">{{ $message }}</p>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="image" class="mr-5">Image</label><br>
                              <img src="{{ asset('upload/images/pricing/'.$pricing['image']) }}" alt="image" width="100px"><br>
                              <label for="image" class="mt-3">Change Thumbnail</label>
                              <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" value="{{ old('image') }}" onchange="showPreview1(event);" name="image">
                            <div class="invalid-feedback">Please choose the service image.</div>
                            @error('image')
                                  <p style="color: red">{{ $message }}</p>
                              @enderror
                            <div class="preview mt-2">
                              <img src="" id="file-ip-1-preview" width="200px">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ $pricing['price'] }}" placeholder="Enter Price">
                            @error('price')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                      <!-- Rounded switch -->
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="publish">Publish?</label><br>
                        <label class="switch">
                            @if ($pricing->status=="on")
                            <input type="checkbox" class="form-control" name="status" checked>
                            @else
                            <input type="checkbox" class="form-control" name="status">
                            @endif
                            <span class="slider round"></span>
                        </label>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /.card-body -->
  
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure want to continue?')">Update</button>
                </div>
            </form>
            @endif
  </section>

    <!-- image preview -->
    <script type="text/javascript">
        function showPreview1(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src=src;
                preview.style.display="block";
            }
        }

    </script>
@endsection
