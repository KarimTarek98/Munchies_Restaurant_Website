@extends('back.admin_master')

@section('title')
About Images | Dashboard
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
                        All Images
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
                        {{-- <a href="{{ route('add.images') }}" class="btn btn-primary"><span class="mdi mdi-plus"></span> Add Multiple Image</a> --}}
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image Full Path</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($images as $image)
                                    @php
                                        $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $image->img_path }}</td>
                                        <td>
                                            <img src="{{ asset($image->img_path) }}" width="50" height="50" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ route('change.image', $image->id) }}"  title="Edit Service" class="btn btn-info"><span class="mdi mdi-pencil"></span></a>
                                            <a href="{{ route('delete.image', $image->id) }}" title="Delete Service" class="btn btn-danger"><span class="mdi mdi-delete"></span></a>
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
