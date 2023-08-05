<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class BaseResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($request->input('per_page') || $request->input('page')) {
            return [
                'data' => $this->getResourceForPagination(),
                'meta' => $this->paginationMeta(),
            ];
        }

        return [
            'data' => $this->getResourceForPagination(),
            'meta' => $this->getMeta(),
        ];
    }

    /**
     * Get a resource to convert its item to array representation.
     *
     * @return mixed
     */
    abstract protected function getResourceForPagination(): AnonymousResourceCollection;

    /**
     * Get the meta information.
     *
     * @return array
     */
    protected function getMeta()
    {
        return [
            'total' => $this->collection->count(),
        ];
    }

    /**
     * Get the pagination meta information.
     *
     * @return array
     */
    protected function paginationMeta()
    {
        return [
            'current_page' => $this->currentPage(),
            'per_page' => $this->perPage(),
            'total' => $this->total(),

            'from' => $this->firstItem(),
            'to' => $this->lastItem(),
            'last_page' => $this->lastPage(),

            'first_page_url' => $this->url(1),
            'prev_page_url' => $this->previousPageUrl(),
            'next_page_url' => $this->nextPageUrl(),
            'last_page_url' => $this->url($this->lastPage()),

            'links' => $this->paginationLinks(),
        ];
    }

    /**
     * Get the pagination links.
     *
     * @return array
     */
    protected function paginationLinks()
    {
        $currentPage = $this->currentPage();
        $lastPage = $this->lastPage();

        return [
            [
                'url' => $this->previousPageUrl(),
                'label' => '&laquo; Previous',
                'active' => $currentPage > 1,
            ],
            [
                'url' => $this->url($currentPage),
                'label' => $currentPage,
                'active' => true,
            ],
            [
                'url' => $this->nextPageUrl(),
                'label' => 'Next &raquo;',
                'active' => $currentPage < $lastPage,
            ],
        ];
    }
}
