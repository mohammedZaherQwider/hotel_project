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

            <form action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Hotel Name :</label>
                    <input type="text" class="form-control" name="name" placeholder="Hotel Name">
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
                <div class="mb-3">
                    <label>City Name :</label><br>
                    @foreach ($cities as $city)
                        <input type="radio" name="city" value="{{ $city->id }}">
                        {{ $city->name }}<br>
                    @endforeach
                    @error('city')
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
