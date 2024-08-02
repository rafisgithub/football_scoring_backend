@extends('admin.master')

@section('content')
<div class="container-fluid">
     <div class="row">
      <span class="ext-center alert">{{ session('success') }}</span>
       <div class="col-12">
         <div class="card">
          <a href="{{ route('add-moderator') }} " class="btn btn-info">add-moderator</a>
           <!-- /.card-header -->
           <div class="card-body">
           <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Profile Pic</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($moderators as $moderator)
                  <tr>
                      <td>{{ $moderator->first_name }} {{ $moderator->last_name }}</td>
                      <td>
                      <img src="{{ asset('storage/' . $moderator->image) }}" alt="profile" class="img-table" />

                      </td>
                      <td>{{ $moderator->email }}</td>
                      <td>{{ $moderator->role }}</td>
                      <td>
                          <a href="{{ route('edit-moderator', $moderator->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ route('delete-moderator', $moderator->id) }}" class="btn btn-danger">Delete</a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th>Name</th>
                      <th>Profile Pic</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                  </tr>
              </tfoot>
          </table>

           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </div>
@endsection