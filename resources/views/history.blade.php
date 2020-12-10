@extends('layouts.template_user')

@section('content')

<div
    class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center">
    <div class="table-responsive table-bordered text-center" style="margin-top: 45px;width: 953px;">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-success">Transaction History</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $t)
                <tr>
                    <td><a class="text-secondary"
                            href="{{url('user/history/'.$t->transaction_id)}}">{{$t->transaction_date}}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
