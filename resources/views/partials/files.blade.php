@if($files && count($files))
  <div class="container">
    <div class="row">
    @foreach($files as $file)
      <div class="col-md-4 col-sm-4 col-xs-6 daftar">

        <div class="card card-file mb-3">
          <div class="box-wrap" style="background-image:url({{$file['image']}})">
            <div class="featured-boxes-overlay">
              <div class="featured-boxes-thumbnails">
                <div class="featured-boxes-wrap">
                  <div class="overlay"></div>
                  <a href="{{$file['url']}}" class="box-style box-effect build">
                    <span>{{$file['title']}}</span>

                    <div class="box-border-wrap">
                      <div class="box-line" data-line="top"></div>
                      <div class="box-line" data-line="left"></div>
                      <div class="box-line" data-line="bottom"></div>
                      <div class="box-line" data-line="right"></div>
                    </div><!-- .box-border-wrap -->

                    <div class="box-line" data-line="top"></div>
                    <div class="box-line" data-line="left"></div>
                    <div class="box-line" data-line="bottom"></div>
                    <div class="box-line" data-line="right"></div>
                  </a><!-- .box-style -->
                </div><!-- .featured-boxes-wrap -->
              </div><!-- .featured-boxes-thumbnails -->
            </div><!-- .featured-boxes-overlay -->
          </div>
        </div>
      </div>
    @endforeach

  </div>
@endif
