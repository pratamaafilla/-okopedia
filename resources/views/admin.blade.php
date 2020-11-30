@extends('layouts.template_admin')

@section('content')

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
                                <th>Action</th>
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
                                <td><a class="btn btn-primary" type="button" href="{{url('/delete/'.$p->id)}}"
                                        style="background-color: rgb(218,67,57); color: white;">Delete</a>
                                </td>
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
