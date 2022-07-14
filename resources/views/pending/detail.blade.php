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
            color: whitesmoke;
        }

        a {
            color: whitesmoke;
        }

        a:hover {
            color: rgb(177, 177, 177);
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
            border-radius: 12px;
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
    <div class="container mb-5">
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
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent px-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Content --}}
        <div class="card border-0">
            <div class="card-body card-night">
                <div class="row">
                    <div class="col-lg-7"><img
                            src="https://images.unsplash.com/photo-1498598457418-36ef20772bb9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            alt class="w-100" style="min-height: 300px; object-fit: cover;"></div>
                    <div class="col-lg-5">
                        <h2>Bantu Masyarakat di NTT</h2>
                        <div class="row justify-content-between">
                            <div class="col-auto">Kota NTT</div>
                            <div class="col-auto">User</div>
                        </div>
                        <hr style="border: white 1px solid; margin-top: 0;">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <span>Terkumpul</span><br>
                                <span>Rp 500.000</span>
                            </div>
                            <div class="col-auto">
                                <span>Dana Dibutuhkan</span><br>
                                <span>Rp 1.000.000</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="progress mb-2" style="height: 7px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark"
                                        role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-auto">Open Goal</div>
                            <div class="col-auto">7 Hari Lagi</div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-night btn-block">Ikut Berdonasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="row">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab"
                            aria-controls="nav-detail" aria-selected="true">Detail</a>
                        <a class="nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update" role="tab"
                            aria-controls="nav-update" aria-selected="false">Update</a>
                        <a class="nav-link" id="nav-donatur-tab" data-toggle="tab" href="#nav-donatur" role="tab"
                            aria-controls="nav-donatur" aria-selected="false">Donatur</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-detail" role="tabpanel"
                        aria-labelledby="nav-detail-tab">
                        <p class="py-3">Detail Lorem ipsum dolor sit amet consectetur adipisicing elit. Est minus magni
                            aperiam atque id tenetur distinctio nam necessitatibus voluptatum, exercitationem in quo ad
                            corrupti reprehenderit eligendi, esse saepe. Et, assumenda!</p>
                    </div>
                    <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                        <p class="py-3">Update Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta commodi
                            molestiae repellendus, harum aut deserunt a culpa nostrum omnis, libero corrupti aperiam
                            nobis nesciunt officiis, facere et eligendi pariatur repellat!</p>
                    </div>
                    <div class="tab-pane fade" id="nav-donatur" role="tabpanel" aria-labelledby="nav-donatur-tab">
                        <p class="py-3">Donatur Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur neque
                            soluta quisquam recusandae suscipit rem dolore quo laboriosam voluptas in omnis minima,
                            quae, inventore quam dolores! Rem quo totam culpa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="pt-5 pb-2">
        <p class="text-center text-light mb-0">&copy; 2021 | Reserved by Kholifatul Ardliyan</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
