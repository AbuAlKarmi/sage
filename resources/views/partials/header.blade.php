<header class="banner">
  <div class="top-header">
    <div class="container text-right">
      @include('partials.social-links')
    </div>
  </div>
  <div class="container">
    <div class="logo">
      <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    </div>
    <div id="header-menu">
      <div class="container">
        <div class="standard-menu">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <nav class="nav-primary">
                @if (has_nav_menu('primary_navigation'))
                  {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
                @endif
              </nav>
            </div>
          </div>
        </div>
        <div class="affix-menu navbar">
          <div class="logo d-inline-flex">
            <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
          </div>
          <div class="d-inline-flex">
            <nav class="nav-primary">
              @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
              @endif
            </nav>
          </div>
          <div class="d-inline-flex">
            @include('partials.social-links', ['hasSearch' => true])
          </div>
        </div>
      </div>
    </div>

  </div>
</header>
