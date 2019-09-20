@php
  $loopCounter = 1;
@endphp
@while(have_posts()) @php(the_post())
@php($mod = $loopCounter % 3)
@if($mod == 1)
  <section class="section section-small">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-6">@include('partials.content-fancy')</div>
@endif
@if($mod == 2)
              <div class="col-md-6">@include('partials.content-fancy')</div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
@if($mod == 0)
  <section class="section section-big">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          @include('partials.content-fancy')
        </div>
      </div>
    </div>
  </section>
@endif
@php($loopCounter++)
@endwhile

@if($mod == 1)
</div>
  </div>
  </div>
  </div>
  </section>
@endif



