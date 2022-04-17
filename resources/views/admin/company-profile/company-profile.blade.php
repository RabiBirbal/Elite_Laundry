@extends('layouts.app')
@section('content')

@include('layouts.alert')
<section class="content">
    <div class="container-fluid">
        @if($profile)
        <form action="{{ route('company.profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id" value="{{ $profile['id'] }}">
            <div class="row">
                <div class="col-md-12 text-right">
                <p><a href="{{ route('home') }}">Home</a> / Company Profile</p>
                </div>
                <div class="col-md-12 text-left">
                    <h1>Company Profile</h1>
                </div>
                <!-- left column -->
                <div class="col-md-7">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">General Informations</h3>
                    </div>
                    <!-- /.card-header -->
                        <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $profile->name }}" placeholder="Enter Company Name">
                            @error('name')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <label for="logo">Logo</label><br>
                        <img src="{{ asset('upload/images/company_profile/'.$profile['logo']) }}" alt="Logo" width="100px">
                        <div class="form-group" id="image">
                            <div class="form-group">
                                <label for="logo">Change Logo</label>
                                <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" onchange="showPreview1(event);" name="logo">
                            <div class="invalid-feedback">Please choose the product image.</div>
                            @error('logo')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            <div class="preview mt-2">
                                <img src="" id="file-ip-1-preview" width="200px">
                            </div>
                            </div>
                        </div>
                        <label for="favicon">Favicon</label><br>
                        <img src="{{ asset('upload/images/company_profile/'.$profile['favicon']) }}" alt="Logo" width="100px">
                        <div class="form-group" id="image">
                            <div class="form-group">
                                <label for="favicon">Change Favicon</label>
                                <input type="file" id="file-ip-2" accept="image/*" class="form-control-file border" value="{{ old('favicon') }}" onchange="showPreview2(event);" name="favicon">
                            <div class="invalid-feedback">Please choose the product image.</div>
                            @error('favicon')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            <div class="preview mt-2">
                                <img src="" id="file-ip-1-preview2" width="200px">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $profile->email }}" placeholder="Enter email">
                            @error('email')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $profile->phone }}" placeholder="Enter email">
                            @error('phone')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ $profile->address }}" placeholder="Enter email">
                            @error('address')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="short_introduction">Short Introduction</label>
                            <textarea id="summernote" name="short_introduction"  placeholder="Enter Company's Short Introduction">
                                {{ $profile->short_introduction }}
                            </textarea>
                            @error('short_introduction')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="introduction">Introduction</label>
                            <textarea id="summernote" name="introduction"  placeholder="Enter Company's Introduction">
                                {{ $profile->introduction }}
                            </textarea>
                            @error('introduction')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        </div>
                        <!-- /.card-body -->
                <!-- /.card -->

                </div>
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-5">
                <!-- Form Element sizes -->
                <div class="card card-success">
                    <div class="card-header">
                    <h3 class="card-title">Other Informations</h3>
                    </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="map">Map</label>
                                <input type="text" class="form-control" name="map" id="map" value="{{ $profile->map }}" placeholder="Enter Map">
                                @error('address')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="url" class="form-control" name="facebook" id="facebook" value="{{ $profile->facebook }}" placeholder="Enter Facebook">
                            @error('facebook')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="url" class="form-control" name="twitter" id="twitter" value="{{ $profile->twitter }}" placeholder="Enter Twitter">
                            @error('twitter')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="url" class="form-control" name="instagram" id="instagram" value="{{ $profile->instagram }}" placeholder="Enter Instagram">
                            @error('instagram')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="youtube">Youtube</label>
                            <input type="url" class="form-control" name="youtube" id="youtube" value="{{ $profile->youtube }}" placeholder="Enter Youtube">
                            @error('youtube')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="linkedin">Linked In</label>
                            <input type="url" class="form-control" name="linkedin" id="linkedin" value="{{ $profile->linked_in }}" placeholder="Enter Linked In">
                            @error('linkedin')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="working_days">Working Days</label>
                            <input type="text" class="form-control" name="working_days" id="working_days" value="{{ $profile->working_days }}" placeholder="Enter Working Days">
                            @error('working_days')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="working_hours">Working Hours</label>
                            <input type="text" class="form-control" name="working_hours" id="working_hours" value="{{ $profile->working_hours }}" placeholder="Enter Working Hours">
                            @error('working_hours')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        </div>
                        <!-- /.card-body -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure want to continue?')">Update</button>
        </div>
    </form>
        @else
        <form action="{{ route('company.profile.add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 text-right">
                <p><a href="{{ route('home') }}">Home</a> / Company Profile</p>
                </div>
                <div class="col-md-12 text-left">
                    <h1>Company Profile</h1>
                </div>
                <!-- left column -->
                <div class="col-md-7">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">General Informations</h3>
                    </div>
                    <!-- /.card-header -->
                        <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Company Name">
                            @error('name')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group" id="image">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" value="{{ old('logo') }}" onchange="showPreview1(event);" name="logo">
                            <div class="invalid-feedback">Please choose the product image.</div>
                            @error('logo')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            <div class="preview mt-2">
                                <img src="" id="file-ip-1-preview" width="200px">
                            </div>
                            </div>
                        </div>
                        <div class="form-group" id="image">
                            <div class="form-group">
                                <label for="favicon">Favicon</label>
                                <input type="file" id="file-ip-2" accept="image/*" class="form-control-file border" value="{{ old('favicon') }}" onchange="showPreview2(event);" name="favicon">
                            <div class="invalid-feedback">Please choose the product image.</div>
                            @error('favicon')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            <div class="preview mt-2">
                                <img src="" id="file-ip-1-preview2" width="200px">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter email">
                            @error('email')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Enter email">
                            @error('phone')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" placeholder="Enter email">
                            @error('address')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="short_introduction">Short Introduction</label>
                            <textarea id="summernote" name="short_introduction" value="{{ old('short_introduction') }}"  placeholder="Enter Company's Short Introduction">
                                {{ old('short_introduction') }}
                            </textarea>
                            @error('short_introduction')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="introduction">Introduction</label>
                            <textarea id="summernote" name="introduction" value="{{ old('introduction') }}" placeholder="Enter Company's Introduction">
                                {{ old('introduction') }}
                            </textarea>
                            @error('introduction')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        </div>
                        <!-- /.card-body -->
                <!-- /.card -->

                </div>
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-5">
                <!-- Form Element sizes -->
                <div class="card card-success">
                    <div class="card-header">
                    <h3 class="card-title">Other Informations</h3>
                    </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="map">Map</label>
                                <input type="text" class="form-control" name="map" id="map" value="{{ old('map') }}" placeholder="Enter Map">
                                @error('address')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="url" class="form-control" name="facebook" id="facebook" value="{{ old('facebook') }}" placeholder="Enter Facebook">
                            @error('facebook')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="url" class="form-control" name="twitter" id="twitter" value="{{ old('twitter') }}" placeholder="Enter Twitter">
                            @error('twitter')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="url" class="form-control" name="instagram" id="instagram" value="{{ old('instagram') }}" placeholder="Enter Instagram">
                            @error('instagram')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="youtube">Youtube</label>
                            <input type="url" class="form-control" name="youtube" id="youtube" value="{{ old('youtube') }}" placeholder="Enter Youtube">
                            @error('youtube')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="linkedin">Linked In</label>
                            <input type="url" class="form-control" name="linkedin" id="linkedin" value="{{ old('linkedin') }}" placeholder="Enter Linked In">
                            @error('linkedin')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="working_days">Working Days</label>
                            <input type="text" class="form-control" name="working_days" id="working_days" value="{{ old('working_hours') }}" placeholder="Enter Working Days">
                            @error('working_days')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="working_hours">Working Hours</label>
                            <input type="text" class="form-control" name="working_hours" id="working_hours" value="{{ old('working_hours') }}" placeholder="Enter Working Hours">
                            @error('working_hours')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        </div>
                        <!-- /.card-body -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
        @endif
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  <script>
      $('textarea#summernote').summernote({
      placeholder: 'Write Introduction Here ......',
      tabsize: 2,
      height: 100,
toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
      //['fontname', ['fontname']],
     // ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'hr']],
      //['view', ['fullscreen', 'codeview']],
      ['help', ['help']]
    ],
    });
  </script>

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
    function showPreview2(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview2");
            preview.src=src;
            preview.style.display="block";
        }
    }
</script>
@endsection