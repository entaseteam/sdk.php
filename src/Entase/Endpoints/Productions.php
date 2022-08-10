<?php

namespace Entase\Endpoints;

class Productions extends \Entase\Endpoint
{
    public function __construct($client)
    {
        parent::__construct($client);
        $this->endpointURL = 'productions';
    }
}