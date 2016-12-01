@extends('layouts.app')

@section('content')
    <style>
        .margin_top_-5 {
            margin-top: -5px;
        }

        .padding_15-15 {
            padding: 15px 15px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading padding_15-15"> My Clients :
                        <a href="{{ URL::route('auth_new_client_view') }}">
                            <button class="btn btn-default pull-right margin_top_-5">
                                <span>New Client</span>
                            </button>
                        </a>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>country</th>
                                    <th>phone number</th>
                                </tr>
                                </thead>

                                @if(sizeof($clients) > 0)
                                    <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <th scope="row">{{ $client->id }}</th>
                                            <th>{{ $client->client_name }}</th>
                                            <th>{{ $client->country_code }}</th>
                                            <th>{{ $client->phone_number }}</th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @else
                                    <tr> No Client Fonded.</tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection