<!doctype html>
<html {!! get_language_attributes() !!}>
{{--  <style>#pla_loader_custom{position:fixed;left:0;top:0;width:100%;height:100%;z-index:9999;background:url(http://35.246.238.69/wp-content/uploads/logo-m.png,) 50% 50% no-repeat #fff}</style>--}}
  @include('partials.head')
  <body @php(body_class())>
{{--    <div id="pla_loader_custom" style=""></div>--}}
    @php(wp_body_open())
    @php(do_action('get_header'))
    @include('partials.header')

    @if(!app\isMobile())
      <div class="container">
        @include('partials.featured-posts', ['featuredPosts' => $featuredPosts])
      </div>
      @include('partials.files', ['files' => $files])
    @endif

    <div class="wrap">
      <div class="row">
        <div class="@hasSection('sidebar') col-md-8 @else col-md-12 @endif">
          <div class="content">
            <main class="main">
              @yield('content')
            </main>
          </div>
        </div>
        @if(!app\isMobile())
          @hasSection('sidebar')
          <div class="col-md-4">
              <aside class="sidebar">
                <div class="sidebar-inner">
                  @yield('sidebar')
                </div>
              </aside>
          </div>
          @endif
        @endif
      </div>
    </div>

    @php(do_action('get_footer'))
    @include('partials.footer')

    @php(wp_footer())
  </body>
</html>
