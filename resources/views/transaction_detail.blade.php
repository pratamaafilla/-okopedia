@extends('layouts.template_user')

@section('content')
<div>
    <h2 class="display-4 text-center text-success border rounded-0"
        style="margin-top: 30px;margin-bottom: 50px;font-size: 40px;">Transaction History</h2>
</div>
@foreach($products as $p)
@php
$total = $p->price*$p->quantity
@endphp
<div class="d-flex justify-content-center">
    <div style="margin-top: 0px; max-width: 500px;" class="d-flex justify-content-center card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4 align-self-center">
                <img style="max-width: 200px;" src="{{ asset('images/'.$p->image) }}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$p->name}}</h5>
                    <p class="card-text">Rp{{$total}}</p>
                    <p class="card-text">Quantity: {{$p->quantity}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
