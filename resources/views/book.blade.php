<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PS Hotel</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('indexAssets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('indexAssets/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .h {
            height: 250px;
        }
    </style>
</head>

<body>

    <!-- Header-->
    <header class="bg-dark py-5"
        style="background-image: url(https://th.bing.com/th/id/OIP.sjSOEIBt6PdgxG9abY7bvwHaE8?pid=ImgDet&rs=1);
            height: 300px;

        ">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">PS Hotel </h1>
                <p class="lead fw-normal text-white-50 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Alias, delectus.</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <h2 style="margin-left: 45%"> ROOMS . </h2>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                
                @foreach ($rooms as $room)
                    @foreach ($room->images as $img)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top h" src="{{ asset("storage/$img->image") }}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">Lorem, ipsum dolor.</h5>
                                        <!-- Product price-->
                                        ${{ $room->roomType->price }}.00
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a onclick="updatePost(event)" class="btn btn-outline-dark mt-auto"
                                            data-toggle="modal" data-id="{{ $room->id }}"
                                            href="{{ route('book_data') }}" data-target="#exampleModalCenter"
                                            href="">View options</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal -->
    <!-- Modal -->
    @include('selectable')
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Book now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('book_data') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">ID :</label>
                            <input type="text" class="form-control" name="user_id" placeholder="ID">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Price pay :</label>
                            <input type="text" class="form-control" name="price" placeholder="Price pay">
                        </div>
                        <input type="hidden" value="" name="room_id" id="room_id">
                        <input type="hidden" value="" name="check_in" id="check_in">
                        <button type="submit" class="btn btn-primary">GO</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('indexAssets/js/scripts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        function updatePost(e) {
            let id = e.target.closest('a').dataset.id
            document.querySelector('#room_id').value = id;
        }
    </script>
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

        @if (session('mas') == 'Added .')
            Toast.fire({
                icon: 'success',
                title: 'Add success'
            })
        @endif
    </script>
</body>

</html>
