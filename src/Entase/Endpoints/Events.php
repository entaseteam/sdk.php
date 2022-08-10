<?php

namespace Entase\Endpoints;

class Events extends \Entase\Endpoint
{
    public function __construct($client)
    {
        parent::__construct($client);
        $this->endpointURL = 'events';
    }
}