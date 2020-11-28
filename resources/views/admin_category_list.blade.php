@extends('layouts.template_admin')

@section('content')

<body>
    <div class="d-xl-flex justify-content-xl-center" style="margin-top: 50px;">
        <div
            class="container d-flex d-sm-flex d-lg-flex justify-content-center justify-content-sm-center justify-content-lg-center">
            <div class="row" style="width: 310px;">
                <div class="col"><label class="col-form-label">Choose Category:</label></div>
                <div class="col align-self-center">
                    <div class="dropdown d-xl-flex justify-content-xl-start">
                        <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false" type="button">Categories</button>
                        <div class="dropdown-menu" role="menu">
                            @foreach($categories as $c)
                            <a class="dropdown-item" role="presentation"
                                href="{{url('admin/category_list/'.$c->category_id)}}">{{$c->category_name}}
                            </a>
                            @endforeach</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(\Request::is('admin/category_list/*'))
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
                                            style="background-color: rgb(218,67,57); color: white;">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</body>
@endsection
