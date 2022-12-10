<?php

namespace Koalafacade\LazadaScrapper;

use Symfony\Component\Panther\Client;

class ScrapperBuilder
{
    public function __construct(protected readonly Client $client)
    {

    }
}