@extends('admin.master')
@section('content')
    <body>
        <!-- Page Content -->
        <div class="container">
            <h1 class="mt-4 mb-3">{{ $hotel->name }}
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.hotels.index') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Hotel deatiles</li>
            </ol>
            <div class="row">
                <!-- Post Content Column -->
                <div class="col-lg-8">
                    @php
                        foreach ($images as  $img) {
                            $im= $img->image;
                        }
                    @endphp
                    <!-- Preview Image -->
                    <img class="img-fluid rounded" src="{{ asset($im) }}" alt="">
                    <hr>
                    <!-- Date/Time -->
                    <p>Posted on {{ $hotel->created_at }}</p>
                    <hr>
                    <!-- Post Content -->
                    <p class="lead">{{ $hotel->descripitoin  }}</p>
                    <hr>
                </div>
                <!-- Sidebar Widgets Column -->

            </div>
            <!-- /.row -->
        </div>
    </body>
@endsection
