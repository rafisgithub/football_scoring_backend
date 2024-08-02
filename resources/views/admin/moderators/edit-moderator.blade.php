@extends('admin.master')

@section('title')
    Add moderator
@endsection

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update-moderator', ['id' => $moderator->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="FirstName">First name</label>
                    <input type="text" class="form-control" id="FirstName" placeholder="Enter your first name" name="first_name" value="{{ $moderator->first_name }} ">
                  </div>

                  <div class="form-group">
                    <label for="LastName">Last name</label>
                    <input type="text" class="form-control" id="LastName" placeholder="Enter your first name" name="last_name" value="{{ $moderator->last_name }}" >
                  </div>
                  
                  <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                      <option value="">Select role</option>
                      <option value="moderator" {{ $moderator->role == 'moderator' ? 'selected' : '' }}>Moderator</option>
                      <option value="moderator">Moderator</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ $moderator->email }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{ $moderator->password }}">
                  </div>

                  <div class="form-group">
                    <label for="passwordConfirmation">Password</label>
                    <input type="password" class="form-control" id="passwordConfirmation" placeholder="Password confirmation" name="password_confirmation">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>

                @if(isset($moderator->image))
                    <div class="form-group">
                        <label for="currentImage">Current Image</label>
                        <div>
                        <img src="{{ asset('storage/' . $moderator->image) }}" alt="profile" class="img-table" />
                        </div>
                    </div>
                @endif


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection