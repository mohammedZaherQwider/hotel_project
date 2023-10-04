@extends('admin.master')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            margin-top: 20px;
            border: 1px solid #00b300;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #22e5c8;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .action-column {
            width: 100px;
        }

        .action-btn {
            display: inline-block;
            margin-right: 5px;
            padding: 5px;
            border: none;
            background-color: #f2f2f2;
            color: #333;
            cursor: pointer;
            font-size: 14px;
            border-radius: 7px;
            width: 50px;
        }

        .edit-btn {
            background-color: #008275;
        }

        .delete-btn {
            background-color: #ee192f;
        }

        .fas {
            color: #ffffff
        }

        .custom-button {
            background-color: #71fc75;
            color: rgb(21, 20, 20);
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;

        }


        .custom-button:hover {
            background-color: #28d431;
        }
    </style>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Hotel Id</th>
                <th>Hotel name</th>
                <th>City name</th>
                <th>Descripitoin </th>
                <th class="action-column">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
                <tr id="row_{{ $hotel->id }}">
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->city->name }}</td>
                    <td>{{ $hotel->descripitoin }}</td>
                    <td class="action-column">
                        <a onclick="updatePost(event)" data-toggle="modal" data-target="#EidtPost20"
                            data-name="{{ $hotel->name }}" data-city="{{ $hotel->city->id }}"
                            data-descripitoin="{{ $hotel->descripitoin }}"
                            href="{{ route('admin.hotels.update', $hotel->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="d-inline" action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="button" onclick="kofta(event)" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                        {{-- <a href="{{ route(''), $hotel->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i>
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <button class="btn btn- btn-sm"><i
        class="fas fa-trash"></i></button> --}}
    <a class="custom-button" href="{{ route('admin.hotels.pdf' ,'v') }}">pdf</a>
    <!-- Modal -->
    <div class="modal fade" id="EidtPost20" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eidt Hotel.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        @method('put')
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Hotel Name :</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <p class="help-block"></p>
                                @error('name')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="controls">
                                <label>Descripitoin:</label>
                                <input type="text" class="form-control" id="descripitoin" name="descripitoin">
                                <p class="help-block"></p>
                                @error('descripitoin')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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
                        </div>
                        <button type="button" onclick="editPost(event)" class="btn btn-info"> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('adminassets/js/axios.min.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if (session('mas') == 'Post added .')
            Toast.fire({
                icon: '{{ session('icon') }}',
                title: '{{ session('mas') }}'
            })
        @endif
        @if (session('mas') == 'Post deleted .')
            Toast.fire({
                icon: '{{ session('icon') }}',
                title: '{{ session('mas') }}'
            })
        @endif
    </script>
    <script>
        function kofta(e) {
            let url = e.target.closest('form').action;
            let row = e.target.closest('tr');
            console.log(url, row);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to undo this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("dkvndknv");
                    axios.post(url, {
                            _method: 'delete'
                        })
                        .then(res => {
                            row.remove()
                        })
                }
            });
        }
    </script>
    <script>
        function updatePost(e) {
            // get all data from tr
            let name = e.target.closest('a').dataset.name;
            let descripitoin = e.target.closest('a').dataset.descripitoin;
            let city = e.target.closest('a').dataset.city;
            let url = e.target.closest('a').href;
            // show old data in edit form

            document.querySelector('[name=name]').value = name;
            document.querySelector('[name=descripitoin]').value = descripitoin;
            document.querySelector('[name=city]').value = city;

            document.querySelector('.modal form').action = url;
        }

        function editPost(e) {
            e.preventDefault();
            let url = e.target.closest('form').action;
            let data = new FormData(e.target.closest('form'));
            console.log(url, data);
            axios.post(url, data)
                .then(res => {
                    console.log('#row_' + res.data.id + ' td:nth-child(2)');
                    $('#row_' + res.data.id + ' td:nth-child(2)').html(res.data.name)
                    $('#row_' + res.data.id + ' td:nth-child(3)').html(res.data.city)
                    $('#row_' + res.data.id + ' td:nth-child(4)').html(res.data.descripitoin)
                    $('#EidtPost20').css('display', 'none hide');

                });
        }
    </script>
@endsection
