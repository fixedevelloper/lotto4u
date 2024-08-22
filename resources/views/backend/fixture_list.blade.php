@extends('layout')
@section('title') Looto resultats @endsection
@section('content')
    <h3 class="account__head mb__30">
        Liste des grilles de matchs
    </h3>

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="">
                <div class="custom_card casinoform__tabe">
                    <div class="cainoform__wrap">
                        <form id="form_grille">
                        <div class="row g-4">
                            <div class="col-xl-6">
                                <div class="casino__date">
                                    <h4 class="f__title">
                                        From
                                    </h4>
                                    <div class="calender-bar">
                                        <input value="{{$date_begin}}" name="date_begin" type="text" class="datepicker" placeholder="2023-2-2">
                                        <i class="icon-calender"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="casino__date">
                                    <h4 class="f__title">
                                        Until
                                    </h4>
                                    <div class="calender-bar">
                                        <input value="{{$date_end}}" name="date_end" id="grille_date" type="text" class="datepicker" placeholder="2023-2-2">
                                        <i class="icon-calender"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <table class="table mt-3" id="table_conbinaison">
                        <thead>
                        <tr>
                            <th>Date End</th>
                            <th>Title</th>
                            <th>Cagnote</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lis_fixtures as $fixture)
                          <tr>
                              <td>{{$fixture->end_time}}</td>
                              <td>{{$fixture->title}}</td>
                              <td>{{App\Helper\Helper::calculSoldeGrille($fixture->id)}} FCFA</td>
                              <td><a class="btn btn-outline-primary" href="{{route('result',['id'=>$fixture->id])}}">Detail</a></td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

