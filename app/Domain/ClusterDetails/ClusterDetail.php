<?php

namespace ElasticHQ\Domain\ClusterDetails;

use ElasticHQ\Domain\Clusters\Cluster;
use ElasticHQ\Domain\ES\ESClient;
use Monolog\Logger;
use Monolog\Handler\SyslogHandler;
use Monolog\Processor\IntrospectionProcessor;

class ClusterDetail {
   public static function fetchInfo($connectionUrl) {
      $client = ESClient::getClient($connectionUrl);
      $info = $client->cluster()->stats();

      return $info;
   }

   public static function formatInfo($info) {
      $output = [];

      $output['name'] = $info['cluster_name'];
      $output['status'] = $info['status'];
      $output['indices_count'] = $info['indices']['count'];
      $output['shards_count'] = $info['indices']['shards']['total'];
      $output['nodes_count'] = $info['nodes']['count']['total'];
      $output['master_nodes_count'] = $info['nodes']['count']['master_only'];
      $output['master_data_nodes_count'] = $info['nodes']['count']['master_data'];
      $output['data_only_nodes_count'] = $info['nodes']['count']['data_only'];
      $output['primary_shards_count'] = $info['indices']['shards']['primaries'];
      $output['replication_shards_count'] = $info['indices']['shards']['replication'];
      $output['docs_count'] = $info['indices']['docs']['count'];
      $output['deleted_docs_count'] = $info['indices']['docs']['deleted'];
      $output['store_size'] = $info['indices']['store']['size_in_bytes'];

      return $output;
   }
}
