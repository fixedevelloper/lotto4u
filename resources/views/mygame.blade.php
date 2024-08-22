@extends('layout')

@section('content')
  {{--  <h3 class="account__head mb__30">
        My Game
    </h3>--}}
    <div class="promocode__wrap">
        <h3>
            My Game
        </h3>
        <form id="mygame_form">
            <input type="date" value="{{$date}}" name="date" id="myform_game_input">
        </form>
    </div>
    <div class="accordion mt-3" id="accordionExample">
        @foreach($mygames as $item)
    <div class="accordion-item">
        <h2 class="accordion-head" id="{{$loop->index}}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#col{{$item->id}}"
                    aria-expanded="false" aria-controls="{{$item->id}}">
                {{$item->lotto_fixture->title}}
            </button>
        </h2>
        <div id="col{{$item->id}}" class="accordion-body collapse" aria-labelledby="{{$loop->index}}" data-bs-parent="#accordionExample">
            <div class="accordion-item text-black-50">
            @php
            $lotto_fixtures=\App\Helper\Helper::getLottofixtureItem($item->lotto_fixture->id)
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
                          $value=\App\Helper\Helper::getPlayingItem($item->id,$lotto->id)->value;

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
