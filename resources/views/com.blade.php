@extends('adminLayout.master');
@section('admin')
    <h1>HELLO {{$passData}}</h1>
    <x-button :passDatas="$passData" />
    <x-post :passDatas="$passData">
        
        Post hx
        <x-slot name="he">
            vent slot mdng
        </x-slot>
    </x-post>
@endsection