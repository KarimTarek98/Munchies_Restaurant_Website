@extends('back.admin_master')

@section('title')
    Add Service | Dashboard
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add Service</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('store.service') }}" method="POST">
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


                        {{-- Service Name --}}
                        <div class="form-group">
                            <label for="service_name">Service Name</label>
                            <input name="service_name" type="text" class="form-control" id="service_name"
                            placeholder="Write Service Name">

                        </div>

                        {{-- Service Icon --}}
                        <div class="form-group">
                            <label for="service_icon">Service Icon</label>
                            <input name="service_icon" type="text" class="form-control" id="service_icon"
                            placeholder="Write Service Icon class font-awesome">

                        </div>

                        {{-- Service Description --}}
                        <div class="form-group">
                            <label for="service_desc">Service Description</label>
                            <textarea placeholder="Write Service Description"
                            class="form-control" name="service_desc" id="service_desc" rows="3"></textarea>
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Store Service</button>
                        </div>
                    </form>
                </div>

            </div>



        </div>
    </div>
</div>
@endsection
