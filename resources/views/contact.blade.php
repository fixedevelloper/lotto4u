@extends('bakend.layout')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Contacts</h3>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                      {{--          <li>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-search"></em>
                                        </div>
                                        <input type="text" class="form-control" id="default-04" placeholder="Quick search by id">
                                    </div>
                                </li>--}}
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('contacts',['download'=>'real']) }}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-file-download"></em></a>
                                    <a href="{{ route('contacts',['download'=>'real']) }}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-file-download"></em><span>Export</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div>
        <div class="card card-preview">
            <div class="card-inner">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom complet</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $item)
                        <tr>
                            <th scope="row"> {!! $loop->index+1 !!}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$contacts->links('vendor.pagination.bootstrap-5')}}
            </div>
        </div>
    </div>
@endsection

