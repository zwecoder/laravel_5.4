@extends('layout.master')
@section('title','About')
@section('content')
<div class="container">
    <div class="row">
    <h1> I am about page</h1>
    @if(count($persons)>0)
        @foreach($persons as $person)
            <ul>
                <li>{{$person}}</li>  
            </ul>
        @endforeach
    @endif
    </div>
</div>
        
@endsection  