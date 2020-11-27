@extends('layouts.template_admin')

@section('content')

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
                <td>{{$p->category_id}}</td>
                <td>{{$p->price}}</td>
                <td>{{$p->description}}</td>
                <td><button class="btn btn-primary" type="button"
                        style="background-color: rgb(218,67,57);">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
