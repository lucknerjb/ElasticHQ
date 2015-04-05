<?php

namespace ElasticHQ\Domain\NodeDetails;

use Illuminate\Database\Eloquent\Model;
use ElasticHQ\Domain\Clusters\Cluster;
use ElasticHQ\Domain\ES\ESClient;
use Monolog\Logger;
use Monolog\Handler\SyslogHandler;
use Monolog\Processor\IntrospectionProcessor;

class NodeDetail extends Model {
   protected $appends = ['identifier', 'stats'];
   public $nodeName;
   public $nodeIdentifier;
   public $cluster;

   public function __construct($nodeIdentifier, Array $cluster) {
      $this->nodeIdentifier = $nodeIdentifier;
      $this->cluster = $cluster;
   }

   public function getIdentifierAttribute() {
      return $this->nodeIdentifier;
   }

   public function getStatsAttribute() {
      $client = ESClient::getClient($this->cluster['connection_url']);
      $stats = $client->nodes()->stats();

      return $stats['nodes'][$this->nodeIdentifier];
   }

   public function parse() {
      $output = [];
      $indice = $this->toArray();
      $indiceDetails = $indice['stats']['indices'][$this->name];

      $output['name'] = $this->name;
      $output['docs_count'] = $indiceDetails['primaries']['docs']['count'];
      $output['deleted_docs_count'] = $indiceDetails['primaries']['docs']['deleted'];
      $output['primary_size'] = $indiceDetails['primaries']['store']['size_in_bytes'];
      $output['total_size'] = $indice['stats']['_all']['total']['store']['size_in_bytes'];
      $output['shards_count'] = $indice['settings'][$this->name]['settings']['index']['number_of_shards'];
      $output['replicas_count'] = $indice['settings'][$this->name]['settings']['index']['number_of_replicas'];

      $output['search'] = [
         'query_total' => $indice['stats']['_all']['total']['search']['query_total'],
         'query_time' => $indice['stats']['_all']['total']['search']['query_time_in_millis'],
         'fetch_total' => $indice['stats']['_all']['total']['search']['fetch_total'],
         'fetch_time' => $indice['stats']['_all']['total']['search']['fetch_time_in_millis'],
      ];

      $output['indexing'] = [
         'index_total' => $indice['stats']['_all']['total']['indexing']['index_total'],
         'index_time' => $indice['stats']['_all']['total']['indexing']['index_time_in_millis'],
         'delete_total' => $indice['stats']['_all']['total']['indexing']['delete_total'],
         'delete_time' => $indice['stats']['_all']['total']['indexing']['delete_time_in_millis'],
      ];

      $output['get'] = [
         'get_total' => $indice['stats']['_all']['total']['get']['total'],
         'get_time' => $indice['stats']['_all']['total']['get']['time_in_millis'],
         'exists_total' => $indice['stats']['_all']['total']['get']['exists_total'],
         'exists_time' => $indice['stats']['_all']['total']['get']['exists_time_in_millis'],
         'missing_total' => $indice['stats']['_all']['total']['get']['missing_total'],
         'missing_time' => $indice['stats']['_all']['total']['get']['missing_time_in_millis'],
      ];

      $output['operations'] = [
         'refresh_total' => $indice['stats']['_all']['total']['refresh']['total'],
         'refresh_time' => $indice['stats']['_all']['total']['refresh']['total_time_in_millis'],
         'flush_total' => $indice['stats']['_all']['total']['flush']['total'],
         'flush_time' => $indice['stats']['_all']['total']['flush']['total_time_in_millis'],
      ];

      $output['merges'] = [
         'merge_total' => $indice['stats']['_all']['total']['merges']['total'],
         'merge_time' => $indice['stats']['_all']['total']['merges']['total_time_in_millis'],
         'merge_docs' => $indice['stats']['_all']['total']['merges']['total_docs'],
         'merge_size' => $indice['stats']['_all']['total']['merges']['total_size_in_bytes'],
      ];

      return $output;
   }
}
