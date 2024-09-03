@extends('layout')
@section('title')  @endsection
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Result Lotto N°{{$lotto->id}}  @if($is_then)
                        <span class="text-danger text-opacity-100">Closed</span>
                    @endif</h3>
                <div class="nk-block-des text-soft">
                    <p>{{$lotto->title}} of {{\Carbon\Carbon::parse($lotto->end_time)->format("d/m/Y")}}</span></p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li> End of validation : <span>{{$lotto->end_time }}</li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card card_dark">
                <div class="card-body">
                    <div class="height__table">
                        <div class="main__table">
                            <div class="table-responsi">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Team home</th>
                                        <th>Team away</th>
                                        <th>Score</th>
                                        <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list_items as $item)
                                        @php
                                            $fixture=\App\Helper\Helper::getFixture($item->fixture_id);

                                        @endphp
                                        <tr>
                                            <td>{{\Illuminate\Support\Carbon::parse($fixture->date)}}</td>
                                            <td>
                                                <h6>
                                                    <img height="40" width="40"
                                                         src="{{$fixture->team_home_logo}}">
                                                    {{$fixture->team_home_name}}
                                                </h6>
                                            </td>
                                            <td>
                                                <h6>
                                                    <img height="40" width="40"
                                                         src="{{$fixture->team_away_logo}}">
                                                    {{$fixture->team_away_name}}
                                                </h6>
                                            </td>
                                            <td>
                                                {{$fixture->score_ft_home}}-
                                                {{$fixture->score_ft_away}}
                                            </td>
                                            <td>
                                                @if($fixture->st_short !="NS")
                                                    @if($fixture->score_ft_home>$fixture->score_ft_away)
                                                        1
                                                    @elseif($fixture->score_ft_home<$fixture->score_ft_away)
                                                        2
                                                    @else
                                                        3
                                                    @endif
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="card card_dark">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Rapport</th>
                            <th>Nombre de gagnants</th>
                            <th>Montant</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Tout les mactchs</td>
                            <td>{{$winners['win_xx']}}</td>
                            <td>@if($winners['win_xx']<=0) 0 @else{{(env('PRICE_GAME')*$count_players)*0.5/$winners['win_xx']}}@endif</td>
                        </tr>
                        <tr>
                            <td>Moins un mactch</td>
                            <td>{{$winners['win_1x']}}</td>
                            <td>@if($winners['win_1x']<=0) 0 @else{{(env('PRICE_GAME')*$count_players)*0.2/$winners['win_1x']}}@endif</td>
                        </tr>
                        <tr>
                            <td>Moins deux mactchs</td>
                            <td>{{$winners['win_2x']}}</td>
                            <td>@if($winners['win_2x']<=0) 0 @else{{(env('PRICE_GAME')*$count_players)*0.1/$winners['win_2x']}}@endif</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("script")


@endpush
