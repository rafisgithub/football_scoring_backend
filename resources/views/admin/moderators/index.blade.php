@extends('admin.master')

@section('title')
Team Moderators
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="head-link-set">
                    <a class="btn-addmember" data-toggle="modal" data-target="#addteam">Add Moderator</a>
                    <span class="alert-info" style="font-size:25;">{{ session('success')}}</span>
                </div>
            </div>

            <div class="customize_popup">
                <div class="modal fade" id="addteam" tabindex="-1" aria-labelledby="staticBackdropLabela" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabela">Add New Moderator</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form id="moderatorForm" method="POST" action="{{ route('add-moderator') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="moderator_id">
                                <div class="modal-body">
                                    <label for="">First Name</label>
                                    <input class="form-control" id="first_name" type="text" placeholder="First Name" name="first_name">

                                    <label for="">Last Name</label>
                                    <input class="form-control" id="last_name" type="text" placeholder="Last Name" name="last_name">

                                    <label for="">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Select Role</option>
                                        <option value="moderator">Moderator</option>
                                        <option value="referee">Referee</option>
                                        <option value="coach">Coach</option>
                                        <option value="scorer">Scorer</option>
                                    </select>

                                    <label for="">Email</label>
                                    <input class="form-control" id="email" type="email" placeholder="Email" name="email">

                                    <label for="">Password</label>
                                    <input class="form-control" id="password" type="password" placeholder="Password" name="password">

                                    <label for="">Confirm Password</label>
                                    <input class="form-control" id="password_confirmation" type="password" placeholder="Confirm Password" name="password_confirmation">

                                    <label for="">Profile picture</label>
                                    <input class="form-control" type="file" name="file">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                <div class="card">
                    <div class="table-heading">
                        <h2>Moderator List</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table custom-table no-footer">
                            <thead>
                                <tr class="text-center">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($moderators as $moderator)
                                <tr class="text-center">
                                    <td>
                                        <div class="table-img">
                                            <a href="profile.html">
                                                <img src="{{ asset('storage/' . $moderator->image) }}" alt="profile" class="img-table" />
                                                <label class="action_label">{{ $moderator->first_name ." " . $moderator->last_name }}</label>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <label class="action_label">{{ $moderator->email }}</label>
                                    </td>
                                    <td>
                                        <label class="action_label">
                                            <a href="#" class="edit-moderator" data-toggle="modal" data-target="#addteam" data-moderator="{{ json_encode($moderator) }}">Edit</a>
                                        </label>
                                        <label class="action_label2">
                                            <a href="">Delete</a>
                                        </label>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.edit-moderator').on('click', function(){
            var moderator = $(this).data('moderator');
            console.log(moderator); 
            $('#moderator_id').val(moderator.id);
            $('#first_name').val(moderator.first_name);
            $('#last_name').val(moderator.last_name);
            $('#role').val(moderator.role);
            $('#email').val(moderator.email);
            $('#password').val(''); 
            $('#password_confirmation').val(''); 

            // Update the form action
            $('#moderatorForm').attr('action', '{{ route('update-moderator') }}');
            // Update modal title
            $('#staticBackdropLabela').text('Edit Moderator');
        });

        // Reset the modal form when it's closed
        $('#addteam').on('hidden.bs.modal', function () {
            $('#moderatorForm').trigger("reset");
            $('#moderatorForm').attr('action', '{{ route('add-moderator') }}');
            $('#staticBackdropLabela').text('Add New Moderator');
        });
    });
</script>

@endsection
