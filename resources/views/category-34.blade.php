@extends('layouts.fancy')

@section('content')


  @if (! have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>

    {!! get_search_form(false) !!}
  @endif

  <div class="fancy-posts-loop">
    @include('partials.fancy-posts-list')
  </div>

  <div class="container">
    {!! get_the_posts_navigation() !!}
  </div>
@endsection
