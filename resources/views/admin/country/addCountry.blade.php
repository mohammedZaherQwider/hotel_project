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

            <form action="{{ route('admin.countries.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>{{ __('site.country') }}</label>
                    <input type="text" class="form-control" name="country" placeholder="country">
                    @error('country')
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
