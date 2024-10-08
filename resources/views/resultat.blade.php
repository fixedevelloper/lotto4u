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
        <div class="col-md-8 mt-5">
            <div class="card card_dark">
                <div class="card-body">
                    <div class="height__table">
                        <div class="main__table">
                            <div class="table-responsi">
                                <table class="table table__wrap" id="table_game">
                                    <tbody>
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
                                                    <a href="javascript:void(0);" class="point__box" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                                                        <input disabled type="radio" @if($fixture->score_ft_home>$fixture->score_ft_away) checked @endif value="1" id="check1{{$item->id}}">
                                                        <label for="check1{{$item->id}}">
                                                            <span class="break">1</span>
                                                            <div><i class="fa fa-check"></i></div>
                                                        </label>

                                                    </a>
                                                    <a href="javascript:void(0);" class="point__box" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                                                        <input disabled @if($fixture->score_ft_home==$fixture->score_ft_away) checked @endif type="radio" name="{{$fixture->fixture_id}}" value="3" id="check3{{$item->id}}">
                                                        <label for="check3{{$item->id}}">
                                                            <span class="break">x</span>
                                                            <div> <i class="fa fa-check"></i></div>
                                                        </label>

                                                    </a>
                                                    <a href="javascript:void(0);" class="point__box" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                                                        <input disabled type="radio" @if($fixture->score_ft_home<$fixture->score_ft_away) checked @endif name="{{$fixture->fixture_id}}" value="2" id="check2{{$item->id}}">
                                                        <label for="check2{{$item->id}}">
                                                            <span class="break">2</span>
                                                            <div><i class="fa fa-check"></i></div>
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
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("script")
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script>
        ;(function($) {

            var MERCADO_JS = {
                init: function(){
                    this.mercado_countdown();
                },
                mercado_countdown: function() {
                    if($(".mercado-countdown").length > 0){
                        $(".mercado-countdown").each( function(index, el){
                            var _this = $(this),
                                _expire = _this.data('expire');
                            _this.countdown(_expire, function(event) {
                                $(this).html( event.strftime('<span><b>%D</b> Days</span> <span><b>%-H</b> Hrs</span> <span><b>%M</b> Mins</span> <span><b>%S</b> Secs</span>'));
                            });
                        });
                    }
                },

            }

            window.onload = function () {
                MERCADO_JS.init();
             /*   $('.mercado-countdown').countdown({
                    date: '{{Carbon\Carbon::parse($lotto->end_time)->format('Y/m/d h:i:s')}}',
                    day: 'Day',
                    days: 'Days'
                });*/
            }

        })(window.Zepto || window.jQuery, window, document);
    </script>

@endpush
