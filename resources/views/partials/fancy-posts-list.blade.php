@php
  $loopCounter = 0
@endphp
@while(have_posts()) @php(the_post())
@if($loopCounter < 5 )
  @if($loopCounter == 0 )
    <div class="row section">
      <div class="col-md-4">
        @include('partials.content-fancy', ['isFirst' => true])
      </div>
      @else
        @if($loopCounter == 1)
          <div class="col-md-8"><div class="row">
              @endif
              <div class="col-md-6">
                @include('partials.content-fancy')
              </div>
              @if($loopCounter == 4)
            </div></div>
        @endif
      @endif
      @php($loopCounter++)
      @else
    </div><!-- End Row -->
    @php($loopCounter = 0)
    @endif
    @endwhile

    @if($loopCounter > 4 )
    </div></div>
    @endif
    @if($loopCounter != 0 )
    </div></div><!-- End Row -->
  @endif
