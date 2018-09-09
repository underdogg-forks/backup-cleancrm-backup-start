@extends('layouts.frontpages')

@section('content')

<main role="main" class="inner cover">
  <h1 class="cover-heading">Front Page</h1>
  <p class="lead">This is a Front Page</p>
  <p class="lead">
    <a href="{{url('admin')}}" class="btn btn-lg btn-secondary">Go To Admin Panel</a>
  </p>
</main>

@endsection