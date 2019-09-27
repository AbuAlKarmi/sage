@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    @alert(['type' => 'warning'])
      {{ __('Sorry, no results were found.', 'sage') }}
    @endalert

    {!! get_search_form(false) !!}
  @endif

  <div class="posts-infinite-scroll">
    @while(have_posts()) @php(the_post())
      @include('partials.content-horizontal')
    @endwhile
  </div>

  {!! App\bootstrap_pagination() !!}
@endsection
