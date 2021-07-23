<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BebekAVE</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>
<div id="app">

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('assets/logo/logo.png') }}" width="200px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="{{ url('/') }}">Home <span
                    class="sr-only">(current)</span></a>
                    <a class="nav-link" href="{{ url('profil') }}">Profil</a>
                    <a class="nav-link" href="{{ url('kontak') }}">Kontak</a>
                    <a class="nav-link" href="{{ url('gallery') }}">Gallery</a>

                    @role('member')
                    <a class="nav-link" href="{{ url('home') }}">Belanja</a>
                    @endrole
                </div>
            </div>
        </div>
    </nav>


    <div class="container">
        @yield('content')


        <!-- Footer Sementara  -->
        <!-- Nanti dibuat Tabelnya : diadakan pengaturan langsung oleh admin -->
        <div class="row">
            <div class="col-md-12">
                <div class="footer-home">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="kontak text-center">
                                <h3>Kontak Kami</h3>
                                No Hp / WA : 082218228291
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="gallery text-center">
                                <h3>Gallery</h3>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
</body>

</html>
