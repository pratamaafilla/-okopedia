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

<div>
    <div class="container" style="margin-top: 50px;">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 d-lg-flex align-self-center justify-content-lg-center align-items-lg-center"><img
                    src="{{ asset('images/'.$products->image) }}" style="width: 415px;"></div>
            <div class="col-md-6 d-lg-flex align-self-center align-items-lg-center">
                <div>
                    <div class="col" style="margin-bottom: 30px;">
                        <h1 class="display-4 text-center" style="font-size: 46px;">{{$products['name']}}</h1>
                    </div>
                    <div>
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Price</td>
                                            <td style="font-size: 30px;color: rgb(51,156,74);">Rp{{$products['price']}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td style="font-size: 17px;">{{$products['description']}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form method="POST" enctype="multipart/form-data" name="addtocart">
                                {{ csrf_field() }}
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 104px;">Quantity</td>
                                                <td><input class="border rounded-0" type="number" name="quantity"
                                                        style="width: 50px;" value="1"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit" style="width: 150px;">Add to
                                        Cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
