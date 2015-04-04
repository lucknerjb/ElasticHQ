<?php

namespace ElasticHQ\Domain\ES;

use ElasticHQ\Domain\Clusters\Cluster;
use Elasticsearch\Client as ES;
use Monolog\Logger;
use Monolog\Handler\SyslogHandler;
use Monolog\Processor\IntrospectionProcessor;

class ESClient {
   public static function pingCluster(Cluster $cluster) {
      $client = self::getClient($cluster);
      $ping = $client->ping();

      return (bool) $ping;
   }

   public static function getClient(Cluster $cluster) {
      // Build a Monolog logger that uses the SyslogHandler
      $logger    = new Logger('log');
      $handler   = new SyslogHandler('my_user');
      $processor = new IntrospectionProcessor();

      $logger->pushHandler($handler);
      $logger->pushProcessor($processor);

      // Over-ride the client's logger object with your own
      $params['logging']   = true;
      // $params['logObject'] = $logger;
      $params['hosts'] = [$cluster->connection_url];
      $params['logPath'] = storage_path() . '/logs/elasticsearch.log';
      $params['logPermission'] = 0664;
      $params['guzzleOptions']['curl.options'][CURLOPT_CONNECTTIMEOUT] = 2.0;
      $client = new ES($params);

      return $client;
   }
}
