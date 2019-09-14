<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class EntryMeta extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'author',
        'index',
        'category',
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
            'hideAuthorInformation' => $this->isAuthorInformationHidden($view->getName()),
            'hideAuthorImage'       => $this->isAuthorImageHidden($view->getName()),
        ];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return string
     */
    public function isAuthorInformationHidden($view)
    {
        if ($view === 'author') {
            return true;
        }

        return false;
    }

    public function isAuthorImageHidden($view)
    {
        if ( $view === 'index' ) {
            return true;
        }
        return false;
    }
}
