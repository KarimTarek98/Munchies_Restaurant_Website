@extends('back.admin_master')

@section('title')
    Edit About | Dashboard
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit About</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('update.about') }}" method="POST">
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

                        <input type="hidden" name="about_id" value="{{ $about->id }}">

                        {{-- Service Description --}}
                        <div class="form-group">
                            <label for="short_desc">Short Overview</label>
                            <textarea placeholder="Write Service Description"
                            class="form-control" name="short_desc" id="short_desc" rows="3">
                            {{ $about->short_desc }}
                        </textarea>
                        </div>

                        {{-- Service Description --}}
                        <div class="form-group">
                            <label for="long_desc">Description</label>
                            <textarea placeholder="Write Service Description"
                            class="form-control" name="long_desc" id="long_desc" rows="3">
                            {{ $about->long_desc }}
                        </textarea>
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Update About</button>
                        </div>
                    </form>
                </div>

            </div>



        </div>
    </div>
</div>
@endsection
