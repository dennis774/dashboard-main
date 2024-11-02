@extends('general.index') 

@section('content')

@include('roles.admin.content')

@endsection

@section('scripts')

@include('roles.admin.bar_chart')

@endsection