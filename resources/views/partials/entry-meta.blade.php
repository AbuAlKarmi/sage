<div class="byline post-meta author vcard">
  <?php $coAuthors = explode(',',coauthors_posts_links(',', ',', null, null, false)); ?>
  <div class="d-flex information-wrapper">
    <div class="d-inline-flex">
      @if(count($coAuthors) > 1)
        <span rel="author" class="author-image fn">
          <img src="{{get_theme_file_uri('/resources/assets/images/default-image.jpg') }}" alt="">
        </span>
      @else
        <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="author-image fn">
          {!! get_avatar(get_the_author_meta('ID')) !!}
        </a>
      @endif
    </div>
    <div class="d-inline-flex">
      <div class="pl-2 justify-content-center">
        <div class="author-name has-link d-block">
          {!! join($coAuthors, ', ') !!}
        </div>
        @foreach( $subCategories as $category )
          <a href="{{$category['url']}}" class="btn btn-dark btn-sm btn-tag">
            {{$category['title']}}
          </a>
        @endforeach
      </div>
    </div>
  </div>
  <div class="share">
    @php( $postUrl = get_the_permalink(get_the_ID()) )
    {!!  do_shortcode("[Sassy_Social_Share url=\"$postUrl\"]")  !!}
  </div>
</div>
