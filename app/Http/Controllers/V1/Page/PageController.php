<?php
namespace GitoAPI\Http\Controllers\V1\Page;

use GitoAPI\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GitoAPI\Transformer\Pages\PageTransformer;
use GitoAPI\Repositories\Pages\Page;

/**
 * @resource Page
 *
 * Get the All the static pages details
 */
class PageController extends Controller
{
    /**
     * Get the all the pages details
     *
     * This can be an optional longer description of your API call, used within the documentation.
     *
     */
    public function index(Request $request)
    {
        return json()->withCollection(Page::get(), new PageTransformer());
    }

    /**
     * Get the single page by passing the page slug
     *
     * This can be an optional longer description of your API call, used within the documentation.
     * @parameters slug
     *
     */
    public function getPage(Request $request,$slug)
    {
        return json()->withItem(Page::where('identifier',$slug)->firstOrFail(), new PageTransformer());
    }
}