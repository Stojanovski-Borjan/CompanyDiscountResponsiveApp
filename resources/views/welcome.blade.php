@extends('application.app')

@section('content')

<div class="container img-on-left-side">

    <!-- IMG ON LEFT SIDE -->
    <div class="img-on-left-side col-md-12 col-xl-12 col-lg-12 col-sm-12 col-12">
        <!-- First Card -->
        @foreach($deals as $deal)

        <div class="card cards mt-3 {{$deal->id}}">
            <div class="row no-gutters">
                <div class="col-auto col-md-4">
                    <img src="{{$deal->company->thumbnail}}" width="100%" height="250vh" class="card-img-top" alt="...">
                </div>
                <div class="col-md-4 pt-3 pr-2">
                    <div class="card-block px-2 offset-1">
                        <h2 class="card-title">{{$deal->company->name}}</h2>
                        <h5 class="text-warning">{{$deal->discount}}% попуст во првите 6 месеци</h5>
                        <p class="text-center col-md-6 pt-1 pb-1 mt-4" style="border: 3px solid ; border-radius: 1.2rem">{{$deal->category->title}}</p>
                    </div>
                </div>
                <div class="col-md-3 ml-3 pt-5">
                    <a href="product/{{$deal->id}}" class="btn btn-outline-dark btn-block" style="border-radius: 1.2rem">Дознај повеќе!</a>

                    <div class="row pt-5">
                        <div class=" col-md-6 text-center pb-3 text-success ">
                            <h3><i class="far fa-thumbs-up"></i><span class="like"></span></h3>
                        </div>
                        <div class=" col-md-6 text-center pb-3 text-danger ">
                            <h3><i class="far fa-thumbs-down"></i><span class="dislike"></span></h3>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer w-100 text-muted text-right">
                <span class="">
                    Креирано на:
                    {{$deal->created_at->format('m/d/Y')}}
                </span>
            </div>
        </div>
        @endforeach
        <!-- End First Card -->
    </div>
    <!-- END IMG ON LEFT SIDE -->
</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


<div class="container img-top-side">
    <div class="row ">
        <div class="card-group">
            @foreach($deals as $deal)

            <div class="col-md-6 col-xl-4 col-lg-4 col-sm-12 col-12  changing">
                <div class="card-deck pt-3 cards {{$deal->id}}">
                    <div class="card" style="border-radius: 1.2rem; border: 1px solid black">
                        <div>
                            <img src="{{$deal->company->thumbnail}}" width="100%" style="border-top-left-radius:1.2rem; border-top-right-radius:1.2rem" height="250vh" class="card-img-top" alt="...">

                        </div>

                        <div class="body-style">
                            <div class="card-body">
                                <h3 class="card-title text-center">{{$deal->company->name}}</h3>
                                <h5 class="text-warning">{{$deal->discount}}% попуст во првите 6 месеци</h5>

                                <p class="text-center col-md-6 offset-3 pt-1 pb-1 mt-4" style="border: 3px solid ; border-radius: 1.2rem">{{$deal->category->title}}</p>
                                <div class="row">
                                    <div class=" col-md-6 text-center pb-3 text-success ">
                                        <h3><i class="far fa-thumbs-up"></i><span class="like"></span></h3>
                                    </div>
                                    <div class=" col-md-6 text-center pb-3 text-danger ">
                                        <h3><i class="far fa-thumbs-down"></i><span class="dislike"></span></h3>
                                    </div>
                                </div>


                                <div class="text-right">
                                    <a href="product/{{$deal->id}}" class="btn btn-outline-dark btn-block" style="border-radius: 1.2rem">Дознај повеќе!</a>
                                </div>
                            </div>
                            <div class="card-footer w-100 text-muted text-right">
                                <span class="">
                                    Креирано на:
                                    {{$deal->created_at->format('m/d/Y')}}
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var mobile = (/iphone|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));
        if (mobile) {
            $('.navWrap').hide();
        }

        var randomNumberForLike = Math.floor(Math.random() * 500);
        var randomNumberForDislike = Math.floor(Math.random() * 250);

        $('.like').append(randomNumberForLike);
        $('.dislike').append(randomNumberForDislike);

    });
</script>
@endsection