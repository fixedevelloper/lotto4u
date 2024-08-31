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
                        <td><input type="checkbox"><span hidden>{{$winner['game_id']}}</span><span hidden>{{$winner['user_id']}}</span></td>
                        <td>{{$winner['user']}}</td>
                        <td><span hidden>{{$winner['user_id']}}</span></td>
                        <td>{{$winner['count']}} / {{$count_items}}</td>
                        <td>{{$winner['amount']}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class="card-footer">
            <div class="d-grid gap-">
            <button id="send_payment" class="btn btn-outline-dark"><i class="fa fa-spinner fa-spin"></i>Envoyer</button>
            </div>
        </div>
    </div>
@endsection
@push("script")
    <script>
        $('#send_payment').click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            const jsonObj = [];
            $("#table_payment>tbody input[type='checkbox']:checked").each(function () {
                var row = $(this).closest('tr')[0];
                var game_id = row.cells[0].children[1].innerText;
                var id = row.cells[1].innerText;
                var user_id = row.cells[0].children[2].innerText;
                var amount = row.cells[4].innerText;
                const item = {};
                item['user_id'] = user_id;
               // item['address'] = address;
                item['amount'] = amount;
                item['date_game'] = null;
                item['game_play_id'] = game_id;
                //addresses.push(address)
                //amounts.push(amount)
                jsonObj.push(item)
            });
            console.log(jsonObj)

            $.ajax({
                url:" {{ route('post_payment') }}",
                type: "POST",
                dataType: "JSON",
                data: JSON.stringify({
                    ob: jsonObj}),
                success: function (data) {
                    toastr.success('Operation executed successfully', 'Success')
                    $('#send_payment').hide();
                    window.location.reload()
                },
                error: function (err) {
                    toastr.error('An error has occurred' + JSON.stringify((err)),'Error')

                    $('#send_payment').hide();
                }
            });
        })
    </script>
@endpush


