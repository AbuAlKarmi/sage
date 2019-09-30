{{--
  Template Name: Authors
--}}


<?php
  $metrasTeam = array_chunk($members['metras'], 4);
  $metrasAuthors = array_chunk($members['authors'], 4);
?>

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
      <div class="authors-list ">
        @foreach( $metrasTeam as $row )
          <div class="authors-row metras-authors">
            <div class="title">
              فريق متراس
            </div>
            <div class="row">
              @foreach($row as $author)
                <div class="col-md-3">
                  @include('partials.author-card', ['author' => $author])
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
      <div class="authors-list">
        @foreach( $metrasAuthors as $row )
          <div class="authors-row">
            <div class="row">
              @foreach($row as $author)
                <div class="col-md-3">
                  @include('partials.author-card', ['author' => $author])
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  @endwhile
@endsection
