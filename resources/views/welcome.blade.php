@extends('layouts.app')

@section('content')


<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 
<h1>Monboncoin</h1>
</div>

@endsection