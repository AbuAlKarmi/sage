<?php
$postFeaturedImage = get_the_post_thumbnail_url(get_the_ID(), 'large');
$innerImage = get_field( "inner_image" );

if($innerImage && isset($innerImage['sizes']) && $innerImage['sizes']['large']){
  $postFeaturedImage = $innerImage['sizes']['large'];
}
?>

<article @php(post_class())>


  <main class="card">

    <div class="card-body">

      @if( isset($postFeaturedImage) && !empty($postFeaturedImage) )
        <img src="{{ $postFeaturedImage }}" class="img-fluid mb-0" alt="{{$title}}">
      @endif

      <div class="entry-content">
        @php(the_content())
      </div>

      @if( $posts && count($posts) )
      @php( wp_reset_postdata() )
      @endif

    </div>
  </main>

  <div class="posts-loop pt-3">
    <div class="row">
      <?php global $post; ?>
      @foreach($posts as $post)
        @php(setup_postdata($post))
        <div class="col-md-4 border-1 border-primary border-solid">
          @include('partials.content',['hideAuthorImage' => true])
        </div>
      @endforeach
      @php( wp_reset_postdata() )
    </div>
  </div>

{{--  @php(comments_template('/partials/comments.blade.php'))--}}
</article>
