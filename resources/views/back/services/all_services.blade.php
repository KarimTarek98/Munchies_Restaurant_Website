@extends('back.admin_master')

@section('title')
    All Services | Dashboard
@endsection

@section('content')
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Services</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        All Services
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Table</li>
                </ol>
            </nav>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>All Services</h2>

                        </div>
                        <a href="{{ route('add.service') }}" class="btn btn-primary"><span class="mdi mdi-plus"></span> Add Service</a>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Service Name</th>
                                        <th scope="col">Service Icon</th>
                                        <th scope="col">Service Description</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($services as $service)
                                    @php
                                        $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $service->service_name }}</td>
                                        <td>{{ $service->service_icon }}</td>
                                        <td>{{ $service->service_desc }}</td>
                                        <td>
                                            <a href="{{ route('edit.service', $service->id) }}" style="margin-bottom: 10px" title="Edit Service" class="btn btn-info"><span class="mdi mdi-pencil"></span></a>
                                            <a href="{{ route('delete.service', $service->id) }}" title="Delete Service" class="btn btn-danger"><span class="mdi mdi-delete"></span></a>
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
@endsection
