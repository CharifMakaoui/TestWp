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
                    <div class="panel-heading padding_15-15"> All Categories :
                        <a href="{{ URL::route('new_category') }}">
                            <button class="btn btn-default pull-right margin_top_-5">
                                <span>New Category</span>
                            </button>
                        </a>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>category name</th>
                                </tr>
                                </thead>

                                @if(sizeof($categories) > 0)
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $category->id }}</th>
                                            <th>{{ $category->category_name }}</th>
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