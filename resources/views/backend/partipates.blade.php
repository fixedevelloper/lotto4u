@extends('layout')

@section('content')
    <h3 class="account__head mb__30">
        List Users <a class="btn btn-sm btn-outline-success float-end">Add admin</a>
    </h3>
    <div class="">
        <div class="custom_card casinoform__tabe">

            <table class="">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Balance</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->index}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->sold}}</td>
                        <td>@if($user->user_type==0) Admin @else User @endif</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
