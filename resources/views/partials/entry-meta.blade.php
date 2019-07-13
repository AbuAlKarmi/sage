<div class="byline post-meta author vcard">
  <div class="d-flex information-wrapper">
    <div class="d-inline-flex">
      <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="author-image fn">
        {!! get_avatar(get_the_author_meta('ID')) !!}
      </a>
    </div>
    <div class="d-inline-flex">
      <div class="pl-2 justify-content-center">
        <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="author-name d-block">
          {{ get_the_author() }}
        </a>
        @foreach( $subCategories as $category )
          <a href="{{$category['url']}}" class="btn btn-dark btn-sm">
            {{$category['title']}}
          </a>
        @endforeach
      </div>
    </div>
  </div>
</div>
