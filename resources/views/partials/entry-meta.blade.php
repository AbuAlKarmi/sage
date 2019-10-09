<?php $authorPrefix = get_field('article_type', get_the_ID()); ?>
<div class="byline post-meta author vcard">
  <?php $coAuthors = explode(',',coauthors_posts_links(',', ',', null, null, false)); ?>
  <div class="d-flex information-wrapper">
    @if(!isset($hideAuthorInformation) || (isset($hideAuthorInformation) && !$hideAuthorInformation) )

      @if( !isset($hideAuthorImage) || (isset($hideAuthorImage) && !$hideAuthorImage) )
        <div class="d-inline-flex">
          @if(count($coAuthors) > 1)
            <span rel="author" class="author-image fn">
              <img src="{{get_theme_file_uri('/resources/assets/images/default-image.jpg') }}" alt="Metras">
            </span>
          @else
            <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="author-image fn">
              {!! get_avatar(get_the_author_meta('ID'), 55) !!}
            </a>
          @endif
        </div>
      @endif

      <div class="d-inline-flex">
        <div class="pl-2 pr-2 pb-2 justify-content-center">
          <div class="author-name has-link d-block">
            @if( isset($authorPrefix) && !empty($authorPrefix) )
              {{$authorPrefix}}:
            @endif
            {!! join($coAuthors, ', ') !!}
          </div>
          @if($mainCategory && count($mainCategory) && strtolower($mainCategory['url']) != 'uncategorized' )
            <div class="">
              <a href="{{$mainCategory['url']}}" class="btn btn-dark btn-sm btn-tag">{{$mainCategory['title']}}</a>
            </div>
          @endif
        </div>
      </div>
    @endif
  </div>
  <div class="share">
    @php( $postUrl = get_the_permalink(get_the_ID()) )
    {!!  do_shortcode("[Sassy_Social_Share url=\"$postUrl\"]")  !!}
  </div>
</div>
