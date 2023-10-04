@extends('admin.master')
@section('content')
    <body>
        <!-- Page Content -->
        <div class="container">
            <h1 class="mt-4 mb-3">{{ $room->name }}
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.hotels.index') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Room deatiles</li>
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
                    <p>Posted on {{ $room->created_at }}</p>
                    <hr>
                    <!-- Post Content -->
                    <p class="lead">Descripitoin :{{ $room->descripitoin  }}</p>
                    <p class="lead"> id of room type :{{ $room->room_type_id  }}</p>
                    <p class="lead">Hotel id {{ $room->hotel_id  }}</p>
                    <hr>
                </div>
                <!-- Sidebar Widgets Column -->

            </div>
            <!-- /.row -->
        </div>
    </body>
@endsection
