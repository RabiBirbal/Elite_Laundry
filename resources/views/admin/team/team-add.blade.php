@extends('layouts.app')
@section('content')
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
    <div class="container-fluid">
      @if (!$team)
      <div class="col-md-12 text-right">
        <p><a href="{{ route('home') }}">Home</a> / <a href="{{ route('team.show') }}">Team</a> / Add</p>
    </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Team</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('team.add') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name">
                        @error('name')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" name="role" id="role" value="{{ old('role') }}" placeholder="Enter Role">
                        @error('role')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="summernote" name="description" value="" placeholder="Enter Description Here">
                          {{ old('description') }}
                        </textarea>
                        @error('description')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" value="{{ old('image') }}" onchange="showPreview1(event);" name="image">
                      <div class="invalid-feedback">Please choose the product image.</div>
                      @error('image')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                      <div class="preview mt-2">
                        <img src="" id="file-ip-1-preview" width="200px">
                      </div>
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
      @else
      <div class="col-md-12 text-right">
        <p><a href="{{ route('home') }}">Home</a> / <a href="{{ route('team.show') }}">Team</a> / Edit</p>
    </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Slider</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('team.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" id="" value="{{ $team['id'] }}">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $team->name }}" placeholder="Enter Name">
                        @error('name')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" name="role" id="role" value="{{ $team->role }}" placeholder="Enter Role">
                        @error('role')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="summernote" name="description" value="{{ old('description') }}" placeholder="Enter Description Here">
                          {{ $team->description }}
                        </textarea>
                        @error('description')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Image</label><br>
                        <img src="{{ asset('upload/images/team/'.$team['image']) }}" alt="" width="200px"><br>
                        <label for="image" class="mt-3">Change Image</label>
                        <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" value="{{ old('image') }}" onchange="showPreview1(event);" name="image">
                      <div class="invalid-feedback">Please choose the product image.</div>
                      @error('image')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                      <div class="preview mt-2">
                        <img src="" id="file-ip-1-preview" width="200px">
                      </div>
                    </div>
                </div>
                <!-- Rounded switch -->
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="publish">Publish?</label><br>
                  <label class="switch">

                      @if ($team->status=="on")
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
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      @endif
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
        placeholder: 'Write Something Here .......',
        tabsize: 2,
        height: 150,
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

    </script>

@endsection
