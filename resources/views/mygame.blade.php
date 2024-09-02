@extends('layout')

@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Mes jeux</h3>
                <div class="nk-block-des text-soft">
                    <p>Listes de mes Jeux.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <form id="mygame_form">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                           {{-- <em class="icon ni ni-calendar-alt"></em>--}}
                                        </div>
                                        <input data-date-format="yyyy-mm-dd" type="date" value="{{$date}}" class="form-control" name="date" id="myform_game_input">
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div>
{{--
    <div class="promocode__wrap">
        <h3>
            My Game
        </h3>
        <form id="mygame_form">
            <input class="form-control form-control-lg mt-3" type="date" value="{{$date}}" name="date" id="myform_game_input">
        </form>
    </div>--}}
    <div class="accordion mt-3" id="accordionExample">
        @foreach($mygames as $item)
    <div class="accordion-item" >
        <h2 class="accordion-head" id="{{$loop->index}}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#col{{$item->game->id}}"
                    aria-expanded="false" aria-controls="{{$item->game->id}}">
                {{$item->game->lotto_fixture->title}}
            </button>
        </h2>
        <div id="col{{$item->game->id}}" class="accordion-body collapse" aria-labelledby="{{$loop->index}}" data-bs-parent="#accordionExample">
            <div class="accordion-item text-black-50">
            @php
            $lotto_fixtures=\App\Helper\Helper::getLottofixtureItem($item->game->lotto_fixture->id)
            @endphp
                <table class="table">
                    <thead>
                    <tr>
                        <th>Team home</th>
                        <th>Team Away</th>
                        <th>Choice</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lotto_fixtures as $lotto)
                        @php
                            $fixture=\App\Helper\Helper::getFixture($lotto->fixture_id);
                          $value=\App\Helper\Helper::getPlayingItem($item->game->id,$lotto->id)->value;

                          if ($fixture->team_away_winner){
                              $result=2;
                          }elseif ($fixture->team_home_winner){
                               $result=1;
                          }else{
                               $result=3;
                          }
                        @endphp
                    <tr>
                        <td>
                           <h6><img height="40" width="40"
                                 src="{{$fixture->team_home_logo}}">
                            {{$fixture->team_home_name}}</h6>

                        </td>
                        <td><h6><img height="40" width="40"
                                       src="{{$fixture->team_away_logo}}">
                            {{$fixture->team_away_name}}</h6></td>
                        <td @if($result==$value) class="bg-success text-center" @else class="bg-danger text-center" @endif>
                            {{$value}}
                        </td>
                        <td class="text-center">
                            {{$fixture->score_ft_home}}-{{$fixture->score_ft_away}}
                         {{--   <button class="btn btn-sm btn-success">
                                <span class="fa @if($result===$value) fa-check-double@else fa-times  @endif"></span>
                            </button>--}}

                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        @endforeach
    </div>
@endsection
