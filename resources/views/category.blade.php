@extends('layouts.app')

@section('content')

  @include('partials.featured-posts', ['featuredPosts' => $featuredPosts])

  @include('partials.page-header')

  @if (! have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>

    {!! get_search_form(false) !!}
  @endif

  <div id="horizontal-posts-loop">
    @while(have_posts()) @php(the_post())
      @include('partials.content-horizontal')
    @endwhile
  </div>
  {!! get_the_posts_navigation() !!}
@endsection
