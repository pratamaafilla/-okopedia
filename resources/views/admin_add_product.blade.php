@extends('layouts.template_admin')

@section('content')

<div class="login-clean" style="background-color: rgb(255,255,255);padding-top: 0px;padding-bottom: 0px;">
    {{--@if(!$error == "false")
    <div class="d-flex justify-content-lg-center">
        <div class="alert alert-success" role="alert" style="width: 50%;"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Product
                    added.</strong></span>
        </div>
    </div>
    @elseif($error == "true")
    <div class="d-flex justify-content-lg-center">
        <div class="alert alert-danger" role="alert" style="width: 50%;"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Please
                    fill in all details.</strong></div>
    </div>
    @elseif($error == "null")
        <div></div>
    
    @endif--}}

    @if($errors->any())
    <div class="d-flex justify-content-lg-center">
        <div class="alert alert-danger" role="alert" style="width: 50%;"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Please
                    fill in all details.</strong></div>
    </div>
    @endif


    <form action="/admin/add_product/upload" method="POST" enctype="multipart/form-data" name="addproduct">
        {{ csrf_field() }}
        <div class="form-group"><input class="form-control" type="text" name="name" value="{{Request::input('name')}}"
                placeholder="Name"></div>
        <div class="form-group">
            <select class="form-control" name="category">
                <optgroup label="Category">
                    @foreach($categories as $c)
                    <option value="{{$c->category_id}}">{{$c->category_name}}</option>
                    @endforeach
                </optgroup>
            </select>
        </div>
        <div class="form-group"><input class="form-control" type="text" name="description"
                value="{{Request::input('description')}}" placeholder="Description">
        </div>
        <div class="form-group"><input class="form-control" type="number" name="price"
                value="{{Request::input('price')}}" placeholder="Price">
        </div>
        <div class="form-group"><input type="file" name="image" accept="image/*" style="width: 218px;"></div>
        <div class="form-group"><button class="btn btn-success btn-block" type="submit">Add Product</button></div>
    </form>
</div>
<div>
    <div class="container">
        <div class="row d-md-flex justify-content-center justify-content-md-center" style="margin-top: 50px;">
            <div class="col-md-4 col-lg-11 offset-lg-0 align-self-center">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center text-success">
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                            <tr class="text-center border-success shadow-sm">
                                <td>{{$p->id}}</td>
                                <td><img src="{{ asset('images/'.$p->image) }}" style="width: 35px;"></td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->category_name}}</td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->description}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
