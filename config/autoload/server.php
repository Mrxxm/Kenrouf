<?php

declare(strict_types=1);

use Hyperf\Server\Server;
use Hyperf\Server\Event;
use Swoole\Constant;

return [
    'mode' => SWOOLE_PROCESS,
    'servers' => [
        [
            'name' => 'http',
            'type' => 1,
            'host' => '0.0.0.0',
            'port' => 9601,
            'sock_type' => SWOOLE_SOCK_TCP,
            'callbacks' => [
                'request' => [\Xxm\HttpServer\Server::class, 'onRequest'],
            ],
        ],
    ],
    'settings' => [
        'enable_coroutine' => true,
        'worker_num' => 1
    ],
    'callbacks' => [
        'worker_start' => [Hyperf\Framework\Bootstrap\WorkerStartCallback::class, 'onWorkerStart'],
    ],
];
