@extends('layout')
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Mes retraits</h3>
                <div class="nk-block-des text-soft">
                    <p>Listes des retraits.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                               <a href="{{route('withdraw_pay')}}" class="btn btn-primary"><i class="ni ni-plus"></i> Effectuer retait</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div>
    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Status</th>
                    <th>Telephone</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
