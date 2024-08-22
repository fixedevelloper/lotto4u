<div class="col-lg-8 col-12 mt-5">
    <div class="card card_dark">
        <div class="card-header">
            <h5>{{$grille->title}}</h5>
            <p> End of validation :{{\Carbon\Carbon::parse($grille->end_time)->format("d/m/Y")}}</span></p>
        </div>
        <div class="card-body">
            @php
                $fixtures=\App\Helper\Helper::getLottofixtureItem($grille->id)
            @endphp

                    @foreach($fixtures as $item)
                        @php
                            $fixture=\App\Helper\Helper::getFixture($item->fixture_id);

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
                        <a href="javascript:void(0);" class="point__box">
                            <input class="check-box" type="radio" name="{{$fixture->fixture_id}}" value="1" id="check1{{$item->id}}">
                            <label for="check1{{$item->id}}">
                                <span class="break">1</span>
                                <div><i class=""></i></div>
                            </label>

                        </a>
                        <a href="javascript:void(0);" class="point__box">
                            <input type="radio" name="{{$fixture->fixture_id}}" value="3" id="check3{{$item->id}}">
                            <label for="check3{{$item->id}}">
                                <span class="break">x</span>
                                <div> <i class=""></i></div>
                            </label>

                        </a>
                        <a href="javascript:void(0);" class="point__box">
                            <input type="radio" name="{{$fixture->fixture_id}}" value="2" id="check2{{$item->id}}">
                            <label for="check2{{$item->id}}">
                                <span class="break">2</span>
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
                     {{--<tr class="table__items b__bottom">
                            <td width="30%">
                                <span hidden>{{$item->id}}</span>
                                <span hidden>{{$fixture->fixture_id}}</span>
                                <h6>
                                    <img height="40" width="60"
                                         src="{{$fixture->team_home_logo}}">
                                    {{$fixture->team_home_name}}
                                </h6>
                            </td>
                            <td width="40%">
                                <div class="mart__point__items">
                                    <a href="javascript:void(0);" class="point__box">
                                        <input class="check-box" type="radio" name="{{$fixture->fixture_id}}" value="1" id="check1{{$item->id}}">
                                        <label for="check1{{$item->id}}">
                                            <span class="break">1</span>
                                            <div><i class=""></i></div>
                                        </label>

                                    </a>
                                    <a href="javascript:void(0);" class="point__box">
                                        <input type="radio" name="{{$fixture->fixture_id}}" value="3" id="check3{{$item->id}}">
                                        <label for="check3{{$item->id}}">
                                            <span class="break">x</span>
                                            <div> <i class=""></i></div>
                                        </label>

                                    </a>
                                    <a href="javascript:void(0);" class="point__box">
                                        <input type="radio" name="{{$fixture->fixture_id}}" value="2" id="check2{{$item->id}}">
                                        <label for="check2{{$item->id}}">
                                            <span class="break">2</span>
                                            <div><i class=""></i></div>
                                        </label>

                                    </a>
                                </div>
                            </td>
                            <td  width="30%">
                                <h6>
                                    <img height="40"
                                         src="{{$fixture->team_away_logo}}">
                                    {{$fixture->team_away_name}}
                                </h6>
                            </td>
                        </tr>--}}
                    @endforeach

            </div>

            <div class="d-grid gap-2 mt-2 mb-5">

                    <a class="btn btn-outline-success btn-lg btn-block" href="{{route('game',["id"=>$lotto_fixture->id])}}"><i class="" id="spinner_send"></i> Jouer cette grille</a>

            </div>
        </div>
    </div>
</div>
