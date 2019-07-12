@extends('layouts.main')

@section('content')
{{--  @include('partials.page-header')--}}

  @if (! have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>

    {!! get_search_form(false) !!}
  @endif

  <div class="posts-loop">
    <div class="row">
      @while (have_posts()) @php(the_post())
        <div class="col-md-6">
          @includeFirst(['partials.content-'.get_post_type(), 'partials.content'])
        </div>
      @endwhile
    </div>
  </div>

{{--  {!! do_shortcode('[ajax_load_more id="9950436970" container_type="div" post_type="post"]') !!}--}}
  {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection
