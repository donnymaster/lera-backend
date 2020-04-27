@extends('layouts.user-side')

@section('title', $broadcast->name)

@section('header-custom', 'h-auto-2')

@section('content-main')

@if ($is_valid)
    @if ($status == 'у прямому ефірі')
        @section('css')
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            .chat
            {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            ul li.border-b {
                border-bottom: 2px solid #81b928;
            }

            .chat li
            {
                margin-bottom: 10px;
                padding-bottom: 5px;
                border-bottom: 1px dotted #B3A9A9;
            }

            .chat li.left .chat-body
            {
                margin-left: 60px;
            }

            .chat li.right .chat-body
            {
                margin-right: 60px;
            }


            .chat li .chat-body p
            {
                margin: 0;
                color: #777777;
            }

            .panel .slidedown .glyphicon, .chat .glyphicon
            {
                margin-right: 5px;
            }

            .panel-body
            {
                overflow-y: scroll;
                height: 400px;
            }

            ::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: #F5F5F5;
            }

            ::-webkit-scrollbar
            {
                width: 12px;
                background-color: #F5F5F5;
            }

            ::-webkit-scrollbar-thumb
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                background-color: #555;
            }

          </style>
        @endsection
    @endif
@endif

<div class="container">
    <div class="account-breadcrumbs">
        <a href="{{ route('broadcasts.index') }}" class="link-breadcrumbs">
            Трансляції
        </a>
        <img src="{{ asset('img/chevron-right.png') }}" alt="arrow-right" class="right-arrow">
        <a href="#" class="link-breadcrumbs">
            {{ $broadcast->name }}
        </a>
    </div>
  </div>

  @if ($is_valid)
    @if ($status == 'в майбутньому')
        <input type="text" hidden id="date" value="{{ $date_start }}">
        <div class="container">
            <h2 class="title-info title-info-m">
                <div class="mr-30">До початку залишилося</div> <div class="date"></div>
            </h2>
            <div class="video-upcoming">
                {!!
                    $video
                !!}
            </div>
        </div>
    @endif

    @if ($status == 'у прямому ефірі')
    <div class="container">
        <div class="wrapped-broadcast">
            <div class="video-broadcast">
                {!!
                    $video
                !!}
            </div>
        </div>
        <div class="chat-broadcast">
            <input type="text" hidden id="id_broadcast" value="{{ $broadcast->identifier }}" />
            <div id="app">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-comment"></span> Чат
                            </div>
                            <div class="panel-body">
                                <chat-messages :messages="messages" :user="{{ Auth::user() }}"></chat-messages>
                            </div>
                            <div class="panel-footer">

                                <chat-form
                                v-on:messagesent="addMessage"
                                :user="{{ Auth::user() }}"
                                ></chat-form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endif

  @else
    <div class="container h-100vh">
        <h2 class="title-info">
            Трансляція була видалена
        </h2>
    </div>
  @endif

@endsection
 @if ($is_valid)
    @if ($status == 'в майбутньому')
        @section('script')
            <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
            <script src="{{ asset('js/timezz.min.js') }}"></script>
            <script>
                new TimezZ('.date', {
                    date: document.querySelector('#date').getAttribute('value'),
                    days: 'днів',
                    hours: 'годин',
                    minutes: 'хвилин',
                    seconds: 'секунд',
                    numberTag: 'span',
                    letterTag: 'i',
                    stop: false, // stop the countdown timer?
                });
            </script>
        @endsection
    @endif
@endif

@if ($is_valid)
    @if ($status == 'у прямому ефірі')
        @section('script')

        @endsection
    @endif
@endif
