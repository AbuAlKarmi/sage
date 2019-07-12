<header class="banner">
  <div class="top-header">
    <div class="container text-right">
      <ul class="list-inline unstyled-list mb-0">
        <li class="list-inline-item"><a href="#">@include('icons::social.facebook', ['width' => '15px', 'height' => '15px'])</a></li>
        <li class="list-inline-item"><a href="#">@include('icons::social.twitter', ['width' => '15px', 'height' => '15px'])</a></li>
        <li class="list-inline-item"><a href="#">@include('icons::social.soundcloude', ['width' => '15px', 'height' => '15px'])</a></li>
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="logo">
      <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    </div>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header>
