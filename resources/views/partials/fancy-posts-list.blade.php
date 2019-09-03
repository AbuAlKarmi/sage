@php
  $loopCounter = 0;
@endphp
@while(have_posts()) @php(the_post())
  @if($loopCounter <= 5 )
    @php($loopCounter++)
    @if($loopCounter == 1 )
      {!! '<div class="section"><div class="container"><div class="row">' !!}
      {!! '<div class="col-md-4">' !!}
        @include('partials.content-fancy', ['isFirst' => true])
      {!! '</div>' !!}
    @else
      @if($loopCounter == 2)
        {!! '<div class="col-md-8"><div class="row">' !!}
      @endif

      {!! '<div class="col-md-6">' !!}
        @include('partials.content-fancy')
      {!! '</div>' !!}
      @if($loopCounter == 5)
        {!! '</div></div></div></div></div>' !!}
        @php($loopCounter= 0)
      @endif
    @endif
  @endif
@endwhile

@if($loopCounter > 5 )
{!! '</div></div><div>' !!}
@endif
@if($loopCounter != 0 )
{!! '</div></div></div><!-- End Row -->' !!}
@endif
