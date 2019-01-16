@extends('layouts.app')

@section('content')
    <div class="container" style="margin:0 auto; margin-top: 50px;margin-bottom: 50px;">
        <chat :user="{{ Auth::user() }}"></chat>
    </div>
@endsection