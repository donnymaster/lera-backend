@extends('layouts.user-side')

@section('title', 'Трансляції')

@section('header-custom', 'logo-broadcast')

@section('content-footer')
    <div class="container">
        <div class="index__offer">
            <h1 class="offer__title">
                Трансляції
            </h1>
            <h3 class="offer_desc">
                Користуючись нашим сайтом у вас з'являється можливість
                полегшити своє життя. При перегляді спортивних
                трансляцій у вас є можливість коментувати матч в
                прямому ефірі, адміністрація бере на себе стежити за
                тим щоб в чаті співрозмовники вели себе порядно. Так
                само адміністрація буде вам повідомляти в прямому ефірі
                що відбувається в спортивному змаганні.
            </h3>
        </div>
    </div>
@endsection

@section('content-main')

<div class="container">
    <div class="two-column">
        <div class="two-column__filter">

              @include('blocks.filter-broadcasts')

        </div>
        <div class="two-column__elements">

                <div class="elements__header">
                    <div class="title-header">
                        Трансляції
                    </div>

                    @include('blocks.sort-items')

                </div>
                <div class="broadcast-wrapped">

                    @include('blocks.broadcast-item')

                    @include('blocks.broadcast-item')

                </div>

        </div>
    </div>
  </div>
@endsection

