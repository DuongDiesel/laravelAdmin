@extends('layouts.master')

@section('title')
    Dashboard2-tkb
@endsection

@section('l1')
    class="active "
@endsection

@section('content')

<div id="app">
    <DateClick></DateClick> 
</div>

@endsection

@section('scripts')
    <script type="text/javascript" src="js/app.js"></script>
@endsection