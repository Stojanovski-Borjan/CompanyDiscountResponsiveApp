@extends('application.header')

@section('content')

<body class="bg-light">
    <div class="container-fluid header pt-5">
        <div class="row">

            <div class="container">
                <div>
                    <a href="/product/{{$deal->id}}" class="text-muted"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="mb-5 pt-4">
                    <h1>Купете картичка за вработените!</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM -->
    <div class="container">
        <div class="row">
            <div class="col-md-8" id="{{$deal->id}}">
                <form method="POST" action="{{ route('product.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Ime i Prezime -->
                        <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                            <label for="fullName">Име и презиме.</label>
                            <input type="text" id='fullName' class='form-control shadow-sm' placeholder="пр: Борјан Стојановски" name="fullName" required>
                        </div>
                        <!-- End Ime i prezime -->


                        <!-- Ime na kompanijata -->
                        <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                            <label for="companyName">Име на компанијата која купува картичка.</label>
                            <input type="text" id='companyName' class='form-control shadow-sm' placeholder="пр: ДТУП Шатци ДОО Тетово" name="companyName" required>
                        </div>
                        <!-- End Ime na kompanijata -->
                    </div>


                    <div class="row">
                        <!-- Broj Na Vraboteni -->
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-4">
                            <label for="numOfEmployee">Број на вработените.</label>
                            <input type="number" id='numOfEmployee' class='form-control shadow-sm' placeholder="пр: 25" name="numOfEmployee" required>
                        </div>
                        <!-- End Broj Na Vraboteni-->


                        <!-- Broj -->
                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-4">
                            <label for="phone">Телефонски број на компанијата.</label>
                            <input type="number" id='phone' class='form-control shadow-sm' placeholder="пр: 078/321-328" name="phone" required>
                        </div>
                        <!-- End Broj -->
                    </div>

                    <input type="hidden" name="deal_id" value="{{$deal->id}}">
                    <!-- Register Button -->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-3 text-center">
                            <button type="submit" class="btn btn-dark btn-block mb-5 buy-card" >
                                {{ __('Купи Картичка') }}
                            </button>
                        </div>
                    </div>
                    <!-- End Register Button -->
                </form>
            </div>
        </div>
    </div>
    <!-- End FORM  -->
</body>

@endsection