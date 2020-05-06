@extends('admin.layout')



@section('content')

<h1>Dashboard</h1>
<p>Usuario autenticado: <font color="#009A67"><strong>{{ Auth()->User()->name }}</strong> </font></p>

@stop