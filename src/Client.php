<?php
namespace Grossum\Post;

use Guzzle\Service\Client as GuzzleClient;
use Guzzle\Service\Description\ServiceDescription;

class Client extends GuzzleClient
{
    public function __construct($api_key)
    {
        parent::__construct();
        // Set the service description
        $this->setDescription(ServiceDescription::factory(__DIR__.'/Resources/post.json'));
    }
}