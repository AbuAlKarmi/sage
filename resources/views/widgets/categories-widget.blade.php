<section class="widget card mb-3 categories-widget">
  <div class="card-body">
    <h5 class="card-title">
      {{$title}}
    </h5>
    <div class="body">
      <div class="content">
        <ul>
          @foreach($categories as $category)
            <li class="list-item">
              <a href="{{get_category_link($category->term_id)}}">
                {{$category->name}}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>
