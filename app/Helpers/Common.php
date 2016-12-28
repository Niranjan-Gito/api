<?php
use \GitoAPI\Exceptions\NotFoundException;

if (!function_exists('validationFail')) {
    /**
     * allows you to easily apply a validation value to all failure
     *
     * @param Array $value
     * @return string
     */
    function validationFail($value)
    {
         return response()->json([
            'status' => 400,
            'message' => 'Validation failed',
            'errors' => $value],
            400);
    }
}

if (!function_exists('siteId')) {
    /**
     * get the set id from clint credentials and return the id
     *
     * @return int
     */
    function siteId()
    {
        //Get the clint ID from the request
        if(app('request')->user()) {
            $client_id = app('request')->user()->token()->client_id;
        }else {
            $client_id = app('request')->get('client_id');
        }

        //Get the Site from the clint ID
        $client = \Laravel\Passport\Client::where('id',$client_id)->select(['site_id'])->get();

        //Check the Site is null or exits
        if($client->first()->site_id != null)
        {
            return $client->first()->site_id;
        }

        throw new NotFoundException('precondition_failed');
    }
}

if (! function_exists('json')) {
    /**
     * Instantiate a Response class or make a json response.
     *
     * @param array $content
     * @return GitoAPI\Response\Response|\Illuminate\Http\JsonResponse
     */
    function json($content = [])
    {
        $factory = app(\GitoAPI\Response\Response::class);
        if (func_num_args() === 0) {
            return $factory;
        }
        return $factory->respond($content);
    }
}

if (!function_exists('gravatar')) {
    /**
     * Get the gravatar URL for given email
     *
     * @param $email
     * @param $size 20
     *
     * @return string URL
     */
    function gravatar($email, $size = 40)
    {
        return 'http://www.gravatar.com/avatar/' . md5( strtolower( trim( $email ) ) ) . '?d=identicon&s=' . $size ;
    }
}

if(!function_exists('percentage')){
    /**
     * Get the percentage of the feature
     *
     * @param $model
     * @param $feature
     *
     * @return string float
     */
    function percentage($model, $feature)
    {
        if (isset($model->{$feature})) {
            $total = $model->{$feature}->count();
            $totalClosed = $model->{$feature}->where('closed_at', '!=', null)->count();
            return ($totalClosed) ? ceil(($totalClosed * 100) / $total) : 0;
        }
        return 0;
    }
}

if(!function_exists('siteUrl')){
    /**
     * Get the URL of the Site/Client append URI and Value
     *
     * @param $uri
     * @param $value
     *
     * @return string
     */
    function siteUrl($uri, $value)
    {
        $domain = \GitoAPI\Repositories\Domains\Domain::where('site_id',siteId())->first();
        $domain = $domain->fqdn??'';
        return $domain.'/'.$uri.'/'.$value;
    }
}

if(!function_exists('siteName')){
    /**
     * Get the Site Name of the Site/Client append URI and Value
     *
     *
     * @return string
     */
    function siteName()
    {
        $domain = \GitoAPI\Repositories\Domains\Domain::where('site_id',siteId())->first();
        $domain = $domain->name??'';
        \Illuminate\Support\Facades\Config::set('app.name', $domain);
        return $domain;
    }
}

if(!function_exists('imagePath')){
    /**
     * Get the Image full path of the Site/Client append URI and Value
     * @param $base_url
     * @param $filename
     * @param $type
     * @param $size
     *
     * @return string
     */
    function imagePath($base_url,$filename,$type,$size=false)
    {
        switch ($type) {
            case 'products':
                if ($size == 's') {
                    return $base_url . '/' . $type . '/small/' . $filename;
                } elseif ($size == 'm') {
                    return $base_url . '/' . $type . '/medium/' . $filename;
                } elseif ($size == 'l') {
                    return $base_url . '/' . $type . '/large/' . $filename;
                } else {
                    return;
                }
                break;
            case 'category':
                return $base_url . '/promotions/' . $type . '/' . $filename;
                break;
            case 'promotions':
                return $base_url . '/' . $type . '/' . $filename;
                break;
        }

        return '';
    }
}