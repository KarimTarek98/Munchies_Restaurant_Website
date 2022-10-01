@extends('back.admin_master')

@section('title')
    Change Password
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Profile</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('update.pass') }}" method="POST">
                        @csrf

                        @if (count($errors))
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-dismissible fade show alert-danger" role="alert">
                                {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endforeach
                        @endif

                        <input type="hidden" name="user_id" value="{{ $userID }}">

                        {{-- Old Password --}}
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password">

                        </div>

                        {{-- New Password --}}
                        <div class="form-group">
                            <label for="new_pass">New Password</label>
                            <input name="new_pass" type="password" class="form-control" id="new_pass">

                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-group">
                            <label for="confirm_pass">Confirm Password</label>
                            <input name="confirm_pass" type="password" class="form-control" id="confirm_pass">

                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

