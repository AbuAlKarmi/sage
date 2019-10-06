<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')

  <body @php(body_class(App\isMobile() ? 'fancy-layout isMobile' : 'fancy-layout'))>
    @php(wp_body_open())
    @php(do_action('get_header'))
    @include('partials.header')

    <div class="container">
      <div class="wrap">
        <div class="content">
          <main class="main">
            @yield('content')
          </main>
        </div>
      </div>
    </div>

    @php(do_action('get_footer'))
    @include('partials.footer')

    @php(wp_footer())
  </body>
</html>
