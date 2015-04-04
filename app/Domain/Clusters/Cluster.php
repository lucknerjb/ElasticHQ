<?php

namespace ElasticHQ\Domain\Clusters;

use Illuminate\Database\Eloquent\Model;
use Elasticsearch\Client as ESClient;
use Monolog\Logger;
use Monolog\Handler\SyslogHandler;
use Monolog\Processor\IntrospectionProcessor;
use ElasticHQ\Domain\ClusterDetails\ClusterDetail;
use ElasticHQ\Domain\IndiceDetails\IndiceDetail;

class Cluster extends Model {
   protected $table = 'clusters';
   protected $fillable = ['name', 'endpoint', 'username', 'password', 'use_ssl', 'port'];
   protected $appends = ['url_slug'];

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
      $rawInfo = ClusterDetail::fetchInfo($this);
      return ClusterDetail::formatInfo($rawInfo);
   }

   public function getIndiceDetailsAttribute() {
      // Fetch some basic details about the cluster's indices
      $rawInfo = IndiceDetail::fetchInfo($this);
      return IndiceDetail::formatInfo($rawInfo);
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
      $rawInfo = IndiceDetail::fetchInfo($this);

      if (!$rawInfo['indices']) {
         return false;
      }

      if (!$rawInfo['indices'][$indiceName]) {
         return false;
      }

      return $rawInfo['indices'][$indiceName];
   }
}
