<?php
  $postFeaturedImage = get_the_post_thumbnail_url( get_the_ID(), 'post-image-square' );
?>



<article @php(post_class('card post-card mb-2 '))>
  <div class="category-link @foreach(get_the_category() as $category ) {{ $category->name  }} @endforeach">@php(the_category('inline'))</div>
  <div class="card-body">
    @if(get_the_subtitle(get_the_ID(), '','', false))
      <h6 class="card-subtitle mb-2 text-center">
        <a href="{{ get_permalink() }}" class="text-secondary text-decoration-none">
          {{ the_subtitle() }}
        </a>
      </h6>
    @endif
    <h5 class="card-title text-center text-textPrimary font-weight-bold">
      <a href="{{ get_permalink() }}" class="text-decoration-none">
        {!! $title !!}
      </a>
    </h5>
    @if( isset($postFeaturedImage) && !empty($postFeaturedImage) )
      <div class="card-image mb-2">
        <img src="{{ $postFeaturedImage }}" alt="{{strip_tags($title)}}">
      </div>
    @endif
      <a href="{{ get_permalink() }}" class="text-decoration-none">
        <p class="card-text">{!! App\the_excerpt_max_charlength(20) !!}</p>
      </a>
    @include('partials/entry-meta')
  </div>
</article>
