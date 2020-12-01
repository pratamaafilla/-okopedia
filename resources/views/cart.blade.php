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

@foreach($products as $p)
<div class="d-flex justify-content-center">
    <div style="margin-top: 10px; max-width: 500px;" class="d-flex justify-content-center card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4 align-self-center">
                <img style="max-width: 200px;" src="{{ asset('images/'.$p->image) }}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <form action="/cart/{{$p->product_id}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$p->name}}</h5>
                        <p class="card-text">Rp{{$p->price}}</p>
                        <p class="card-text">
                            <input placeholder="{{$p->quantity}}" class="border rounded-0" type="number" name="quantity"
                                style="width: 50px;" value="{{Request::input('quantity')}}">
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


@endsection
