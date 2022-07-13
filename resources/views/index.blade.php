<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .bg-animation {
            background: linear-gradient(180deg, #2c2c2c, #424242, #787878);
            background-size: 600% 600%;

            -webkit-animation: gradient 6s ease infinite;
            -moz-animation: gradient 6s ease infinite;
            animation: gradient 6s ease infinite;
        }

        .card {
            border-radius: 14px;
        }

        .card-night {
            color: white;
            background: linear-gradient(180deg, #2c2c2c, #424242);
        }

        .btn-night {
            border-radius: 20px;
            background-color: #5d5d5d;
            color: white;
        }

        .btn-night:hover {
            background-color: #4d4d4d;
            color: white;
        }

        .img-card {
            border-radius: 12px 12px 0 0;
            height: 150px;
            width: 100%;
            object-fit: cover;
            object-position: center center;
        }

        @-webkit-keyframes gradient {
            0% {
                background-position: 51% 0%
            }

            50% {
                background-position: 50% 100%
            }

            100% {
                background-position: 51% 0%
            }
        }

        @-moz-keyframes gradient {
            0% {
                background-position: 51% 0%
            }

            50% {
                background-position: 50% 100%
            }

            100% {
                background-position: 51% 0%
            }
        }

        @keyframes gradient {
            0% {
                background-position: 51% 0%
            }

            50% {
                background-position: 50% 100%
            }

            100% {
                background-position: 51% 0%
            }
        }

    </style>
    <title>Landing Page Bootstrap</title>
</head>

<body class="bg-animation">
    <div class="container vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center text-white">
                <h1 class="display-3 text-focus-in">#Beramal</h1>
                <p class="lead text-focus-in">Mari berbagi kebahagiaan hanya dalam beberapa sentuhan</p>
            </div>
        </div>
    </div>

    <main class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-4">
                    <div class="card border-0">
                        <img src="https://images.unsplash.com/photo-1591522810850-58128c5fb089?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            class="img-card card-img-top" alt>
                        <div class="card-body card-night">
                            <h5 class="card-title">Bantu Masyarakat di NTT</h5>
                            <div class="progress mb-2" style="height: 7px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 75%"></div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <div><span class="text-muted">Terkumpul</span><br>Rp 1.0000.000</div>
                                </div>
                                <div class="col-auto">
                                    <div><span class="text-muted">Tersisa</span><br>20 hari lagi</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: #5d5d5d; border-radius: 0 0 12px 12px;">
                            <a href="#" class="btn btn-night btn-block">Ikut Berdonasi</a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="card border-0">
                        <img src="https://images.unsplash.com/photo-1591522810850-58128c5fb089?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            class="img-card card-img-top" alt>
                        <div class="card-body card-night">
                            <h5 class="card-title">Bantu Masyarakat di NTT</h5>
                            <div class="progress mb-2" style="height: 7px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 75%"></div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <div><span class="text-muted">Terkumpul</span><br>Rp 1.0000.000</div>
                                </div>
                                <div class="col-auto">
                                    <div><span class="text-muted">Tersisa</span><br>20 hari lagi</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: #5d5d5d; border-radius: 0 0 12px 12px;">
                            <a href="#" class="btn btn-night btn-block">Ikut Berdonasi</a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="card border-0">
                        <img src="https://images.unsplash.com/photo-1591522810850-58128c5fb089?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            class="img-card card-img-top" alt>
                        <div class="card-body card-night">
                            <h5 class="card-title">Bantu Masyarakat di NTT</h5>
                            <div class="progress mb-2" style="height: 7px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 75%"></div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <div><span class="text-muted">Terkumpul</span><br>Rp 1.0000.000</div>
                                </div>
                                <div class="col-auto">
                                    <div><span class="text-muted">Tersisa</span><br>20 hari lagi</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: #5d5d5d; border-radius: 0 0 12px 12px;">
                            <a href="#" class="btn btn-night btn-block">Ikut Berdonasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="pt-5 pb-2">
        <p class="text-center text-light mb-0">&copy; 2021 | Reserved by Kholifatul Ardliyan</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script>
        // Tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        // Smooth Scoll Click
        $('a[href^="#"]').click(function () {

            var the_id = $(this).attr("href");

            $('html, body').animate({
                scrollTop: $(the_id).offset().top
            }, 'slow');

            return false;
        });

    </script>
</body>

</html>
