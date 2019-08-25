{{--
  Template Name: Authors
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        @include('partials.page-header')
      </div>
      <div class="card-content">
        @include('partials.content-page')
      </div>
      <div class="authors-list">
        <div class="row">
          @foreach($authors as $author)
            <div class="col-md-3">

              <a class="card mb-3 text-decoration-none" href="{{ get_author_posts_url($author->ID) }}">
                <img class="card-img-top" alt="{{$author->display_name}}"
                     src="{{esc_url(aq_resize(get_avatar_url( $author->ID), 200, 150, true) ) }}" />
                <div class="card-body">
                  <h5 class="card-title mb-1">{{$author->display_name}}</h5>
                  <p class="card-text text-small text-muted">{!! get_the_author_meta('description', $author->ID) !!}</p>
                </div>
              </a>


            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endwhile
@endsection
