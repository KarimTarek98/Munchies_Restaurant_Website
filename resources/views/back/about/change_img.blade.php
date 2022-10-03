@extends('back.admin_master')

@section('title')
    Change About Image
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Change About Image</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('update.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="img_id" value="{{ $image->id }}">

                        <div class="form-group">
                            <label for="profile_pic">Choose Another Image</label>
                            <input type="file" name="img_path" class="form-control-file" id="about_img">
                        </div>

                        <div class="form-group">
                            <label for="profile_pic"></label>
                            <img src="{{ asset($image->img_path) }}" alt="new_profile_pic" width="80" height="80" id="show_pic">
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Update Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(function () {
            $('#about_img').change(function (e) {
                var readImg = new FileReader();
                readImg.onload = function (e) {
                    $('#show_pic').attr('src', e.target.result);
                }
                readImg.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection

