<?php

namespace ElasticHQ\Http\Controllers;

use View;
use Input;
use Redirect;
use ElasticHQ\Http\Requests\AddClusterFormRequest;
use ElasticHQ\Domain\Clusters\Cluster;
use ElasticHQ\Domain\ES\ESClient;
use ElasticHQ\Domain\ClusterDetails\ClusterDetail;

class IndicesController extends BaseController {
   public function index()
   {
      $cluster = Cluster::findOrFail($this->currentClusterId);
      $indices = $cluster->indice_details;

      return view('indices.index', compact('cluster', 'indices'));
   }

   public function show($indiceName)
   {
      $cluster = Cluster::findOrFail($this->currentClusterId);
      $indice = $cluster->getIndice($indiceName);

      // $this->pr($indice);

      return view('indices.show', compact('cluster', 'indice', 'indiceName'));
   }

   public function mappings($indiceName)
   {
      $cluster = Cluster::findOrFail($this->currentClusterId);
      $indice = $cluster->getIndice($indiceName);

      // $this->pr($indice);

      return view('indices.mappings', compact('cluster', 'indice', 'indiceName'));
   }

   public function manage($indiceName)
   {
      $cluster = Cluster::findOrFail($this->currentClusterId);
      $indice = $cluster->getIndice($indiceName);

      return view('indices.manage', compact('cluster', 'indice', 'indiceName'));
   }
}
