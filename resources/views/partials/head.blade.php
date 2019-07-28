<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @php(wp_head())

  <style>
    @foreach($categories as $category)
     .posts-loop .post-card:hover .category-link{!! $category['selector'] !!} { background-color: {{$category['color']}};}
    @endforeach
  </style>
</head>
