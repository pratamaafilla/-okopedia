@extends('layouts.template_admin')

@section('content')


<div class="login-clean" style="background-color: rgb(255,255,255);padding-top: 0px;padding-bottom: 0px;">
    @if($errors->any())
    <div class="d-flex justify-content-lg-center">
        <div class="alert alert-danger" role="alert" style="width: 50%;"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Please
                    fill in all details.</strong></span></div>
    </div>
    @endif
    <form action="/admin/add_category/upload" method="POST" enctype="multipart/form-data" name="addcategory">
        {{ csrf_field() }}
        <div class="form-group"><input class="form-control" type="text" name="name" value="{{Request::input('name')}}"
                placeholder="Name"></div>
        <div class="form-group"><button class="btn btn-success btn-block" type="submit">Add Category</button></div>
    </form>
</div>
<div>
    <div class="container" style="width: 471px;">
        <div class="row d-md-flex justify-content-center justify-content-md-center" style="margin-top: 50px;">
            <div class="col-md-4 col-lg-11 offset-lg-0 align-self-center">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center text-success">
                                <th>Id</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $c)
                            <tr class="text-center border-success shadow-sm">
                                <td>{{$c->category_id}}</td>
                                <td>{{$c->category_name}}</td>
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
