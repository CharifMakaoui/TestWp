@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> New WhatsApp Account </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('newWhatsAppAccount') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                                <label for="number" class="col-md-4 control-label">Your Phone Number : </label>

                                <div class="col-md-6">
                                    <input id="number" type="text" class="form-control" name="number"
                                           value="{{ old('number') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="col-md-4 control-label">Send Method : </label>

                                <div class="col-md-6">
                                    <select id="type" name="type" class="form-control">
                                        <option value="sms">SMS</option>
                                        <option value="voice">VOICE</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Send Verification
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
