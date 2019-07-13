@extends('layouts.app')

@section('content')

  <div class="card mb-4">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          {!! $author->image !!}
        </div>
        <div class="col-md-10">
          <h4 class="card-title text-secondary">{{$author->display_name}}</h4>
          <p class="card-text text-muted">{!! $author->bio !!}</p>
        </div>
      </div>
    </div>
  </div>

  <h4 class="text-muted mb-2">{{ sprintf(__('All articles posted by %s', 'sage'), $author->display_name) }}</h4>

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
