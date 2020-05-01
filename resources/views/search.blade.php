@extends('layouts.app')


<?php
$str = esc_attr( trim( get_query_var('s') ));
$wp_user_query = new WP_User_Query(
  array(
    'search' => "*".$str."*",
    'search_columns' => array(
      'user_login',
      'user_nicename',
      'user_email',
    ),

  ) );
$users = $wp_user_query->get_results();

//search usermeta
  $searchTerms = explode(" ", $str);
  $query = [
    'relation' => 'OR',
    'full_match' => [
      'key' => 'full_match',
      'relation' => 'AND',
      [
        'key' => 'first_name',
        'value' => $searchTerms[0],
        'compare' => 'LIKE'
      ],
      [
        'key' => 'last_name',
        'value' => $searchTerms[count($searchTerms) - 1],
        'compare' => 'LIKE'
      ],
    ]
  ];

  $subQuery = [
    'relation' => 'OR',
  ];

  foreach ($searchTerms as $term){
    $subQuery[] = [
      'key' => 'first_name',
      'value' => $term,
      'compare' => 'LIKE'
    ];
    $subQuery[] = [
      'key' => 'last_name',
      'value' => $term,
      'compare' => 'LIKE'
    ];
  }
  $query['sub_match'] = $subQuery;
$wp_user_query2 = new WP_User_Query(
  array(
    'meta_query' => $query,
    'orderby' => [
      'full_match' => 'DESC',
    ]
  )
);

$users2 = $wp_user_query2->get_results();
$totalusers_dup = array_merge($users, $users2);
$totalusers = array_unique($totalusers_dup, SORT_DESC);
$metrasAuthors = array_chunk($totalusers, 4);
$hasAuthors = isset($metrasAuthors) && count($metrasAuthors) > 0;
?>

@section('content')
  @include('partials.page-header')

  @if($hasAuthors)
    <br />
    <h3>كتاب متراس</h3>
    <div class="authors-list">
      @foreach( $metrasAuthors as $row )
        <div class="authors-row">
          <div class="row">
            @foreach($row as $author)
              <div class="col-md-3">
                @include('partials.author-card', ['author' => $author])
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  @endif

  @if (! have_posts())
    <div class="card">
      <div class="card-body">
        @alert(['type' => 'warning'])
        {{ __('Sorry, no results were found.', 'sage') }}
        @endalert

        {!! get_search_form(false) !!}
      </div>
    </div>
  @else
    @if($hasAuthors)
      <h3>المواضيع</h3>
    @endif
    <div class="posts-infinite-scroll">
      @while(have_posts()) @php(the_post())
      @include(App\cardPartial())
      @endwhile
    </div>

    {!! App\bootstrap_pagination() !!}
  @endif


@endsection
