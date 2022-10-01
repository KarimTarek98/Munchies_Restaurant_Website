@extends('back.admin_master')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit Profile</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                            {{-- Name --}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">

                            </div>

                            {{-- Username --}}
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}">

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Change Profile Picture</label>
                                <input type="file" name="profile_pic" class="form-control-file" id="exampleFormControlFile1">
                            </div>

                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
