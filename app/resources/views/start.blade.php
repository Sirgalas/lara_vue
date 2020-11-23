@extends('layouts.app',['title'=>'start'])

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">Standart Vue+Laravel</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="#1" class="btn btn-secondary" type="button">component</a>
                    <a href="#2" class="btn btn-secondary" type="button">Vue Blade</a>
                    <a href="#3" class="btn btn-secondary" type="button">Ajax</a>
                    <a href="#4" class="btn btn-secondary" type="button">Line</a>
                    <a href="#5" class="btn btn-secondary" type="button">Pie</a>
                    <a href="#6" class="btn btn-secondary" type="button">Line Two</a>
                    <a href="#7" class="btn btn-secondary" type="button">Socket Chart</a>
                    <a href="#8" class="btn btn-secondary" type="button">Chat</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="owl-carousel owl-theme mt-5">
                <div class="row m-2 item" data-hash="1">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#1 Example component</h2>
                                <laravel-component></laravel-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2 item" data-hash="2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#2 Передача данных в Vue из Blade</h2>
                                <prop-component :urldata="{{json_encode($url_data)}}"></prop-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2 item" data-hash="3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#3 Передача данных в Vue Ajax</h2>
                                <ajax-component :urldata="{{json_encode($url_data)}}"></ajax-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2 item" data-hash="4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#4 Передача данных в Chart.js Vue Ajax</h2>
                                <chart-component></chart-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2 item" data-hash="5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#5 Передача данных в Chart.js Vue Ajax Pie</h2>
                                <pie-component></pie-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2 item" data-hash="6">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#6 Передача данных в Chart.js Vue Ajax Two line</h2>
                                <charline-component></charline-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2 item" data-hash="7">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#7 Передача данных в Chart.js Vue Ajax Socked</h2>
                                <socket-component></socket-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2 item" data-hash="8">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">#8 Chat</h2>
                                <chat-component></chat-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
