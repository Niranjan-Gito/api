<?php namespace GitoAPI\Repositories\Options;

/**
 * Eloquent Option Repository
 *
 * @file OptionRepository.php
 */
class OptionRepository implements OptionRepositoryInterface
{
    /**
     * @var Option
     */
    private $option;

    /**
     * @param Option $option
     */
    function __construct(Option $option)
    {
        $this->option = $option;
    }

    /**
     * @param array $option_names
     *
     * @return mixed
     */
    public function getOptionValues(array $option_names)
    {
        return $this->option
            ->with(['optionHash'])
            ->whereIn('option_name', $option_names)
            ->active()
            ->get(['id','option_name', 'option_value']);
    }

    /**
     * @return mixed
     */
    public function get_s3image_url()
    {
        return $this->option
            ->where('option_name', 's3_image_path')
            ->select(['option_name','option_value'])
            ->first();
    }

}