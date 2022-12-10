<?php

namespace Koalafacade\LazadaScrapper;

use Koalafacade\LazadaScrapper\Enums\Client;
use Koalafacade\LazadaScrapper\Enums\RequestMethod;
use Symfony\Component\Panther\Client as PantherClient;

class LazadaScrapper
{
    public function __construct(protected readonly PantherClient $client)
    {
        // Who's has been said PHP has been died
        // they don't know we're still makin' money with
        // PHP
    }

    public static function createClient(Client $to = Client::Firefox): static
    {
        $client = match ($to) {
            Client::Chrome => PantherClient::createChromeClient(),
            default => PantherClient::createFirefoxClient()
        };

        return new LazadaScrapper(client: $client);
    }

    public function createRequest(RequestMethod $method, string $to)
    {
        $this->client->request(method: $method->value, uri: $to);

        return new ScrapperBuilder(client: $this->client);
    }
}
