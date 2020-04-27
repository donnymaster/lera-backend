<!-- resources/views/chat.blade.php -->

@extends('layouts.app')

@section('content')

<input type="text" hidden id="id_broadcast" value="{{ $id }}" />

<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-comment"></span> Chat
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

@endsection
