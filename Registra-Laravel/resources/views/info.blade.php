@extends('layouts.app')

@section('title', __('Information'))

@section('content')
<div class="container">
    <h1>{{ __('Information') }}</h1>
    <div class="content">
        <p>{{ __('Important information about our services.') }}</p>
    </div>
</div>
@endsection
