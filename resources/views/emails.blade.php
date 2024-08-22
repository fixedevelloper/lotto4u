@extends('bakend.layout')
@section('content')
    <div class="nk-block nk-block-lg">

        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Messages</h3>
                </div>
            </div><!-- .nk-block-between -->
        </div>
        <div class="card card-preview">
            <div class="card-inner">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom complet</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $item->contact->name }}</td>
                            <td>{{ $item->contact->email }}</td>
                            <td>{{ $item->message }}</td>
                            <td></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$messages->links('vendor.pagination.bootstrap-5')}}
            </div>
        </div>
    </div>
@endsection

