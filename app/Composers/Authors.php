<?php

namespace App\Composers;

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
        return ['members' => $this->authors()];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return array
     */
    public function authors()
    {
        $metras_authors = new WP_User_Query([
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

        $authors = new WP_User_Query([
            'role__not_in' => 'Administrator',
            'fields' => 'all',
            'order' => 'ASC',
            'meta_query' => [
                'relation'  => 'AND',
                [
                    'key'       => 'metras_member',
                    'compare'   => 'NOT EXISTS'
                ],
            ],
        ]);

        return ['metras' => $metras_authors->get_results(), 'authors'  => $authors->get_results() ] ;

    }
}
