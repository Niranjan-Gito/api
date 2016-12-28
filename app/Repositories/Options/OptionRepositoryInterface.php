<?php namespace GitoAPI\Repositories\Options;

/**
 * Interface OptionRepositoryInterface
 * @package GitoAPI\Repositories\Options
 */
interface OptionRepositoryInterface
{
    /**
     * @param array $option_names
     * @return mixed
     */
    public function getOptionValues(array $option_names);

    /**
     * @return mixed
     */
    public function get_s3image_url();

} 