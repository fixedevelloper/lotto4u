@extends('layout')

@section('content')
    <h3 class="account__head mb__30">
        Detail Transactions
    </h3>
    <div class="">
        <div class="custom_card">
            <form method="POST">
                @csrf
                <div class="single-input mb__20">
                <input class="form-control" name="method" value="{{$transaction->method}}" disabled>
                </div>
                <div class="single-input mb__20">
                    <input class="form-control" type="text" id="idproof" name="idproof" placeholder="ID of transaction" readonly value="{{$transaction->idproof}}" autocomplete="off">
                </div>
                <div class=" mb__20">
                    <label class="form-label text-white">Amount</label>
                    <input class="form-control" type="text" id="idproof" name="amount" placeholder="Amount" value="{{$transaction->amount}}" autocomplete="off">
                </div>
                <div class="single-s mb__20">
                    <label class="form-label text-white">Status</label>
                   <select class="form-select" name="status">
                       <option value="pending">Pending</option>
                       <option value="complete">Complete</option>
                       <option value="cancel">Cancel</option>
                   </select>
                </div>
                <div class="btn-area">
                    <button type="submit" class="cmn--btn">
                        <span>Change status</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

