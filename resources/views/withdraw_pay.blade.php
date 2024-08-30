@extends('layout')
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Mes retraits</h3>
                <div class="nk-block-des text-soft">
                    <p>Effectuer des retraits.</p>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div>
    <div class="nk-block nk-block-lg">
        <div class="card p-5">
            <h3 class="account__head2 mb__30">
                 <span class="float-end balance">Balance:{{$user->sold}} FCFA</span>
            </h3>
            <div class="deposit__complate">
                <p class="mb-3 text-white">Make Your withdraw</p>
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Country</label>
                        <div class="form-control-wrap">
                            <select name="country" class="form-select js-select2">
                                <option value="Congo">Congo</option>
                                <option value="DRC">RDC</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Carrier</label>
                        <div class="form-control-wrap">
                            <select name="carrier" class="form-select js-select2">
                                <option value="NONE">Choose carrier</option>
                                <option value="MTN">MTN</option>
                                <option value="Orange">ORANGE</option>
                                <option value="Airtel">Airtel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="default-01">Amount</label>
                        <div class="form-control-wrap">
                            <input name="amount" type="number" max="{{$user->sold}}" class="form-control" id="default-01" placeholder="Input placeholder">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="default-02">Beneficiary Phone</label>
                        <div class="form-control-wrap">
                            <input name="phone" type="text" class="form-control" id="default-02" placeholder="Input placeholder">
                        </div>
                    </div>
                    <div class="btn-area">
                        <button type="submit" class="btn btn-outline-dark">
                            <span>Withdraw</span>
                        </button>
                    </div>
                </form>
            </div>
    </div>
@endsection
@push('script')
            <script>
                $("#default-01").change(function () {

                })
            </script>
@endpush

