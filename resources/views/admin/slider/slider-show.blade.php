@extends('layouts.app')
@section('content')

@include('layouts.alert')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-right">
          <p><a href="{{ route('home') }}">Home</a> / <a href="{{ route('slider.add') }}">Sliders</a> / Show</p>
        </div>
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Slider Lists</h3>
            </div>
            <!-- /.card-header -->
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($sliders)
                    @foreach($sliders as $key => $slider)
                    <tr>
                        <td>{{ $key }}</td>
                        <td class="text-center">
                          @if ($slider->image != null)
                            <img src="{{ asset('upload/images/slider/'.$slider->image) }}" alt="Image" width="100px">
                          @else
                            <img src="{{ asset('no-image.jpg') }}" alt="Image" width="100px">
                          @endif
                        </td>
                        <td class="text-center">
                          @if ($slider->status == "on")
                            <a href="{{ route('slider.status',$slider->id) }}" class="btn btn-success" onclick="return confirm('Are you sure want to continue?')">On</a>
                          @else
                            <a href="{{ route('slider.status',$slider->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to continue?')">Off</a>
                          @endif
                        </td>
                        <td>
                            <a href="{{ route('slider.edit',$slider['id']) }}" class="btn btn-warning" ><i class="fas fa-edit"></i> Edit</a>
                              
                              <form action="{{ route('slider.delete') }}" method="post" class="mt-1">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $slider['id'] }}">
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  <script>
      $('textarea#summernote').summernote({
      placeholder: 'Hello bootstrap 4',
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