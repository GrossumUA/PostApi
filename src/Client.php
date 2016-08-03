<?php

namespace Grossum\Post;

use Grossum\Post\Plugin\TokenAuthPlugin;
use Guzzle\Service\Client as GuzzleClient;
use Guzzle\Service\Description\ServiceDescription;

class Client extends GuzzleClient
{
    /**
     * @param string $api_key
     */
    public function __construct($api_key)
    {
        parent::__construct();
        // Set the service description
        $this->setDescription(ServiceDescription::factory(__DIR__.'/Resources/post.json'));
        $this->addSubscriber(new TokenAuthPlugin($api_key));
    }
}
