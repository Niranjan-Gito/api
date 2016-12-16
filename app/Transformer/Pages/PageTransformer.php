<?php namespace GitoAPI\Transformer\Pages;

use GitoAPI\Transformer\TransformerAbstract;
use GitoAPI\Repositories\Pages\Page;

class PageTransformer extends TransformerAbstract
{
    /**
     * Transform an Page model
     * @param Page $page
     * @return array
     */
    public function transform(Page $page)
    {
        $payload = [
            'title'      => $page->title,
            'content'     => $page->content,
            'position'     => $page->position,
            'meta_title'  => $page->meta_title,
            'meta_keyword' => $page->meta_keyword,
            'meta_description' => $page->meta_description,
            'created'   => datetime($page->created_at),
            'updated'   => datetime($page->created_at),
        ];

        if ($fields = $this->getPartialFields()) {
            $payload = array_only($payload, $fields);
        }

        return $payload;
    }
}
