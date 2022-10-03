@extends('back.admin_master')

@section('title')
    Add Multiple Images
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>About Multiple Images</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.images') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="profile_pic">Choose Multiple Image</label>
                            <input type="file" name="img_path[]" multiple class="form-control-file" id="profile_pic">
                        </div>

                        <div class="form-group">
                            <label for="profile_pic"></label>
                            <img src="" alt="new_profile_pic" width="80" height="100" id="show_pic">
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Store Images</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
