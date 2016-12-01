@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> New Client for user {{ $user->id }}</div>
                    <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('add_new_client',['user' => $user->id ]) }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}">
                                <label for="client_name" class="col-md-4 control-label">Your Name : </label>

                                <div class="col-md-6">
                                    <input id="client_name" type="text" class="form-control" name="client_name"
                                           value="{{ old('client_name') }}">

                                    @if ($errors->has('client_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('client_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label for="phone_number" class="col-md-4 control-label">Your Phone Number : Country code obligatory</label>

                                <div class="col-md-6">
                                    <input id="client_name" type="text" class="form-control" name="phone_number"
                                           placeholder="+xxx xxx xxx xxxx" value="{{ old('phone_number') }}">
                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Add Client
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
