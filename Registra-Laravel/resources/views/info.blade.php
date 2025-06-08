@extends('layouts.app')

@section('title', __('messages.information'))

@section('content')
    <div class="container">
        <h1>{{ __('messages.information') }}</h1>
        <div class="content">

            <p>{{ __('messages.important_info') }}</p>
        </div>
@endsection