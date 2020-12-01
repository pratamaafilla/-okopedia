@extends('layouts.template')

@section('content')

<div style="margin-top: 50px; margin-bottom: 50px;" class="container">
    <div class="card-deck">
        @foreach($products as $p)
        <div style="max-width: 300px;" class="card">
            <div class="card-body text-center">
                <img style="max-width: 200px;" class="card-img-top" src="{{ asset('images/'.$p->image) }}" alt="">
                <h5 style="margin-top: 20px;" class="card-title">{{$p->name}}</h5>
                <p class="card-text">Rp. {{$p->price}}</p>
            </div>
            <div class="card-footer">
                <a style="width: 100%;" text href="{{url('/product/'.$p->id)}}" class="btn btn-success">See
                    Details</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="d-flex justify-content-center">
    {{$products->withQueryString()->links()}}
</div>

@endsection
