<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover" />
  @include('partials.favicon')
  @php(wp_head())

  <style id="metras-categories">
    @foreach($categories as $category)
    .posts-loop .post-card:hover .category-link{!! $category['selector'] !!} {
      background-color: {{$category['color']}};
    }
    .banner .nav > .menu-item{!! $category['selector'] !!} > a:hover,
    .menu-main-menu-container > .nav > .menu-item.current-menu-item{!! $category['selector'] !!} > a,
    .current-menu-item{!! $category['selector'] !!} > a{
      background-color: {{$category['color']}};
      color: #FFF;
    }
    .carousel-caption{!! $category['selector'] !!} .slider-progress .progress{
      background-color: {{$category['color']}} !important;
    }

    body{!! $category['selector'] !!} .slider > .card > .card-body{
      background-color: {{$category['color']}};
    }
    .archive.category{!! $category['selector'] !!} .posts-infinite-scroll .post-vertical:first-child{
      border-color: {{$category['color']}};
    }
    @endforeach
  </style>

<?php
 $themeOptions = get_option('metras_settings_option');
?>

  <script>
    window.SOUNDCLOUD_CLIENT_ID = '<?php echo isset($themeOptions) && isset($themeOptions['soundcloud_client_id']) ? $themeOptions['soundcloud_client_id'] :  ''; ?>';
    window.SOUNDCLOUD_RESOLVE_URL = '<?php echo isset($themeOptions) && isset($themeOptions['soundcloud_resolve_url']) ? $themeOptions['soundcloud_resolve_url'] :  ''; ?>';
    window.ALLOW_LINK_PREVIEW = false;
  </script>
</head>
