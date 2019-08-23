@extends('application.header')

@section('content')

<body class="bg-light">

    <div class="container">
        <div class="row">
            <!-- Logo, title etx -->
            <div class="col-md-12 pb-3">
                <div class="col-md-6 pt-4 pb-4">
                    <!-- Thumbnail -->
                    <img src="{{$deal->company->thumbnail}}" alt="logo" width="60%" height="60%" style="border-radius: 1.25rem;">
                </div>
                <p class="col-md-2 text-center pt-2 pb-2" style="border: dashed 1px; border-radius: 1.25rem; ">{{$deal->category->title}}</p>
                <h1>{{$deal->title}}</h1>
                <h4 class="text-warning ">{{$deal->discount}}% при купување.</h4>
            </div>

            <!-- Images with Description -->
            <div class="row">

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="col-md-12 ">
                        <!-- image -->
                        <div class="col-md-12 ">
                            @foreach($deal->images->take(1) as $image)
                            <img id='{{$image->id}}' width="100%" height="100%;" style="border-radius: 1.25rem" src="{{$image->imagePath}}" class="card-img-top">
                            @endforeach
                        </div>


                        <div class="row">
                            <!-- Button trigger modal -->
                            @foreach($deal->images as $image)
                            <div class="col-md-4 col-sm-4 col-4">
                                <img src="{{$image->imagePath}}" class="p-2" width="100%" height="100%" />
                            </div>
                            @endforeach
                        </div>

                        <!-- Description -->
                        <div class="pt-5">
                                <h5 class="descriptionOfDeal text-muted">Опис на услугата</h5>
                                <p class="description  w-100">{{$deal->description}}</p>
                            
                        </div>
                    </div>

                </div>
                <!-- END IMAGE WITH DESCRIPTION -->

                <!-- Email, maps for company -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 bg-dark rounded-card">

                    <!-- Price with discount -->
                    <h2 class="font-weight-bold text-white pt-4 pl-3"> @php
                        $newPrice = round($deal->price - (($deal->price * $deal->discount) / 100));
                        echo($newPrice)
                        @endphpден.
                    </h2>
                    <!-- End price with discount -->

                    <!-- Rating -->
                    <div class="col-md-5 col-sm-5 col-4 text-left">
                        <span class=" text-white">Оцени ја понудата:</span>
                        <div class="starrating risingstar d-flex justify-content-center flex-row-reverse pr-5 mr-5 text-white">
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                        </div>
                    </div>
                    <!-- End Rating -->

                    <!-- Email -->
                    <div class="pl-3 pt-3 text-white">
                        <h4 class="text-warning">Е-mail:</h4>
                        <p>{{$deal->company->email}}</p>
                    </div>
                    <!-- End Email -->

                    <!-- Address -->
                    <div class="pl-3 pt-3 text-white">
                        <h4 class="text-warning">Физичка адреса:</h4>
                        <p>{{$deal->company->address}}</p>
                    </div>
                    <!-- End Address -->

                    <!-- website -->
                    <div class="row pl-3">
                        <div class=" pt-3 text-white col-md-8">
                            <h4 class="text-warning">Вебсајт:</h4>
                            <p>{{ $deal->company->website}}</p>
                        </div>

                        <div class="col-md-3 pt-5 text-right link_social">
                            <a href="https://{{ $deal->company->website}}" style="font-size: 16px;"><i class="fas fa-external-link-alt text-right text-warning"></i></a>
                        </div>
                    </div>
                    <!-- End website -->

                    <!-- FB -->
                    <div class="row pl-3">
                        <div class=" pt-3 text-white col-md-8">
                            <h4 class="text-warning">Фејсбук страна:</h4>
                            <p>{{ $deal->company->facebook}}</p>
                        </div>

                        <div class="col-md-3 col-sm-3 pt-5 text-right link_social">
                            <a href="{{$deal->company->facebook}}" style="font-size: 16px;"><i class="fas fa-external-link-alt text-right text-warning"></i></a>
                        </div>
                    </div>
                    <!-- End FB -->

                    <!-- Mobile Phone -->
                    <div class="row pl-3">
                        <div class=" pt-3 text-white col-md-8">
                            <h4 class="text-warning">Телефонски број:</h4>
                            <p>{{ $deal->company->phone}}</p>
                        </div>
                    </div>
                    <!-- End FB -->

                    <!-- Google Maps -->
                    <div class="col-md-12 text-center pb-5 pt-5">
                        <iframe src="{{$deal->company->googleMap}}" width="500" height="300" frameborder="0" style="border-radius:1.5rem" allowfullscreen></iframe>
                    </div>
                    <!-- End Google Maps -->
                </div>

            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row">
            <a href="buy/{{$deal->id}}" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 offset-1 mt-3 btn btn-lg btn-dark mb-5 " style="font-size: 18px; font-weight: bold; color:white;">Купи попуст!</a>
        </div>
    </div>

    <div class="container-fluid p-0 m-0">
        <!-- <div class="row"> -->

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="bg-warning p-4 text-center" style="width:100%; height: 10vh">
                        <h5>
                            If you don't buy anything, click me
                            <a href="/" class="text-muted"><i class="fas fa-arrow-left"></i></a>
                            to go on Home Page
                        </h5>
                    </div>
                </div>
            <!-- </div> -->
    </div>
</body>
@endsection