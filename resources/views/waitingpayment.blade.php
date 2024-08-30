@extends('base')
@push('css')
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .message-container {
            text-align: center;
            padding: 20px;
            border-radius: 5px;
            background-color: #ffffff;

        }
        .message-container h1 {
            color: #333333;
        }
        .message-container p {
            color: #666666;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .button:hover {
            background-color: #0056b3;
        }
        p{
            font-size: 18px;
        }
    </style>
@endpush
@section('content')
    <div class="card">
        <div class="card-inner card-inner-md">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title"></h4>
                    <div class="nk-block-des">
                        <div class="message-container">
                            <h1>Merci pour votre Jeux !</h1>
                            <p>Votre paiement est en attente de traitement. Nous vous informerons dès qu'il sera confirmé.</p>
                            <p>Vous pouvez suivre l'état de votre paiement en cliquant sur le bouton ci-dessous.</p>
                            <div class="h2 text-center">
                                <i class="fa fa-spinner fa-spin"></i>
                            </div>
                            <form method="POST">
                                @csrf
                                <button class="button">
                                    Confirmer le Paiement
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h2 text-center">


            </div>
        </div>
    </div>


@endsection
@push('script')

@endpush
