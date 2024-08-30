@extends('layout')
@section('title') Looto resultats @endsection
@section('content')
    <h3 class="account__head mb__30">
        Payement  {{$lotto->title}} du {{\Carbon\Carbon::parse($lotto->end_time)->format("d/m/Y")}}
    </h3>

    <div class="card card_dark mt-3">
        <div class="card-header">
            <h3>List winners</h3>
        </div>
        <div class="card-body">
            <table class="table" id="table_payment">
                <thead>
                <tr>
                    <th></th>
                    <th>User</th>
                    <th>Address</th>
                    <th>Match win</th>
                    <th>Gain</th>
                </tr>
                </thead>
                <tbody>
                @foreach($winners as $winner)
                    <tr>
                        <td><input type="checkbox"><span hidden>{{$winner['game_id']}}</span></td>
                        <td>{{$winner['user']}}</td>
                        <td>{{$winner['address']}}</td>
                        <td>{{$winner['count']}} / {{$count_items}}</td>
                        <td>{{$winner['amount']}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class="card-footer">
            <div class="d-grid gap-">
            <button onclick="lotto.sendPayement()" class="btn btn-outline-dark"><i class="fa fa-spinner fa-spin" id="send_payment"></i>Envoyer</button>
            </div>
        </div>
    </div>
@endsection
@push("script")
    <script src="{{asset('assets/js/lotterie.js')}}></script>
@endpush


