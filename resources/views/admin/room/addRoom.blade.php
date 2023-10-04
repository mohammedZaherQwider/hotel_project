@extends('admin.master')

@section('content')
    <div class="col-12">
        <h1 style="margin-left: 35%">{{ __('site.newC') }}</h1>
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Room Name :</label>
                        <input type="text" class="form-control" name="name" placeholder="Room Name">
                        @error('name')
                            <div class="form-error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Descripitoin :</label>
                        <input type="text" class="form-control" name="descripitoin" placeholder="Descripitoin">
                        @error('descripitoin')
                            <div class="form-error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="mb-3 dropzone" id="dropimage">
                    </div>
                    <input type="hidden" value="" id="img" name="img">
                    <div class="mb-3">


                        <label>Hotel Name :</label><br>
                        @foreach ($hotels as $hotel)
                            <input type="radio" name="hotel" value="{{ $hotel->id }}">
                            {{ $hotel->name }}<br>
                        @endforeach
                        @error('hotel')
                            <div class="form-error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Room type :</label><br>
                        @foreach ($room_type as $type)
                            <input type="radio" name="type" value="{{ $type->id }}">
                            {{ $type->id }}<br>
                        @endforeach
                        @error('hotel')
                            <div class="form-error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <hr>

                    <button class="btn btn-success px-5"><i class="fas fa-save"></i> Add</button>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('js')
@include('admin.dropzoneImages')
@endsection
