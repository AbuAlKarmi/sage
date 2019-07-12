@extends('layouts.app')

@section('content')

  <div class="posts">

      @while (have_posts()) @php(the_post())
        @includeFirst(['partials.content-horizontal', 'partials.content'])
      @endwhile
  </div>

  {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection
