<?php

namespace Modules\FooBar\Http\ViewComposers;

use Illuminate\View\View;

class Invoices
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return mixed
     */
    public function compose(View $view)
    {
        // Override just the 'content' section
        //$view->getFactory()->startSection('content', view('foobar::customers.create'));

        // Override the whole file
        $view->setPath(view('foobar::invoices.invoice')->getPath());

        // Push to a stack
        //$view->getFactory()->startPush('scripts', view('foobar::script'));
    }
}
