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

                <form action="{{ route('admin.reservations.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Check in</label>
                        <input type="date" class="form-control" name="check_in" placeholder="reservations">
                        @error('name')
                            <div class="form-error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Price :</label>
                        <input type="number" class="form-control" name="price" placeholder="Price">
                        @error('Price')
                            <div class="form-error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>User id :</label>
                        <input type="number" class="form-control" name="user_id" placeholder="User id">
                        @error('user_id')
                            <div class="form-error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Room Name :</label><br>
                        @foreach ($rooms as $room)
                            <input type="radio" name="room" value="{{ $room->id }}">
                            {{ $room->name }}<br>
                        @endforeach
                        @error('room')
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
