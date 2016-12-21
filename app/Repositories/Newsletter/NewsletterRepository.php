<?php
namespace GitoAPI\Repositories\Newsletter;

use GitoAPI\Newsletter;

class NewsletterRepository implements NewsletterRepositoryInterface
{
    protected  $newsletter;

    function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }

}