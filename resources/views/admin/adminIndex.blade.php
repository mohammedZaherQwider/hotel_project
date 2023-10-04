@extends('admin.master')

@section('content')
    {{-- <style>
        .image-dropzone-container {
            display: flex;
            align-items: center;
        }

        #dropimage {
            width: 50%;
            border: 2px dashed #ccc;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }

        .image-preview {
            width: 50%;
        }

        .img-profile {
            max-width: 20%;
            max-height: 20%;
            display: block;
            margin: 0 auto;
        }
    </style> --}}

    @php
        $r = Auth::guard('admin')->user()->image->image;
    @endphp
    <h1>Ad min Index page</h1>
    <div class="col-12">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    {{-- <span class="kt-portlet__head-icon">
                    <i class="fas fa-user"></i>
                </span> --}}
                    <h3 class="kt-portlet__head-title">
                        Your Profile
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <form action="{{ route('admin.profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ Auth::guard('admin')->user()->name }}"
                            class="form-control" style="width: 50%" />
                    </div>
                    <div class="">
                        <div class="mb-3 dropzone" id="dropimage" style="width: 50%;">
                        </div>

                    </div>

                    {{-- <div class="image-dropzone-container">
                        <div class="dropzone" id="dropimage"></div>
                        <div class="image-preview">
                            <img class="img-profile" src="{{ asset("storage/$r") }}" alt="Preview Image">
                        </div>
                    </div> --}}
                    <input type="hidden" value="" id="img" name="img">
                    <button class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                </form>
                        <div class="admin_img_wrapper" style="margin: 20px;" >
                            <img class="img-profile" src="{{ asset("storage/$r") }}" height="200px" width="200px">
                        </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    @include('admin.dropzone')
@endsection
