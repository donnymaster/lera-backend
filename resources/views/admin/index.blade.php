@extends('layouts.admin')

@section('title', 'Головна')

@section('active-main', 'selected')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Головна</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Головна</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Статистика</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content-main')

<h1>Main</h1>

@endsection
