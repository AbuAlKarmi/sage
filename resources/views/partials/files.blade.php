@if($files && count($files))
  <div class="container">
    <div class="row">
    @foreach($files as $file)
      <div class="col-md-4 col-sm-4 col-xs-6">

        <div class="card card-file mb-3">
          <div class="box-wrap" style="background-image:url({{$file['image']}})">
            <div class="featured-boxes-overlay">
              <div class="featured-boxes-thumbnails">
                <div class="featured-boxes-wrap">
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





{{--        <a class="card card-file mb-3" href="{{$file['url']}}">--}}
{{--          <div class="card-body file-preview">--}}
{{--            <img src="{{$file['image']}}" alt="{{$file['title']}}" class="img-fluid">--}}
{{--            <div class="file-title">--}}
{{--              <h3 class="mb-0 text-white font-weight-bold">{{$file['title']}}</h3>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </a>--}}
      </div>
    @endforeach

      <div class="col-md-4 col-sm-4 col-xs-6">

        <div class="card card-file mb-3">
          <div class="box-wrap" style="background-image:url('https://i2.wp.com/35.246.238.69/wp-content/uploads/WhatsApp-Image-2019-05-19-at-01.31.32.jpeg?zoom=2&resize=297%2C223')">
            <div class="featured-boxes-overlay">
              <div class="featured-boxes-thumbnails">
                <div class="featured-boxes-wrap">
                  <a href="{{get_post_permalink(6020)}}" class="box-style box-effect build">
                    <span>مرئي</span>

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
  </div>
@endif
