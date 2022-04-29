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
      <div class="row">
        <div class="col-md-12 text-right">
          <p><a href="{{ route('home') }}">Home</a> / contact</p>
        </div>
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Contact Lists</h3>
            </div>
            <!-- /.card-header -->
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($contacts)
                    @foreach($contacts as $key => $contact)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $contact->name }}</td>
                        <td><a href="mailto:{{ $contact->email }}?subject={{ $contact->subject }} Reply">{{ $contact->email }}</a></td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>
                            <textarea name="message" id="" cols="25" rows="5" readonly>{{ $contact->message }}</textarea>
                        </td>
                        <td>
                              <form action="{{ route('contact.delete') }}" method="post" class="mt-1">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $contact['id'] }}">
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