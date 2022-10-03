@extends('back.admin_master')

@section('title')
About | Dashboard
@endsection

@section('content')
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>About</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Descriptions
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
                            <h2>About</h2>

                        </div>
                        {{-- <a href="{{ route('add.images') }}" class="btn btn-primary"><span class="mdi mdi-plus"></span> Add Multiple Image</a> --}}
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Short Overview</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>
                                        <td>{{ $about->short_desc }}</td>
                                        <td>{{ $about->long_desc }}</td>
                                        <td>
                                            <a href="{{ route('edit.about_info', $about->id) }}"  title="Edit Service" class="btn btn-info"><span class="mdi mdi-pencil"></span></a>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
