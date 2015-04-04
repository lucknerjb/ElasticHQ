<?php

namespace ElasticHQ\Domain\IndiceDetails;

use ElasticHQ\Domain\Clusters\Cluster;
use ElasticHQ\Domain\ES\ESClient;
use Monolog\Logger;
use Monolog\Handler\SyslogHandler;
use Monolog\Processor\IntrospectionProcessor;

class IndiceDetail {
   public static function fetchInfo(Cluster $cluster) {
      $client = ESClient::getClient($cluster);
      $info = $client->indices()->stats();

      return $info;
   }

   public static function formatInfo($info) {
      $output = [];

      foreach($info['indices'] as $indiceName => $indiceDetails) {
         $tmp = [];
         $tmp['name'] = $indiceName;
         $tmp['docs_count'] = $indiceDetails['primaries']['docs']['count'];
         $tmp['primary_size'] = $indiceDetails['primaries']['store']['size_in_bytes'];
         $tmp['shards_count'] = $info['_shards']['successful'];
         $tmp['replicas_count'] = $indiceDetails['primaries']['docs']['count'];

         $output[] = $tmp;
      }

      return $output;
   }
}
