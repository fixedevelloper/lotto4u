@extends('layout')

@section('content')
    <h3 class="account__head mb__30">
        Transactions
    </h3>
    <div class="">
        <div class="custom_card">
            <div class="cainoform__wrap">
                <form id="mygame_form">
                    <div class="row g-4">
                        <div class="col-xl-6">
                            <div class="casino__date">
                                <h4 class="f__title">
                                    From
                                </h4>
                                <div class="calender-bar">
                                    <input value="{{$begin_date}}" name="date_begin" type="text" class="datepicker" placeholder="2023-2-2">
                                    <i class="icon-calender"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="casino__date">
                                <h4 class="f__title">
                                    Until
                                </h4>
                                <div class="calender-bar">
                                    <input value="{{$end_date}}" name="date_end" type="text" class="datepicker" id="myform_game_input" placeholder="2023-2-2">
                                    <i class="icon-calender"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="casinoform__tabe">
                <table>
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Payment Methods</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                        <td>{{strtoupper($transaction->type)}}</td>
                        <td>{{strtoupper($transaction->method)}}</td>
                        <td>{{$transaction->amount}} USD</td>
                        <td class="@if($transaction->status=='pending') pending @elseif($transaction->status=='cancel')cancel @else complate @endif">{{$transaction->status}}</td>
                        <td>{{$transaction->user->name}}</td>
                        <td class="bold"><a class="btn btn-outline-primary btn-sm" href="{{route("admin.transaction_detail",['id'=>$transaction->id])}}">Detail</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
@endsection
