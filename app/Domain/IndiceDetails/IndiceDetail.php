<?php

namespace ElasticHQ\Domain\IndiceDetails;

use Illuminate\Database\Eloquent\Model;
use ElasticHQ\Domain\Clusters\Cluster;
use ElasticHQ\Domain\ES\ESClient;
use Monolog\Logger;
use Monolog\Handler\SyslogHandler;
use Monolog\Processor\IntrospectionProcessor;

class IndiceDetail extends Model {
   protected $appends = ['name', 'stats', 'settings', 'status', 'segments', 'mappings', 'aliases'];
   public $indiceName;
   public $cluster;

   public function __construct($indiceName, Array $cluster) {
      $this->indiceName = $indiceName;
      $this->cluster = $cluster;
   }

   public function getNameAttribute() {
      return $this->indiceName;
   }

   public function getStatsAttribute() {
      $client = ESClient::getClient($this->cluster['connection_url']);
      $stats = $client->indices()->stats(['index' => [$this->indiceName]]);

      return $stats;
   }

   public function getSettingsAttribute() {
      $client = ESClient::getClient($this->cluster['connection_url']);
      $settings = $client->indices()->getSettings(['index' => [$this->indiceName]]);

      return $settings;
   }

   public function getStatusAttribute() {
      $client = ESClient::getClient($this->cluster['connection_url']);
      $status = $client->indices()->status(['index' => [$this->indiceName]]);

      return $status;
   }

   public function getSegmentsAttribute() {
      $client = ESClient::getClient($this->cluster['connection_url']);
      $segments = $client->indices()->segments(['index' => [$this->indiceName]]);

      return $segments;
   }

   public function getMappingsAttribute() {
      $client = ESClient::getClient($this->cluster['connection_url']);
      $mappings = $client->indices()->getMapping(['index' => [$this->indiceName]]);

      return $mappings;
   }

   public function getAliasesAttribute() {
      $client = ESClient::getClient($this->cluster['connection_url']);
      $aliases = $client->indices()->getAliases(['index' => [$this->indiceName]]);

      return $aliases;
   }

   public static function fetchInfo($connectionUrl, $indiceName) {
      $client = ESClient::getClient($connectionUrl);
      $params = ['index' => [$indiceName]];
      $stats = $client->indices()->stats($params);
      $settings = $client->indices()->getSettings();

      return [
         'stats' => $stats,
         'settings' => $settings
      ];
   }

   public function parse() {
      $output = [];
      $indice = $this->toArray();
      $indiceDetails = $indice['stats']['indices'][$this->name];

      // echo '<pre>';
      // print_r($output);
      // die;

      $output['name'] = $this->name;
      $output['docs_count'] = $indiceDetails['primaries']['docs']['count'];
      $output['deleted_docs_count'] = $indiceDetails['primaries']['docs']['deleted'];
      $output['primary_size'] = $indiceDetails['primaries']['store']['size_in_bytes'];
      $output['total_size'] = $indice['stats']['_all']['total']['store']['size_in_bytes'];
      $output['shards_count'] = $indice['settings'][$this->name]['settings']['index']['number_of_shards'];
      $output['replicas_count'] = $indice['settings'][$this->name]['settings']['index']['number_of_replicas'];

      // echo '<pre>';
      // print_r($this->toArray());
      // die;

      $output['mappings'] = [];
      if (isset($indice['mappings'][$this->name])) {
         foreach($indice['mappings'][$this->name]['mappings'] as $type => $mapping) {
            $output['mappings'][$type] = $mapping['properties'];
         }
      }

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
