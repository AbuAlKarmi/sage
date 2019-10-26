<?php
if( !session_id()){
  session_start();
}
?>

@if(isset($_SESSION['fetchMoreFiles']) && $_SESSION['fetchMoreFiles'] )
  <?php
  $offset = $_SESSION['filesCounter'];
  $_SESSION['filesCounter'] +=1;

  $args = [
    'post_type'         => 'files',
    'offset'            => $offset,
    'posts_per_page'    => 1,
  ];
  $files = get_posts($args);
  $files = array_map(function($file){
    return [
      'title' => $file->post_title,
      'image' => get_the_post_thumbnail_url($file->ID, 'post-image-square'),
      'url'   => get_post_permalink($file->ID),
    ];
  }, $files);
  ?>
  @if(isset($files) && isset($files[0]))
    @include('partials.file', ['file' => $files[0]])
  @else
    <?php $_SESSION['fetchMoreFiles'] = false; ?>
  @endif
@endif
