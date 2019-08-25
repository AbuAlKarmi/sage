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
        return ['authors' => $this->authors()];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return array
     */
    public function authors()
    {
        $user_query = new WP_User_Query( [
            'role__not_in' => 'Administrator'
        ] );

        return $user_query->get_results();

    }
}
