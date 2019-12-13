<?php
$postFeaturedImage = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<article @php(post_class())>


  <main class="card p-4">

    <div class="card-body">
      <header>
        <h5 class="text-muted text-center">{{get_the_date('j F Y')}}</h5>
        @if(get_the_subtitle(get_the_ID(), '','', false))
          <h3 class="text-center text-secondary">{{ the_subtitle() }}</h3>
        @endif
        <h1 class="entry-title card-title text-center font-weight-bold mb-4">
          {!! $title !!}
        </h1>
      </header>

      @if( isset($postFeaturedImage) && !empty($postFeaturedImage) )
        <div class="post-image mb-4">
          <img src="{{ $postFeaturedImage }}" class="card-img-top img-responsive" alt="{{$title}}">
          <div class="text-muted"><small>{!! App\the_post_thumbnail_caption() !!}</small></div>
        </div>
      @endif

      <div class="post-horizontal-meta top-user-meta">
        @include('partials/entry-meta')
      </div>

      <div class="entry-content">
        @php(the_content())
      </div>
      <hr>
      <div class="post-horizontal-meta">
        @include('partials/entry-meta')
      </div>

      {!! the_tags('<div class="entry-meta text-right tags-content">',' • ','</div>'); !!}
    </div>
  </main>

{{--  @php(comments_template('/partials/comments.blade.php'))--}}
</article>


<div class="tooltip_templates">
  <span id="tooltip_content">
      @include('icons::social.twitter', ['width' => '20', 'height' => '20px'])
  </span>
  <div id="sharable-text"></div>
</div>


<div class="panleft-icon">

</div>
<div class="panright-icon">

</div>

<div class="my-popper" style="display:none;">
  <div class="d-flex justify-content-start">
    <button type="button" class="close" data-dismiss="popper" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="content">
    <div class="text-center">جاري التحميل...</div>
  </div>
</div>

