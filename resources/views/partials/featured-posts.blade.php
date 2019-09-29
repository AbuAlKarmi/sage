<style>
  /*.slide {*/
  /*  position: relative;*/
  /*}*/

  /* progress bar */
  .slider-progress {
    width: 100%;
    height: 10px;
    background: rgba(255,255,255,0.5);
    position: absolute;
    top: 0;
    border-radius: 0;
  }
  .slider-progress .progress {
    width: 0%;
    height: 10px;
    background: #a3c4bc;
    border-radius: 0;
  }
  .carousel-caption{
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    bottom: auto;
    color: black;
    margin-top: -115px;
    direction: rtl;
  }
  .carousel{
    max-height: 550px;
    overflow: hidden;
  }
  .carousel-caption .card{
    height: 150px;
    display: flex;
    flex-flow: column;
    justify-content: center;
  }
  .carousel-caption .card-body{
    display: flex;
    flex-flow: column;
    align-content: center;
    justify-content: center;
  }

  .slider > .card > .card-body{
    max-height: 632px;
    overflow: hidden;
  }

  .slider-card-title{
    color: #282828;
  }

  [dir='rtl'] .slick-slide{
    float: left;
  }

</style>


@if($featuredPosts && count($featuredPosts))
  <div class="slider mb-3">

      <div class="card mb-3">
        <div class="card-body" style="direction: ltr;">
          <div class="carousel">

            @foreach( $featuredPosts as $post )
              <div class="slide">
                <img class="" alt="{{$post['title']}}" src="{{$post['image']}}" />
                <div class="carousel-caption d-md-block container category-{{$post['category']['id']}}">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-7">
                      <div class="card">
                        <div class="card-body text-center">
                          <a href="{{$post['url']}}" class="text-decoration-none">
                            @if($post['subtitle'])<h4 class="card-subtitle text-secondary mb-2 p-0">{{$post['subtitle']}}</h4>@endif
                            <h3 class="card-title slider-card-title m-0 p-0">{{$post['title']}}</h3>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
@endif
