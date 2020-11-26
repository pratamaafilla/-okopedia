@extends('layouts.template')

@section('content')
<div style="margin-top: 50px;" class="container">
    <div class="row">
        <div class="col-md-6 d-lg-flex align-self-center justify-content-lg-center align-items-lg-center"><img
                src="{{ asset('images/'.$products->image) }}" style="width: 300px;"></div>
        <div class="col-md-6 d-lg-flex align-self-center align-items-lg-center">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{$products['name']}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rp. {{$products['price']}}</td>
                        </tr>
                        <tr>
                            <td>{{$products['description']}}</td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-success" type="button">Add to Cart</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
