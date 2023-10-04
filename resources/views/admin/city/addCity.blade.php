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

                <form action="{{ route('admin.cities.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>City Name</label>
                        <input type="text" class="form-control" name="name" placeholder="City">
                        @error('name')
                            <div class="form-error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Country Name :</label><br>
                        @foreach ($countries as $country)
                            <input type="radio" name="country" value="{{ $country->id }}"> {{ $country->name }}<br>
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
