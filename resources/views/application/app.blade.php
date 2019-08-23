<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d79fd5c9a6.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid header pt-5">
        <div class="row">

            <div class="container">
                <div class="col-md-8">
                    <h1>Купете картичка со попуст за вашите вработени.</h1>
                </div>
                <div class="col-md-6">
                    <p>Најдобрите онлајн попусти за производи, услуги, фитнес центри, ресторани, едукација и кариера.</p>
                </div>
                <div>
                    <a href="forms/create" class="btn btn-lg btn-dark btn-dark-buy-now mb-5">Купи сега!</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-dark">
        <div class="container pt-3 pb-2">
            <div class="row">
                <!-- Search Button -->
                <div class="col-md-5 form-group mb-3 col-md-6">
                    <input type="text" name="search" id="search-input" class="form-control search" placeholder="Search Deal Data" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <!-- End Search Button -->

                <!-- Dropdown  -->
                <div class="form-group col-md-3 ">
                    <select name="category" id="option" class="dropdown" require>
                        <option value="">Сите</option>
                        @foreach($categories as $category)
                        <option class="dropdown-option" value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>

                </div>
                <!-- End Dropdown -->

                <!-- Changing style on card -->
                <div class="col-md-3">
                    <div class="row pt-2">
                        <!-- GRID -->
                        <div class="col-md-3 offset-2">
                            <i class="fas fa-th change-buttons" id="grid"></i>
                        </div>

                        <!-- Table -->
                        <div class="col-md-6">
                            <i class="fas fa-list change-buttons" id="table"></i>
                        </div>

                    </div>
                </div>
                <!-- End Changing style on card -->
            </div>

        </div>
    </div>

    <div id="app">
        @if (\Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{!! \Session::get('success') !!} You can chose another product</p>
        </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="container-fluid pt-5 text-white">
                    <div class="col-md-8">
                        <h1>Дали сте заинтересирани вашата компанија да понуди попуст?</h1>
                    </div>
                    <div class="col-md-6">
                        <p>Најдобрите онлајн попусти за производи, услуги, фитнес центри, ресторани, едукација и кариера.</p>
                    </div>
                    <div>
                        <a href="forms/create" class="btn btn-lg btn-warning btn-dark-buy-now mb-5">Креирај попуст!</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('js/home.js')}}" type="text/javascript"></script>
<script src="{{asset('js/changing.js')}}" type="text/javascript"></script>
<script src="{{asset('js/searching.js')}}" type="text/javascript"></script>

</html>