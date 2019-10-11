{{--
  Template Name: Authors
--}}


<?php
  $metrasTeam = array_chunk($metras, 4);
  $metrasAuthors = array_chunk($authors['results'], 4);
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


  <div class="pagination-links d-flex justify-content-end">
    <?php
    ob_start();

    // grab the current query parameters
    $query_string = $_SERVER['QUERY_STRING'];

    // The $base variable stores the complete URL to our page, including the current page arg

    // if in the admin, your base should be the admin URL + your page
    $base = admin_url('your-page-path') . '?' . remove_query_arg('p', $query_string) . '%_%';

    // if on the front end, your base is the current page
    //$base = get_permalink( get_the_ID() ) . '?' . remove_query_arg('p', $query_string) . '%_%';

    $big = 999999999; // need an unlikely integer

    $pagination = paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $authors['meta']['pages']['total'],
      'type' => 'array',
      'prev_text'          => __('<span></span> السابق', 'sage'),
      'next_text'          => __('التالي <span></span>', 'sage'),
      'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>'
    ) );
    ?>

      @if ( ! empty( $pagination ) )
      <ul class="pagination">
        @foreach ( $pagination as $key => $page_link )
        <li class="page-item<?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>"><?php echo str_replace( 'page-numbers', 'page-link', $page_link ); ?></li>
        @endforeach
      </ul>
      @endif
    <?php		echo ob_get_clean(); ?>
  </div>

@endsection
