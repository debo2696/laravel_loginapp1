@extends('layout')

@section('content')
<h1>Associative Array example</h1>

@foreach($levels as $l=>$l_value) 
    <li><span>Key: {{$l}} Value: {{$l_value}}</span></li>
@endforeach
@endsection 
