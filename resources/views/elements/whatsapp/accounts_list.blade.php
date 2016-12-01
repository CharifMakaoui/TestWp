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
                    <div class="panel-heading padding_15-15"> My WhatsApp Accounts :
                        <a href="{{ URL::route('newAccountWhatsApp') }}">
                            <button class="btn btn-default pull-right margin_top_-5">
                                <span>New Account</span>
                            </button>
                        </a>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Login</th>
                                    <th>Expiration</th>
                                    <th>Kind</th>
                                    <th>Cost</th>
                                    <th>Currency</th>
                                    <th>Price Expiration</th>
                                </tr>
                                </thead>

                                @if(sizeof($accounts) > 0)
                                    <tbody>
                                    @foreach($accounts as $account)
                                        <tr>
                                            <th scope="row">{{ $account->id }}</th>
                                            <td>{{ $account->login }}</td>
                                            <td>{{ $account->expiration }}</td>
                                            <td>{{ $account->kind }}</td>
                                            <td>{{ $account->cost }}</td>
                                            <td>{{ $account->currency }}</td>
                                            <td>{{ $account->price_expiration }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @else
                                    <tr> No Whats App Account Fonded.</tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection