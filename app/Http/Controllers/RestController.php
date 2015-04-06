<?php

namespace ElasticHQ\Http\Controllers;

use View;
use Input;
use Redirect;
use Response;
use Session;
use ElasticHQ\Http\Requests\AddClusterFormRequest;
use ElasticHQ\Domain\Clusters\Cluster;
use ElasticHQ\Domain\ES\ESClient;
use ElasticHQ\Domain\ClusterDetails\ClusterDetail;

class REstController extends BaseController {
   public function raw_api()
   {
      return view('rest.raw_api');
   }

   public function raw_call()
   {
      $section = Input::get('section');
      $call = Input::get('call');
      $client = ESClient::getClient($this->currentCluster['connection_url']);
      $title = '';
      $response = [];
      $url = '';

      // ============ Cluster Health
      if ($section === 'clusters' && $call === 'health') {
         $title = 'Cluster Health';
         $url = "{$this->currentCluster['connection_url']}/_cluster/health";
         $response = $client->cluster()->health();
      }

      // ============ Cluster State
      else if ($section === 'clusters' && $call === 'state') {
         $title = 'Cluster State';
         $url = "{$this->currentCluster['connection_url']}/_cluster/state";
         $response = $client->cluster()->state();
      }

      // ============ Cluster Settings
      else if ($section === 'clusters' && $call === 'settings') {
         $title = 'Cluster Settings';
         $url = "{$this->currentCluster['connection_url']}/_cluster/settings";
         $response = $client->cluster()->getSettings();
      }

      // ============ Cluster Ping
      else if ($section === 'clusters' && $call === 'ping') {
         $title = 'Cluster Ping';
         $url = "{$this->currentCluster['connection_url']}";
         $response = $client->info();
      }

      // ============ Nodes Info
      else if ($section === 'nodes' && $call === 'info') {
         $title = 'Node Info';
         $url = "{$this->currentCluster['connection_url']}/_nodes/info";
         $response = $client->nodes()->info();
      }

      // ============ Nodes Stats
      else if ($section === 'nodes' && $call === 'stats') {
         $title = 'Node Stats';
         $url = "{$this->currentCluster['connection_url']}/_nodes/stats";
         $response = $client->nodes()->stats();
      }

      // // ============ Nodes CPU Threads
      // else if ($section === 'nodes' && $call === 'cputhreads') {
      //    $title = 'Cluster CPU Threads';
      //    $url = "{$this->currentCluster['connection_url']}/_nodes/cputhreads";
      //    $response = $client->nodes()->hot_threads([
      //       'type' => 'cpu',
      //       'threads' => 10
      //    ]);
      // }

      // ============ Indices Aliases
      else if ($section === 'indices' && $call === 'aliases') {
         $title = 'Indice Aliases';
         $url = "{$this->currentCluster['connection_url']}/_aliases";
         $response = $client->indices()->getAliases();
      }

      // ============ Indices Settings
      else if ($section === 'indices' && $call === 'settings') {
         $title = 'Indice Settings';
         $url = "{$this->currentCluster['connection_url']}/_settings";
         $response = $client->indices()->getSettings();
      }

      // ============ Indices Stats
      else if ($section === 'indices' && $call === 'stats') {
         $title = 'Indice Stats';
         $url = "{$this->currentCluster['connection_url']}/_stats";
         $response = $client->indices()->stats();
      }

      // ============ Indices Status
      else if ($section === 'indices' && $call === 'status') {
         $title = 'Indice Status';
         $url = "{$this->currentCluster['connection_url']}/_status";
         $response = $client->indices()->status();
      }

      // ============ Indices Segments
      else if ($section === 'indices' && $call === 'segments') {
         $title = 'Indice Segments';
         $url = "{$this->currentCluster['connection_url']}/_segments";
         $response = $client->indices()->segments();
      }

      // ============ Indices Mappings
      else if ($section === 'indices' && $call === 'mappings') {
         $title = 'Indice Mappings';
         $url = "{$this->currentCluster['connection_url']}/_mapping";
         $response = $client->indices()->getMapping();
      }

      // ============ Indices Refresh
      else if ($section === 'indices' && $call === 'refresh') {
         $title = 'Indices Refresh Scheduled';
         $url = "{$this->currentCluster['connection_url']}/_refresh";
         $response = $client->indices()->refresh();
      }

      // ============ Indices Refresh
      else if ($section === 'indices' && $call === 'flush') {
         $title = 'Indices Flushed';
         $url = "{$this->currentCluster['connection_url']}/_flush";
         $response = $client->indices()->flush();
      }

      // ============ Indices Refresh
      else if ($section === 'indices' && $call === 'optimize') {
         $title = 'Indices Optimized';
         $url = "{$this->currentCluster['connection_url']}/_optimize";
         $response = $client->indices()->optimize();
      }

      // ============ Indices Refresh
      else if ($section === 'indices' && $call === 'clear_cache') {
         $title = 'Indices Cache Cleared';
         $url = "{$this->currentCluster['connection_url']}/_cache/clear";
         $response = $client->indices()->clearCache();
      }

      return view('rest.raw_call', compact('title', 'url', 'response'));
   }
}
