<?php
namespace GitoAPI\Http\Controllers\V1\Home;

use GitoAPI\Http\Controllers\Controller;
use GitoAPI\Repositories\Options\OptionRepositoryInterface;
use GitoAPI\Transformer\Option\OptionTransformer;
use Illuminate\Http\Request;
/**
 * @resource Page
 *
 * Get the All the static pages details
 */
class HomeController extends Controller
{
    /**
     * instance of OptionRepositoryInterface
     */
    protected $options;

    /**
     * Create a new controller instance.
     * @param OptionRepositoryInterface $options
     * @return Mixed
     */
    function __construct(OptionRepositoryInterface $options)
    {
        $this->options = $options;
    }

    /**
     * Get the all the resource details
     *
     * This can be an optional longer description of your API call, used within the documentation.
     *
     */
    public function index(Request $request)
    {
        $data = $this->options->getOptionValues(['banner','side_banner','promoted-deal']);
        return json()->withCollection($data, new OptionTransformer());
    }

    /**
     * Get the specified option from the resource details
     *
     * This can be an optional longer description of your API call, used within the documentation.
     *
     */
    public function show($option,Request $request)
    {
        $data = $this->options->getOptionValues([$option]);
        return json()->withCollection($data, new OptionTransformer($this->options->get_s3image_url()));
    }
}