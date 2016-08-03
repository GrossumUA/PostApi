<?php

namespace Grossum\Post\Plugin;

use Guzzle\Common\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Adds a token to all requests sent from a client.
 */
class TokenAuthPlugin implements EventSubscriberInterface
{
    /** @var string $token */
    private $token;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'command.before_prepare' => [
                'onBeforePrepare',
                255
            ]
        ];
    }

    /**
     * Add token
     *
     * @param Event $event
     */
    public function onBeforePrepare(Event $event)
    {
        $event['command']->set('apiKey', $this->token);
    }
}
