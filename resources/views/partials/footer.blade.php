<footer class="footer" id="footer">
  <div class="container">
    @php(dynamic_sidebar('sidebar-footer'))
    @if(!is_home())
      {!! do_shortcode('[instagram-feed num=5 cols=5]') !!}
    @endif
  </div>
  <div class="bottom-footer">
    <div class="container text-center">
      @include('partials.social-links')
      <p class="text-secondary mb-0 mt-2">{{ __('All rights reserved', 'sage' ) }}</p>
      <p class="text-muted mb-0">{{ date('Y') }}</p>
      <nav class="nav-primary">
        @if (has_nav_menu('footer_navigation'))
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </nav>
    </div>
  </div>
</footer>
