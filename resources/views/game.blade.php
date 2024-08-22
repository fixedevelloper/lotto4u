@extends('layout')
@section('title')  @endsection
@push('css')
    <link href="{{asset('assets/css/checkbutton.css')}}">
@endpush
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
                            <li> @if($is_then==1)
                                    <a class="btn btn-outline-danger btn-lg btn-block" href="{{route("resultat",['id'=>$lotto->id])}}"> Results</a>
                                @endif</li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div>
    <span id="address" hidden>{{$user}}</span>
    <span id="lotto_fixture_id" hidden>{{$lotto->id}}</span>
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">

                    {{--        <div class="table-responsive">
                                <table class="table table__wrap" id="table_game">
                                    <tbody>--}}
                                    @foreach($fixtures as $item)
                                        @php
                                            $fixture=\App\Helper\Helper::getFixture($item->fixture_id);

                                        @endphp
                                        <div class="row mt-3 grille" data-id="{{$item->id}}" data-fixture="{{$fixture->fixture_id}}">
                                            <div class="col-md-4 col-4">
                                                <span hidden id="card{{$item->id}}">{{$item->id}}</span>
                                                <span hidden id="fixt{{$fixture->fixture_id}}">{{$fixture->fixture_id}}</span>
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
                                                            <div><i class="fas fa-check"></i></div>
                                                        </label>

                                                    </a>
                                                    <a href="javascript:void(0);" class="point__box">
                                                        <input type="radio" name="{{$fixture->fixture_id}}" value="3" id="check3{{$item->id}}">
                                                        <label for="check3{{$item->id}}">
                                                            <span class="break">x</span>
                                                            <div><i class="fas fa-check"></i></div>
                                                        </label>

                                                    </a>
                                                    <a href="javascript:void(0);" class="point__box">
                                                        <input type="radio" name="{{$fixture->fixture_id}}" value="2" id="check2{{$item->id}}">
                                                        <label for="check2{{$item->id}}">
                                                            <span class="break">2</span>
                                                            <div><i class="fas fa-check"></i></div>
                                                        </label>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <div class="title">
                                                    <img class="img"
                                                         src="{{$fixture->team_away_logo}}">
                                                    {{$fixture->team_away_name}}
                                                </div>
                                            </div>
                                        </div>
                                     {{--   <tr class="table__items b__bottom">
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
                                                            <div><i class="fas fa-check"></i></div>
                                                        </label>

                                                    </a>
                                                    <a href="javascript:void(0);" class="point__box">
                                                        <input type="radio" name="{{$fixture->fixture_id}}" value="3" id="check3{{$item->id}}">
                                                        <label for="check3{{$item->id}}">
                                                            <span class="break">x</span>
                                                            <div> <i class="fas fa-check"></i></div>
                                                        </label>

                                                    </a>
                                                    <a href="javascript:void(0);" class="point__box">
                                                        <input type="radio" name="{{$fixture->fixture_id}}" value="2" id="check2{{$item->id}}">
                                                        <label for="check2{{$item->id}}">
                                                            <span class="break">2</span>
                                                            <div><i class="fas fa-check"></i></div>
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
                              {{--      </tbody>
                                </table>--}}
                            </div>

                    <div class="d-grid gap-2 mt-2 mb-5">
                        @if($is_then==1)
                            <a class="btn btn-outline-primary btn-lg btn-block" href="{{route("resultat",['id'=>$lotto->id])}}"> Results</a>
                        @else
                            <a class="btn btn-outline-success btn-lg btn-block" id="send_conbinaison"><i class="fa fa-spinner fa-spin" id="spinner_send"></i> Send with {{env("PRICE_GAME")}} FCFA</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("script")

    <script>
        $("#send_conbinaison").click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            console.log("reeeeee")
            jsonObj = [];
            $(".grille").each(function () {
/*                var id_card = '#card' + $(this).data('id')
                var id_ph = '#fixt' + $(this).data('fixture')*/
                item = {};
                item['id'] = $(this).data('id');
                item['value'] = $('input[name="'+$(this).data('fixture')+'"]:checked').val();
                jsonObj.push(item)
            });
       /*     $("#table_game>tbody>tr").each(function () {
                var row = $(this).closest('tr')[0];
                var id = row.cells[0].children[0].innerText;
                var id_ = row.cells[0].children[1].innerText;
                var value1= row.cells[1].children[0].children[0].children[0].checked;
                var value2= row.cells[1].children[0].children[1].children[0].checked;
                var value3= row.cells[1].children[0].children[2].children[0].checked;
                item = {};
                item['id'] = id;
                item['value'] = $('input[name="'+id_+'"]:checked').val();

                jsonObj.push(item)
            });*/
            console.log(JSON.stringify({data: jsonObj}))
            $.ajax({
                url: "{{ route('postGame') }}",
                type: "POST",
                dataType: "JSON",
                data: JSON.stringify({
                    ob: jsonObj, user: $('#address').text(),lotto_fixture_id:$('#lotto_fixture_id').text()}),
                success: function (data) {
                    toastr.success('Operation executed successfully', 'Success')
                    var fixture_id = data.id;
                    var url = "{{ route('home_payment', ['id' => ':id']) }}";
                    url = url.replace(':id', fixture_id);
                    window.location=url;
                },
                error: function (err) {
                    toastr.error('An error has occurred' + JSON.stringify((err.reponseText)),'Error')
                    setTimeout(function () {
                        $("#overlay").fadeOut(300);
                    }, 500);
                }
            });
        })
    </script>
@endpush
