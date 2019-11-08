<header class="banner">
  <div class="top-header">
    <div class="container text-right">
      @include('partials.social-links')
    </div>
  </div>
  <div class="container">
    <button class="main-toggle-button menu-toggle btn btn-link d-inline-flex d-block d-sm-none" type="button">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
    </button>
    <div class="logo">
      <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    </div>
    <div id="header-menu">
      <div class="container">
        @if(!App\isMobile())
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
        @endif
        <div class="affix-menu navbar">
          <button class="menu-toggle btn btn-link d-inline-flex d-block d-sm-none" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
          </button>
          <div class="logo d-inline-flex">
            <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
          </div>
          <div class="d-inline-flex">
            <nav class="nav-primary">
              <button type="button" class="close menu-toggle d-block d-sm-none" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
              @endif

              @if(App\isMobile())
                <div class="mobile-menu-widget">
                  @php(dynamic_sidebar('mobile-menu-widget'))
                </div>
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
