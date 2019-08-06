<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')

  <body @php(body_class())>
    @php(wp_body_open())
    @php(do_action('get_header'))
    @include('partials.header')

    <div class="container">
      @include('partials.featured-posts', ['featuredPosts' => $featuredPosts])
    </div>
    @include('partials.files', ['files' => $files])

    <div class="wrap container">
      <div class="row">
        <div class="@hasSection('sidebar') col-md-8 @else col-md-12 @endif">
          <div class="content">
            <main class="main">
              @yield('content')
            </main>
          </div>
        </div>
        @hasSection('sidebar')
        <div class="col-md-4">
            <aside class="sidebar">
              @yield('sidebar')
            </aside>
        </div>
        @endif
      </div>
    </div>

    @php(do_action('get_footer'))
    @include('partials.footer')

    @php(wp_footer())
  </body>
</html>
