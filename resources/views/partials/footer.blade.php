<footer class="footer">
  <div class="container">
    @php(dynamic_sidebar('sidebar-footer'))

    {!! do_shortcode('[instagram-feed num=4 cols=4]') !!}
  </div>
  <div class="bottom-footer">
    <div class="container text-center">
      <p class="text-secondary mb-0">{{ __('All rights reserved', 'sage' ) }}</p>
      <p class="text-muted">{{ date('Y') }}</p>
    </div>
  </div>
</footer>
