<div class="byline post-meta author vcard">
  <div class="d-flex justify-content-center">
    <div class="d-inline-flex">
      <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="author-image fn">
        {!! get_avatar(get_the_author_meta('ID')) !!}
      </a>
    </div>
    <div class="d-inline-flex">
      <div class="pl-2 justify-content-center">
        <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="author-name">
          {{ get_the_author() }}
        </a>

      </div>
    </div>
  </div>
</div>
