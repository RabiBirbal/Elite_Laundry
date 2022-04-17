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
    @if(!$service)
    <div class="container-fluid">
        <div class="col-md-12 text-right">
            <p><a href="{{ route('home') }}">Home</a> / <a href="{{ route('service.show') }}">Service</a> / Add</p>
        </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Service</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('post.service.add') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Service Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Service Name">
                            @error('name')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" value="{{ old('thumbnail') }}" onchange="showPreview1(event);" name="thumbnail">
                          <div class="invalid-feedback">Please choose the service image.</div>
                          @error('thumbnail')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                          <div class="preview mt-2">
                            <img src="" id="file-ip-1-preview" width="200px">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="summernote" name="description" placeholder="Enter Description Here">
                                {{ old('description') }}
                            </textarea>
                            @error('description')
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
            <p><a href="{{ route('home') }}">Home</a> / <a href="{{ route('service.show') }}">Service</a> / Edit</p>
        </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Service</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('service.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $service['id'] }}">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="name">Service Name</label>
                              <input type="text" class="form-control" name="name" id="name" value="{{ $service['name'] }}" placeholder="Enter Service Name">
                              @error('name')
                                  <p style="color: red">{{ $message }}</p>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="thumbnail" class="mr-5">Thumbnail</label><br>
                              <img src="{{ asset('upload/images/service/'.$service['thumbnail']) }}" alt="Thumbnail" width="100px"><br>
                              <label for="thumbnail" class="mt-3">Change Thumbnail</label>
                              <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" value="{{ old('thumbnail') }}" onchange="showPreview1(event);" name="thumbnail">
                            <div class="invalid-feedback">Please choose the service image.</div>
                            @error('thumbnail')
                                  <p style="color: red">{{ $message }}</p>
                              @enderror
                            <div class="preview mt-2">
                              <img src="" id="file-ip-1-preview" width="200px">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="description">Description</label>
                              <textarea id="summernote" name="description" value="{{ old('description') }}" placeholder="Enter Description Here">
                                {{ $service->description }}
                            </textarea>
                              @error('description')
                                  <p style="color: red">{{ $message }}</p>
                              @enderror
                          </div>
                      </div>
                      <!-- Rounded switch -->
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="publish">Publish?</label><br>
                        <label class="switch">
                            @if ($service->status=="on")
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
        height: 200,
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
<script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFilesize         :       1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
};
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

    <script>
        $(function() {
            $("#sortableImgThumbnailPreview").sortable({
             connectWith: ".RearangeBox",
            
                
              start: function( event, ui ) { 
                   $(ui.item).addClass("dragElemThumbnail");
                   ui.placeholder.height(ui.item.height());
           
               },
                stop:function( event, ui ) { 
                   $(ui.item).removeClass("dragElemThumbnail");
               }
            });
            $("#sortableImgThumbnailPreview").disableSelection();
        });
            document.getElementById('files').addEventListener('change', handleFileSelect, false);

            function handleFileSelect(evt) {
                
                var files = evt.target.files; 
                var output = document.getElementById("sortableImgThumbnailPreview");
                
                // Loop through the FileList and render image files as thumbnails.
                for (var i = 0, f; f = files[i]; i++) {

                // Only process image files.
                if (!f.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();

                // Closure to capture the file information.
                reader.onload = (function(theFile) {
                    return function(e) {
                    // Render thumbnail.
                    var imgThumbnailElem = "<div class='RearangeBox imgThumbContainer'><i class='material-icons imgRemoveBtn' onclick='removeThumbnailIMG(this)'>cancel</i><div class='IMGthumbnail' ><img  src='" + e.target.result + "'" + "title='"+ theFile.name + "'/></div><div class='imgName'>"+ theFile.name +"</div></div>";
                                
                                output.innerHTML = output.innerHTML + imgThumbnailElem; 
                    
                    };
                })(f);

                // Read in the image file as a data URL.
                reader.readAsDataURL(f);
                }
            }

            function removeThumbnailIMG(elm){
                elm.parentNode.outerHTML='';
            }
    </script>

    <script>
        $(document).ready(function(){
            $(".cat").change(function(){
                $('#sub').prop('disabled', false);
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box1").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box1").hide();
                    }
                });
            }).change();
        });
        </script>
@endsection
