@extends('layouts.template')

@section('content')

@if($errors->any())
@foreach($errors->all() as $error)
<div class="d-flex justify-content-lg-center">

    <div class="alert alert-danger" role="alert" style="width: 50%;"><button type="button" class="close"
            data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">×</span></button><span><strong>{{ $error }}</strong>
    </div>

</div>
@endforeach
@endif

<div style="margin-top: 50px;">
    @foreach($products as $p)
    @php
    $total = $p->price*$p->quantity
    @endphp
    <div class="d-flex justify-content-center">
        <div style="max-width: 500px;" class="d-flex justify-content-center card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4 align-self-center">
                    <img style="max-width: 200px;" src="{{ asset('images/'.$p->image) }}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <form action="/cart/{{$p->product_id}}">
                        @csrf
                        <div class="card-body">
                            <h5 class="card-title">{{$p->name}}</h5>
                            <p class="card-text">Rp{{$total}}</p>
                            <p class="card-text">
                                <input class="border rounded-0" type="number" name="quantity" style="width: 50px;"
                                    value="{{$p->quantity}}">
                            </p>
                            <p class="card-text">
                                <button class="btn btn-success btn-sm" type="submit">Update</button>
                                <a href="{{url('/cart/delete/'.$p->cart_item_id)}}" class="btn btn-danger btn-sm"
                                    type="submit">Delete</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@if(!$empty)
<div class="justify-content-xl-center align-items-xl-center footer-basic">
    <nav
        class="navbar navbar-light navbar-expand fixed-bottom d-xl-flex justify-content-xl-center align-items-xl-center navigation-clean-button">
        <div class="container-fluid"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span
                    class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item" role="presentation">
                        <a href="{{url('/cart/checkout')}}" class="btn btn-success" type="submit"
                            style="color: white; width: 350px;">Checkout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
@endif
@endsection
