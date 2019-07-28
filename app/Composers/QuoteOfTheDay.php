<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class QuoteOfTheDay extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'widgets.quote-of-the-day',
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
        return ['post' => $this->getRandomQuote()];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return string
     */
    public function getRandomQuote()
    {
        $postArgs = [
            'post_type' => 'quote',
            'orderby'   => 'rand',
            'posts_per_page' => 1,
        ];

        $posts = get_posts($postArgs);

        return $posts;
    }
}
