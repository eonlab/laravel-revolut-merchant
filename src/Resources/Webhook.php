<?php

namespace Eonlab\RevolutMerchant\Resources;

class Webhook extends Resource
{
    /**
     * The Revolut merchant web-hook endpoint
     * 
     * @var string
     */
    const ENDPOINT = '/webhooks';

    /**
     * Set the web-hook
     *
     * @param string $url
     * @return array The request body
     * @throws \tbclla\RevolutMerchant\Exceptions\MerchantException
     */
    public function set(string $url = null, array $events)
    {
        return $this->client->post(self::ENDPOINT, [
            'json' => [
                'url' => $url,
                'events' => $events
            ]
        ]);
    }

    /**
     * Revoke the web-hook
     *
     * @return array The request body
     * @throws \tbclla\RevolutMerchant\Exceptions\MerchantException
     */
    public function revoke(string $id)
    {
        return $this->client->delete(self::ENDPOINT, $id);
    }

    /**
     * Retrieve the web-hooks
     *
     * @return array The request body
     * @throws \tbclla\RevolutMerchant\Exceptions\MerchantException
     */
    public function retrieve()
    {
        return $this->client->get(self::ENDPOINT);
    }
}
