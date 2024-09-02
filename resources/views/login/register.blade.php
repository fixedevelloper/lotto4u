
@extends('base')

@section('content')
    <div class="card card-bordered">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Register-In</h4>
                    <div class="nk-block-des">
                        <p>Access the {{ env('APP_NAME')}} panel using your email and passcode.</p>
                    </div>
                </div>
            </div>
            <form method="POST">
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="default-01">Name*</label>
                    </div>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control form-control-lg" id="default-01" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="default-01">Phone*</label>
                    </div>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control form-control-lg" id="default-01" name="phone" required>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">Passcode</label>
                            <a class="link link-primary link-sm" href="#">Forgot Code?</a>
                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input required type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your passcode">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">Register</button>
                    </div>
                @csrf
            </form>
            <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{route('login')}}">Sign in</a>
            </div>
            <div class="text-center pt-4 pb-3">
                <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
            </div>
            <ul class="nav justify-center gx-4">
                <li class="nav-item"><a class="link link-primary fw-normal py-2 px-3" href="#">Facebook</a></li>
                <li class="nav-item"><a class="link link-primary fw-normal py-2 px-3" href="#">Google</a></li>
            </ul>
        </div>
    </div>

@endsection
@push('script')

@endpush
