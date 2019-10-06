@extends('layouts.fancy')

@section('content')
  @if (! have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>

    {!! get_search_form(false) !!}
  @endif

  <div class="fancy-page-header text-center mt-5">
    <h2 class="font-weight-bold">{!! single_cat_title( '', false ) !!}</h2>
  </div>


  <div class="fancy-posts-loop">
      @include('partials.fancy-posts-list')
  </div>

  <div class="container">
    {!! App\bootstrap_pagination() !!}
  </div>
@endsection
