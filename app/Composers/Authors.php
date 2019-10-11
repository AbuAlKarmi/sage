<?php

namespace App\Composers;

use function PHPSTORM_META\type;
use Roots\Acorn\View\Composer;
use WP_User_Query;

class Authors extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'authors',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @param  array $data
     * @param  \Illuminate\View\View $view
     * @return array
     */
    public function with($data, $view)
    {
        return [
            'metras'    => $this->metrasAuthors(),
            'authors'   => $this->authors(),
        ];
    }


    public function metrasAuthors(){
        $metrasAuthors = new WP_User_Query([
            'role__not_in' => 'Administrator',
            'orderby' => 'metras_member',
            'order' => 'ASC',
            'meta_query' => [
                [
                    'key'     => 'metras_member',
                    'value' => '1',
                ],
            ],
        ]);
        $page = get_query_var('paged') ? (int) get_query_var('paged') : 1;

        if( $page > 1 ){
            return [];
        }
        return $metrasAuthors->get_results();
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return array
     */
    public function authors()
    {
        $users_per_page = 16;
        // grab the current page number and set to 1 if no page number is set
        $page = get_query_var('paged') ? (int) get_query_var('paged') : 1;


        $count_args  = array(
            'role__not_in' => 'Administrator',
            'fields'    => 'all',
            'number'    => 999999
        );
        $user_count_query = new WP_User_Query($count_args);
        $user_count = $user_count_query->get_results();
        // Total Users
        $total_users = $user_count ? count($user_count) : 1;

        $total_pages = 1;
        $offset = $users_per_page * ($page - 1);
        $total_pages = ceil($total_users / $users_per_page);


        $authors = new WP_User_Query([
            'role__not_in' => 'Administrator',
            'fields' => 'all',
            'order' => 'ASC',
            'number' => $users_per_page,
            'offset'    => $offset,
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key'       => 'metras_member',
                    'compare'   => 'NOT EXISTS'
                ],
                [
                    'key'       => 'metras_member',
                    'compare'   => 'NOT IN',
                    'value'     => true,
                    'type'      => 'BINARY'
                ],
            ],
        ]);

        return [
            'results'  => $authors->get_results(),
            'meta'  => [
                'count' => $total_users,
                'pages' => [
                    'total'     => $total_pages,
                    'current'   => $page,
                ]
            ]
        ];

    }
}
