<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PS Hotel</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <style>
        .uu {
            width: 220px;
            height: 170px;
            margin-left: 170px;
            border-radius: 10px
        }
        .but{
            margin-top:15px ;
            margin-left: 15%;
            border-radius: 8px;
            border-color: black;
            background-color: rgb(140, 212, 251);
            color: black;
            width: 100px;
            height: 40px;

        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="{{ route('admin.page') }}">PS Hotel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.page') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Lorem ipsum dolor sit amet consectetur,
                                adipisicing elit.
                                amet consectetur adipisicing
                            </h1>
                            <p class="lead fw-normal text-white-50 mb-4">Lorem ipsum dolor sit, amet consectetur
                                adipisicing elit. Minus consectetur quo assumenda fuga vel, excepturi labore fugit.
                                Illum abexcepturi labore fugit.
                               Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum in corporis exercitationem quis quidem fugit maxime voluptatum reiciendis, ut nesciunt qui aut tempore, dicta natus eos. Consequatur aut repudiandae recusandae.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('login') }}">Login</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="{{ route('register') }}">Register</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img style="height: 380px;"
                            class="img-fluid rounded-3 my-5"
                            src="https://th.bing.com/th/id/R.ce43f7e8e0571c21e762b8924aad874d?rik=0ATDeAN%2bQ7cyxQ&riu=http%3a%2f%2ftravelji.com%2fwp-content%2fuploads%2fHotel-Tips.jpg&ehk=LzuGeOKqbj3J7q%2f%2fldexRjd2c0yRmq%2b%2fypHlVvmA3dM%3d&risl=&pid=ImgRaw&r=0"
                            alt="..." /></div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0">More images hotel.</h2>
                    </div>
                    <div class="col-lg-8 mt-4">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100 mt-2">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><img
                                        class="bi bi-collection uu"
                                        src="https://th.bing.com/th/id/OIP.H7qwNGZKpE9awBmmBGKn-AHaEs?pid=ImgDet&rs=1" />
                                </div>
                                <h2 class="h5">Featured title</h2>
                                <p class="mb-0">Paragraph of text  beneath<br>
                                    the heading to explain the heading.</p>
                                    <form action="{{ route('book') }}">
                                          <button class="but"> Book now </button>
                                    </form>

                            </div>
                            <div class="col mb-5 h-100 mt-2">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><img
                                        class="bi bi-collection uu"
                                        src="https://th.bing.com/th/id/OIP.sjSOEIBt6PdgxG9abY7bvwHaE8?pid=ImgDet&rs=1" />
                                </div>
                                <h2 class="h5">Featured title</h2>
                                <p class="mb-0">Paragraph of text  beneath<br>
                                    the heading to explain the heading.</p>
                                    <form action="{{ route('book') }}">
                                        <button class="but"> Book now </button>
                                  </form>
                            </div>
                            <div class="col mb-5 mb-md-0 h-100" style="margin-top: 40px">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><img
                                        class="bi bi-collection uu"
                                        src="https://th.bing.com/th/id/OIP.AzcMlzHP3DBC6SPyTX3OOAHaEK?w=290&h=180&c=7&r=0&o=5&pid=1.7" />
                                </div>
                                <h2 class="h5">Featured title</h2>
                                <p class="mb-0">Paragraph of text  beneath<br>
                                    the heading to explain the heading.</p>
                                    <form action="{{ route('book') }}">
                                        <button class="but"> Book now </button>
                                  </form>
                            </div>
                            <div class="col h-100" style="margin-top: 40px">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><img
                                        class="bi bi-collection uu"
                                        src="https://th.bing.com/th/id/OIP.4sixZrj0oAD7JIjNksY5kQHaE6?pid=ImgDet&rs=1" />
                                </div>
                                <h2 class="h5">Featured title</h2>
                                <p class="mb-0">Paragraph of text  beneath<br>
                                    the heading to explain the heading.</p>
                                    <form action="{{ route('book') }}">
                                        <button class="but"> Book now </button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog preview section-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">Rooms . </h2>
                            <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    {{-- @foreach ($rooms as $room)
                        @foreach ($room->images as $img)
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="{{ asset("storage/$img->image") }}" alt="..."
                                        style="height: 450px;" />
                                    <div class="card-body p-4">
                                        <a class="text-decoration-none link-dark stretched-link" href="#!">
                                            <h5 class="card-title mb-3">{{ $img->name }}</h5>
                                        </a>
                                        <p class="card-text mb-0">Some quick example text to build on the card title
                                            and
                                            make up the bulk of the card's content.</p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endforeach --}}
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="https://th.bing.com/th/id/OIP.lCI6O_uWZXMtnHydLbhVawHaFB?pid=ImgDet&rs=1" alt="..."
                                style="height: 450px;" />
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                </a>
                                <p class="card-text mb-0">Some quick example text to build on the card title
                                    and
                                    make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            </div>
                        </div>
                    </div><div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="https://th.bing.com/th/id/R.d7ae418178330e777320e4031c60b91f?rik=7TdmhxrVhbrPOg&riu=http%3a%2f%2fwww.yourlittleblackbook.me%2fwp-content%2fuploads%2f2013%2f08%2fBQE-VOH9qR0askTsgCnuiYUSjYfvqu7Ym3NetqENTOY-copie-640x450.jpg&ehk=6TJO6OoHNoO%2bFFLUVqVtb2z7P6lDYrcYCm8R9y69tFc%3d&risl=&pid=ImgRaw&r=0" alt="..."
                                style="height: 450px;" />
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                </a>
                                <p class="card-text mb-0">Some quick example text to build on the card title
                                    and
                                    make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="https://th.bing.com/th/id/OIP.Rl8hh60sDOLoUPCfkP0uHAHaE7?pid=ImgDet&rs=1" alt="..."
                                style="height: 450px;" />
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                </a>
                                <p class="card-text mb-0">Some quick example text to build on the card title
                                    and
                                    make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Call to action-->
                <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                    <div
                        class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        <div class="mb-4 mb-xl-0">
                            <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                            <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                        </div>
                        <div class="ms-xl-4">
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" placeholder="Email address..."
                                    aria-label="Email address..." aria-describedby="button-newsletter" />
                                <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign
                                    up</button>
                            </div>
                            <div class="small text-white-50">We care about privacy, and will never share your data.
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2023</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>

</html>
