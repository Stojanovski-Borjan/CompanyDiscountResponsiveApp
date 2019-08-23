@extends('application.productheader')

@section('content')

<body class="bg-light">
    <div class="container-fluid header pt-5">
        <div class="row">

            <div class="container">
                <div>
                    <a href="/" class="text-muted"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="mb-5 pt-4">
                    <h1>Понудете картичка со попуст.</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-md-8 pt-4">
                @if($errors)
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- FORM -->
                <form method="POST" action="{{ route('form.store')}}" enctype="multipart/form-data">
                    @csrf

                    <!-- Ime na kompanijata -->
                    <div class="form-group row">
                        <label for="name">Име на компанијата која нуди попуст.</label>
                        <input type="text" id='name' class='form-control shadow-sm' placeholder="пр: ДТУП Шатци ДОО Тетово" name="name" required>
                    </div>
                    <!-- End Ime na kompanijata -->

                    <!-- Opis na ponudata -->
                    <div class="form-group row">
                        <label for="description">Опис на понудата.</label>
                        <textarea type="text" name="description" id="description" rows="4" cols="50" class="form-control shadow-sm " require></textarea>
                    </div>
                    <!--End Opis na ponudata -->

                    <!-- Radio Button kategorii -->
                    <div class="form-group row radio-toolbar">
                        <div class="col-md-12 mr-4">
                            <p>Oдбери категорија</p>
                        </div>
                        @foreach ($categories as $category)
                        <input type="radio" id="{{$category->id}}" name="inputGroup" value="{{$category->id}}" class="radio">
                        <label for="{{$category->id}}" class="btn btn-outline-info mr-2 btn-label">{{$category->title}}</label>
                         <!-- <input type="radio" id="{{$category->id}}" name="inputGroup" value="{{$category->id}}"  class="radio"> -->
                         @endforeach
                    </div>
                    <!-- End Radio Button Kategorii -->

                    <!-- Logo -->
                    <div class="form-group row">
                        <div class="col-md-12 ">
                            <label for="thumbnail" class="pr-3">Внеси лого</label>
                        </div>

                        <span class="input-group-btn col-md-3">
                            <span class="btn btn-lg text-muted upload-thumbnail" onclick="$(this).parent().find('input[type=file]').click();"> +</span>
                            <input name="thumbnail" multiple onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none; width: 20%;" type="file">
                            <span class="form-control shadow-sm  col-md-12 bg-light text-center" style="border: none; font-size: 12px;"></span>
                        </span>
                    </div>
                    <!-- End Logo -->

                    <!-- Company phone -->
                    <div class="form-group row">
                        <label for="phone">Телефонски број:</label>
                        <input type="number" name="phone" id="phone" class="form-control shadow-sm" placeholder="пр: 070344039" require>
                    </div>
                    <!-- End Company Phone -->

                    <!-- Company Email -->
                    <div class="form-group row">
                        <label for="email">Е-маил на компанијата:</label>
                        <input type="text" name="email" id="email" class="form-control shadow-sm" placeholder="пр: johndoe@gmail.com" require>
                    </div>
                    <!-- End Company Email -->

                    <!-- Company Address -->
                    <div class="form-group row">
                        <label for="address">Адреса на компанијата:</label>
                        <input type="text" name="address" id="address" class="form-control shadow-sm" placeholder="пр: ul.Debarca br.70" require>
                    </div>
                    <!-- End Company Address -->

                    <!-- Company Title -->
                    <div class="form-group row">
                        <label for="title">Понуда:</label>
                        <input type="text" name="title" id="title" class="form-control shadow-sm" placeholder="пр. Јога часови" require>
                    </div>
                    <!-- End Company Title -->

                    <!-- Company Price -->
                    <div class="form-group row">
                        <label for="price">Цена без попуст:</label>
                        <input type="number" name="price" id="price" class="form-control shadow-sm" placeholder="пр: 3000" require>
                    </div>
                    <!-- End Company Price -->

                    <!-- Company Discount -->
                    <div class="form-group row">
                        <label for="discount">Попуст на услугата:</label>
                        <input type="number" name="discount" id="discount" class="form-control shadow-sm " placeholder="пр: 50" require>
                    </div>
                    <!-- End Company Discount -->

                    <!-- Multiple Images -->
                    <div class="form-group row">
                        <div class="col-md-12 ">
                            <label for="images" class="pr-3">Внеси слики од понудата:</label>
                        </div>


                        <span class="input-group-btn col-md-3 pb-4">
                            <span class="btn btn-lg text-muted upload-images" onclick="$(this).parent().find('input[type=file]').click();"> +</span>
                            <input name="images[]" id="prva" multiple onchange="$(this).parent().parent().find('.prva').html($(this).val().split(/[\\|/]/).pop());" style="display: none; width: 20%;" type="file">
                            <span class="form-control prva shadow-sm  col-md-12 bg-light text-center" style="border: none; font-size: 12px;"></span>
                        </span>


                        <span class="input-group-btn col-md-3">
                            <span class="btn btn-lg text-muted upload-images" onclick="$(this).parent().find('input[type=file]').click();"> +</span>
                            <input name="images[]" multiple onchange="$(this).parent().parent().find('.vtora').html($(this).val().split(/[\\|/]/).pop());" style="display: none; width: 20%;" type="file">
                            <span class="form-control vtora shadow-sm  col-md-12 bg-light text-center" style="border: none; font-size: 12px;"></span>
                        </span>


                        <span class="input-group-btn col-md-3">
                            <span class="btn btn-lg text-muted upload-images" onclick="$(this).parent().find('input[type=file]').click();"> +</span>
                            <input name="images[]" multiple onchange="$(this).parent().parent().find('.treta').html($(this).val().split(/[\\|/]/).pop());" style="display: none; width: 20%;" type="file">
                            <span class="form-control treta shadow-sm  col-md-12 bg-light text-center" style="border: none; font-size: 12px;"></span>
                        </span>


                        <span class="input-group-btn col-md-3">
                            <span class="btn btn-lg text-muted upload-images" onclick="$(this).parent().find('input[type=file]').click();"> +</span>
                            <input name="images[]" multiple onchange="$(this).parent().parent().find('.cetvrta').html($(this).val().split(/[\\|/]/).pop());" style="display: none; width: 20%;" type="file">
                            <span class="form-control cetvrta shadow-sm  col-md-12 bg-light text-center" style="border: none; font-size: 12px;"></span>
                        </span>

                        <span class="input-group-btn col-md-3">
                            <span class="btn btn-lg text-muted upload-images" onclick="$(this).parent().find('input[type=file]').click();"> +</span>
                            <input name="images[]" multiple onchange="$(this).parent().parent().find('.petta').html($(this).val().split(/[\\|/]/).pop());" style="display: none; width: 20%;" type="file">
                            <span class="form-control petta shadow-sm  col-md-12 bg-light text-center" style="border: none; font-size: 12px;"></span>
                        </span>

                        <span class="input-group-btn col-md-3">
                            <span class="btn btn-lg text-muted upload-images" onclick="$(this).parent().find('input[type=file]').click();"> +</span>
                            <input name="images[]" multiple onchange="$(this).parent().parent().find('.shesta').html($(this).val().split(/[\\|/]/).pop());" style="display: none; width: 20%;" type="file">
                            <span class="form-control shesta shadow-sm  col-md-12 bg-light text-center" style="border: none; font-size: 12px;"></span>
                        </span>

                        <span class="input-group-btn col-md-3">
                            <span class="btn btn-lg text-muted upload-images" onclick="$(this).parent().find('input[type=file]').click();"> +</span>
                            <input name="images[]" multiple onchange="$(this).parent().parent().find('.sedma').html($(this).val().split(/[\\|/]/).pop());" style="display: none; width: 20%;" type="file">
                            <span class="form-control sedma shadow-sm  col-md-12 bg-light text-center" style="border: none; font-size: 12px;"></span>
                        </span>

                        <span class="input-group-btn col-md-3">
                            <span class="btn btn-lg text-muted upload-images" onclick="$(this).parent().find('input[type=file]').click();"> +</span>
                            <input name="images[]" multiple onchange="$(this).parent().parent().find('.osma').html($(this).val().split(/[\\|/]/).pop());" style="display: none; width: 20%;" type="file">
                            <span class="form-control osma shadow-sm  col-md-12 bg-light text-center" style="border: none; font-size: 12px;"></span>
                        </span>

                    </div>
                    <!-- End Multiple Images -->

                    <!-- Website -->
                    <div class="form-group row">
                        <label for="website">Вашиот Вебсајт.</label>
                        <input type="text" id='website' class='form-control shadow-sm' placeholder="www.schatze.mk" name="website" required>
                    </div>
                    <!-- End Website -->

                    <!-- Facebook -->
                    <div class="form-group row">
                        <label for="facebook">Вашиот Фејсбук.</label>
                        <input type="text" id='facebook' class='form-control shadow-sm' placeholder="https://www.facebook.com/schatze.com.mk/" name="facebook" required>
                    </div>
                    <!-- End Facebook -->

                    <!-- Google Maps -->
                    <div class="form-group row">
                        <label for="googleMap">Google Maps - Локација.</label>
                        <input type="text" id='googleMap' class='form-control shadow-sm' placeholder="https://www.google.com/maps/embed?pb=..." name="googleMap" required>
                    </div>
                    <!-- End Google Maps -->

                    <!-- <div class="form-group row">
                        <p>Категорија:</p>
                        <select class="form-control shadow-sm " name='category_id' id="category" require>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div> -->
                    
                    <!-- Register Button -->
                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-lg btn-dark btn-dark-buy-now mb-5">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    <!-- End Register Button -->
                
                </form>
            </div>
        </div>
    </div>
</body>
@endsection