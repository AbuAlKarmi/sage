<footer class="footer">
  <div class="container">
    @php(dynamic_sidebar('sidebar-footer'))
  </div>
  <div class="bottom-footer">
    <div class="container text-center">
      @include('partials.social-links')
      <p class="text-secondary mb-0 mt-2">{{ __('All rights reserved', 'sage' ) }}</p>
      <p class="text-muted">{{ date('Y') }}</p>
    </div>
  </div>
</footer>
