<?php

namespace Wosh\Api;

use Wosh\Config\XpyConfig;
use Wosh\Protocol\XpyRpcClient;

class RpcService{

    protected $client;

    public function __construct(XpyConfig $config, $debug = 0)
    {
        $this->client = new XpyRpcClient($config, $debug);
    }

}
