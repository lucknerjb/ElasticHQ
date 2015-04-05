<?php

namespace ElasticHQ\Domain\Clusters;

use Illuminate\Database\Eloquent\Model;
use ElasticHQ\Domain\ES\ESClient;
use Monolog\Logger;
use Monolog\Handler\SyslogHandler;
use Monolog\Processor\IntrospectionProcessor;
use ElasticHQ\Domain\ClusterDetails\ClusterDetail;
use ElasticHQ\Domain\IndiceDetails\IndiceDetail;

class Cluster extends Model {
   protected $table = 'clusters';
   protected $fillable = ['name', 'endpoint', 'username', 'password', 'use_ssl', 'port'];
   protected $appends = ['url_slug', 'connection_url', 'health', 'details', 'state', 'settings'];

   public function account() {
      return $this->belongsTo('ElasticHQ\Domain\Accounts\Account');
   }

   public function getUrlSlugAttribute() {
      if ($this->slug) {
         return "{$this->id}-{$this->slug}";
      } else {
         return $this->id;
      }
   }

   public function getDetailsAttribute() {
      // Fetch some basic details about the cluster
      $rawInfo = ClusterDetail::fetchInfo($this->connection_url);
      return ClusterDetail::formatInfo($rawInfo);
   }

   public function getStateAttribute() {
      $client = ESClient::getClient($this->connection_url);
      $state = $client->cluster()->state();

      return $state;
   }

   public function getHealthAttribute() {
      $client = ESClient::getClient($this->connection_url);
      $health = $client->cluster()->health();

      return $health;
   }

   public function getSettingsAttribute() {
      $client = ESClient::getClient($this->connection_url);
      $settings = $client->cluster()->getSettings();

      return $settings;
   }

   public function getIndiceDetailsAttribute() {
      $output = [];

      $indices = array_keys($this->state['routing_table']['indices']);

      // Fetch some basic details about the cluster's indices
      foreach($indices as $indiceName) {
         $indice = new IndiceDetail($indiceName, $this->toArray());
         $output[] = $indice->parse();
      }

      return $output;
   }

   public function getConnectionUrlAttribute() {
      $urlString = '';

      // SSL?
      if (intval($this->use_ssl)) {
         $urlString = 'https://';
      } else {
         $urlString = 'http://';
      }

      // Auth?
      if (!empty($this->username) && !empty($this->password)) {
         $urlString .= "{$this->username}:{$this->password}@";
      }

      // Add the endpoint
      $urlString .= $this->endpoint;

      // Port?
      if (!empty($this->port)) {
         $urlString .= ":{$this->port}";
      }

      return $urlString;
   }

   public function getIndice($indiceName) {
      $indice = new IndiceDetail($indiceName, $this->toArray());
      return $indice->parse();
   }
}
