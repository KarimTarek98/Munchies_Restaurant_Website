@extends('back.admin_master')

@section('title')
    Edit Service | Dashboard
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Service</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('update.service') }}" method="POST">
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

                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        {{-- Service Name --}}
                        <div class="form-group">
                            <label for="service_name">Service Name</label>
                            <input name="service_name" type="text" class="form-control" id="service_name"
                            value="{{ $service->service_name }}">

                        </div>

                        {{-- Service Icon --}}
                        <div class="form-group">
                            <label for="service_icon">Service Icon</label>
                            <input name="service_icon" type="text" class="form-control" id="service_icon"
                            value="{{ $service->service_icon }}">

                        </div>

                        {{-- Service Description --}}
                        <div class="form-group">
                            <label for="service_desc">Service Description</label>
                            <textarea class="form-control"  name="service_desc" id="service_desc" rows="3">
                                {{ $service->service_desc }}
                            </textarea>
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Update Service</button>
                        </div>
                    </form>
                </div>

            </div>



        </div>
    </div>
</div>
@endsection
