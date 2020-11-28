@extends('layouts.template_admin')

@section('content')

<body>
    <div style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col text-right"><label class="col-form-label">Choose Category:</label></div>
                <div class="col-md-6 align-self-center">
                    <div class="dropdown"><button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false" type="button">Category</button>
                        <div class="dropdown-menu" role="menu">
                            @foreach($categories as $c)
                            <a class="dropdown-item" role="presentation"
                                href="{{url('admin/category_list/'.$c->category_id)}}">{{$c->category_name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(\Request::is('admin/category_list/*'))
    <div class="table-responsive" style="margin-top: 80px;">
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
                @foreach($products as $c)
                <tr class="text-center border-success shadow-sm">
                    <td>{{$c->id}}</td>
                    <td><img src="{{ asset('images/'.$c->image) }}" style="width: 35px;"></td>
                    <td>{{$c->name}}</td>
                    <td>{{$c->category_name}}</td>
                    <td>{{$c->price}}</td>
                    <td>{{$c->description}}</td>
                    <td><a class="btn btn-primary" type="button" href="{{url('/delete/'.$c->id)}}"
                            style="background-color: rgb(218,67,57); color: white;">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</body>
@endsection
