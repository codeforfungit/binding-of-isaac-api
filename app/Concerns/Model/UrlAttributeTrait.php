<?php

namespace App\Concerns\Model;

use ErrorException;

trait UrlAttributeTrait
{
    /**
     * Return a resource URL based on the model resource name.
     *
     * @throws \ErrorException
     * @return string
     */
    public function getUrlAttribute()
    {
        if (! property_exists($this, 'resource')) {
            throw new ErrorException(
                sprintf("Missing property 'resource' in %s required for %s", __CLASS__, __METHOD__)
            );
        }

        return route(
            'api.resource.show',
            ['resource' => $this->resource, 'id' => $this->attributes['id']]
        );
    }
}
