<?php

use Monolog\Logger;

return array(
    'hosts' => array(
     'http://localhost:9200'
     ),
    'logPath' => 'path/to/your/elasticsearch/log',
    'logLevel' => Logger::INFO
);
