@extends('layout')

@section('content')

<pre>Ck listing</pre>
@foreach($cklist as $ck)
    {!!$ck->ck_text!!}<br></br><!--For diplaying content-->
@endforeach
@endsection