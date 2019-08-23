@extends('layouts.app')

@section('content')

<div id="approval">
    <div>
        <h3>

            dasdsadsdasdasdsa
        </h3>
    </div>
    <div class="container  mt-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">How many deals are NOT approved {{$countDealsNotApproved}}</h4>

                @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
                @endif

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Company</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Approve</th>
                        </tr>
                    </thead>
                    <tbody id="doesnotapprove">
                        @forelse ($deals as $deal)
                        @if(!($deal->is_approved))
                        <tr>
                            <td>{{ $deal->company->name }}</td>
                            <td>{{ $deal->category->title }}</td>
                            <td>{{ $deal->title }}</td>
                            <td style="width:30%;">{{ $deal->description }}</td>
                            <td>{{ $deal->price }}</td>
                            <td>{{ $deal->discount }}%</td>
                            <td><a href="{{ route('dashboard.approve', $deal->id) }}" class="btn btn-primary btn-sm">Approve</a></td>
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="4">No deals found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Not Approv Deals -->

<!-- APPROVED  -->
<div id="approved">


    <div class="container">
        <div class="row pt-5 mt-5 overflow-auto">
            <div class="col-md-12 pt-3 " style="border-top: 1px solid lightgrey;">
                <h4 class="text-center">How many deals are approved {{$countDealsApproved}}</h4>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Company</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Discount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deals as $deal)
                        @if(($deal->is_approved))
                        <tr>
                            <td>{{ $deal->company->name }}</td>
                            <td>{{ $deal->category->title }}</td>
                            <td>{{ $deal->title }}</td>
                            <td style="width:30%;">{{ $deal->description }}</td>
                            <td>{{ $deal->price }}</td>
                            <td>{{ $deal->discount }}%</td>
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="4">No deals found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END APPROVED  -->


<!-- BEST SELLER  -->
<div id="best-seller">
    <div class="container text-center pt-3 mt-3" style="border-top: 1px solid lightgrey">
        <h2>Категории со вкупен број на попусти</h2>
        <div class="row ">
            <div class="card-group">
            @foreach($categoriesDeal as $categoryDeal)
            @if($categoryDeal->total >= 2)
            <div class="card-deck ">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card text-center bg-success mt-5">

                            <div class="card-header">
                            <h4>{{$categoryDeal->total}}</h4>
                        </div>
                        
                        <div class="card-body">
                            <h2>{{$categoryDeal->category->title}}</h2>
                        </div>
                    </div>
                </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

</div>
<!-- END BEST SELLER -->
@endsection