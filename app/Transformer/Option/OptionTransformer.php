<?php namespace GitoAPI\Transformer\Option;

use GitoAPI\Repositories\Options\Option;
use GitoAPI\Transformer\TransformerAbstract;

class OptionTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include.
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * @param $url
     * @var Option object
     */
    protected $url;

    /**
     * OptionTransformer constructor.
     * @param Option $url
     */
    function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Transform an user model
     * @param Option $option
     * @return array
     */
    public function transform(Option $option)
    {
        $payload = [
            'name' => $option->option_name,
            'links' => $this->formatImage($option->option_value),
        ];

        return $payload;
    }

    private function formatImage($string){
        list($image,$uri_1,$uri_2)=explode(',',$string);
        return [
            'image' => imagePath($this->url->option_value, $image,'promotions'),
            'href'  => $uri_1.'/'.$uri_2,
        ];
    }

}
