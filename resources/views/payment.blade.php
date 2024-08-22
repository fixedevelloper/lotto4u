@extends('base')

@section('content')
    <div class="card card-bordered">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">PaymentGame</h4>
                    <div class="nk-block-des">
                        <p>.</p>
                    </div>
                </div>
            </div>
            <form method="POST">
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
                        <select name="carier" class="form-select js-select2">
                            <option value="MTN">MTN</option>
                            <option value="Orange">ORANGE</option>
                            <option value="Airtel">Airtel</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="default-01">Phone</label>
                    </div>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control form-control-lg" id="default-01" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="default-01">Amount(FCFA)</label>
                    </div>
                    <div class="form-control-wrap">
                        <input value="{{env('PRICE_GAME')}}" type="text" class="form-control form-control-lg" id="default-01" name="amount" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block">SendPayment</button>
                </div>
                @csrf
            </form>
            <div class="form-note-s2 text-center pt-4"> Cancel?<a href="{{route('mygame')}}">MyGame</a>
            </div>
            <div class="text-center pt-4 pb-3">
                <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
            </div>
        </div>
    </div>
    {{--   <div class="row justify-content-center">
           <div class="col-md-6">
               <div class="mt-3">
                   <div class="custom_card">
                       <h2 class="text-white">Sign In</h2>
                       <div class="form__tabs__wrap mt-3">
                           <form action="{{route("login")}}">
                               @csrf

                               <div class="text-white">
                                   <label class="form-label" for="email35">Phone</label>
                                   <input class="form-control" type="text" id="email35" name="phone" placeholder="">
                               </div>
                               <div class="text-white">
                                   <label class="form-label" for="toggle-password10">Password</label>
                                   <input class="form-control" name="password" id="toggle-password10" type="password" placeholder="Your Password">
                               </div>

                               <div class="create__btn mt-3">
                                   <button class="cmn--btn">
                                       <span>Sign In</span>
                                   </button>
                               </div>
                               <p>
                                   you not have an account? <a href="{{route('register_post')}}">Register</a>
                               </p>
                           </form>
                       </div>
                   </div>

               </div>
           </div>
       </div>--}}

@endsection
@push('script')

@endpush
