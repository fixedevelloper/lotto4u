@extends('layout')
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Lotto Game</h3>
                <div class="nk-block-des text-soft">
                    <p>Listes des lotto du jour.</p>
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
    @if(sizeof($lotto_fixtures)>0)
        @foreach($lotto_fixtures as $lotto_fixture)


            @include('_parts.grille',['grille'=>$lotto_fixture])

            {{--<div class="card">
                <a href="{{route('game',["id"=>$lotto_fixture->id])}}">
                <div class="card-inner">
                    <h5 class="card-title">{{$lotto_fixture->title}} </h5>
                    <h6 class="card-subtitle mb-2">of {{\Carbon\Carbon::parse($lotto_fixture->end_time)->format("d/m/Y")}}</h6>
                    <p class="card-text">End of validation : {{$lotto_fixture->end_time}}</p>
                    <a href="{{route('game',["id"=>$lotto_fixture->id])}}" class="h3 float-end"><i class="fas fa-arrow-right"></i></a>
                </div>
                </a>
            </div>--}}
        @endforeach
    @else
        <div class="text-center">
            <img src="{{asset('assets/images/no-data.png')}}">
        </div>
    @endif
@endsection
