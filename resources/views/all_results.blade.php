@extends('layout')
@section('content')
    <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Result Lotto</h3>
                    <div class="nk-block-des text-soft">
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li>
                                    <form id="mygame_form">
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-calendar-alt"></em>
                                            </div>
                                            <input data-date-format="yyyy-mm-dd" type="text" value="{{$date}}"
                                                   class="form-control date-picker" name="date" id="myform_game_input">
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div>
        <div class="nk-block">
            @if(sizeof($lotto_fixtures)>0)
                @foreach($lotto_fixtures as $lotto_fixture)


                    <div class="col-lg-8 col-12 mt-5">
                        <div class="card card_dark">
                            <div class="card-header">
                                <h5>{{$lotto_fixture->title}}<span class="float-end">Cagnotte:{{\App\Helper\Helper::calculCagnotte($lotto_fixture->id)}}FCFA</span></h5>
                                <p> End of validation :{{\Carbon\Carbon::parse($lotto_fixture->end_time)->format("d/m/Y")}}</span></p>

                            </div>
                            <div class="card-body">
                                @php
                                    $fixtures=\App\Helper\Helper::getLottofixtureItem($lotto_fixture->id)
                                @endphp

                                @foreach($fixtures as $item)
                                    @php
                                        $fixture=\App\Helper\Helper::getFixture($item->fixture_id);
             $occurences=\App\Helper\Helper::getOccurenceToPlay($item->id)
                                    @endphp
                                    <div class="row mt-3 grille">
                                        <div class="col-md-4 col-4">
                                            <span hidden>{{$item->id}}</span>
                                            <span hidden>{{$fixture->fixture_id}}</span>
                                            <div class="title">
                                                <img class="img"
                                                     src="{{$fixture->team_home_logo}}">
                                                {{$fixture->team_home_name}}
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <div class="mart__point__items">
                                                <a href="javascript:void(0);" class="point__box" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombres de jeux {{$occurences['v1']}}%">
                                                    <input disabled class="check-box" type="radio" name="{{$fixture->fixture_id}}" value="1" id="check1{{$item->id}}">
                                                    <label for="check1{{$item->id}}">
                                                        <span class="break">1({{$occurences['v1']}}%)</span>
                                                        <div><i class="">1</i></div>
                                                    </label>

                                                </a>
                                                <a href="javascript:void(0);" class="point__box" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombres de jeux {{$occurences['v3']}}%">
                                                    <input disabled type="radio" name="{{$fixture->fixture_id}}" value="3" id="check3{{$item->id}}">
                                                    <label for="check3{{$item->id}}">
                                                        <span class="break">x({{$occurences['v3']}}%)</span>
                                                        <div> <i class=""></i></div>
                                                    </label>

                                                </a>
                                                <a href="javascript:void(0);" class="point__box" data-bs-toggle="tooltip" data-bs-placement="top" title="Nombres de jeux {{$occurences['v2']}}%">
                                                    <input disabled type="radio" name="{{$fixture->fixture_id}}" value="2" id="check2{{$item->id}}">
                                                    <label for="check2{{$item->id}}">
                                                        <span class="break">2({{$occurences['v2']}}%)</span>
                                                        <div><i class=""></i></div>
                                                    </label>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 text-end">
                                            <div class="title">
                                                <img class="img"
                                                     src="{{$fixture->team_away_logo}}">
                                                {{$fixture->team_away_name}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                <div class="d-grid gap-2 mt-2 mb-5">

                                    <a class="btn btn-outline-success btn-lg btn-block" href="{{route('resultatDetail',["id"=>$lotto_fixture->id])}}">
                                        <i class="" id="spinner_send"></i> Detail cette grille</a>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            @else
                <div class="text-center">
                    <img src="{{asset('assets/images/no-data.png')}}">
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
