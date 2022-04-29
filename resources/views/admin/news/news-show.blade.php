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
              <h3 class="card-title">News Lists</h3>
            </div>
            <!-- /.card-header -->
            <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Short Description</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($news_list)
                    @foreach($news_list as $key => $news)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $news->title }}</td>
                        <td class="text-center">
                          @if ($news->image != null)
                            <img src="{{ asset('upload/images/news/'.$news->image) }}" alt="Image" width="100px">
                          @else
                            <img src="{{ asset('no-image.jpg') }}" alt="Image" width="100px">
                          @endif
                        </td>
                        <td>
                            <textarea name="short_description" id="" cols="30" rows="10" class="form-control" style="width: 250px" readonly>{{ strip_tags($news->short_description) }}</textarea>
                        </td>
                        <td>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" style="width: 250px" readonly>{{ strip_tags($news->description) }}</textarea>
                        </td>
                        <td class="text-center">
                          @if ($news->status == "on")
                            <a href="{{ route('news.status',$news->id) }}" class="btn btn-success" onclick="return confirm('Are you sure want to continue?')">On</a>
                          @else
                            <a href="{{ route('news.status',$news->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to continue?')">Off</a>
                          @endif
                        </td>
                        <td>
                            <a href="{{ route('news.edit',$news['id']) }}" class="btn btn-warning" ><i class="fas fa-edit"></i> Edit</a>
                              
                              <form action="{{ route('news.delete') }}" method="post" class="mt-1">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $news['id'] }}">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to continue?')"><i class="fas fa-trash"></i> Remove</button>
                              </form>
                        </td>
                    </tr>
                    @endforeach
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