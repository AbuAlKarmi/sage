{{--
  Template Name: Authors
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  <div class="">
    <div class="">
      <div class="text-center pt-4 pb-4">
        @include('partials.page-header')
      </div>
      <div class="card-content">
        @include('partials.content-page')
      </div>
      <div class="authors-list metras-authors">
        <div class="title">
          فريق متراس
        </div>
        <div class="row">
          @foreach($members['metras'] as $author)
            <div class="col-md-3">
              @include('partials.author-card', ['author' => $author])
            </div>
          @endforeach
        </div>
      </div>
      <div class="authors-list">
        <div class="row">
          @foreach($members['authors'] as $author)
            <div class="col-md-3">
              @include('partials.author-card', ['author' => $author])
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endwhile
@endsection
