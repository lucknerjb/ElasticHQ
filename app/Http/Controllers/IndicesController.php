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
   public function show($clusterId, $indiceName)
   {
      $cluster = Cluster::findOrFail($clusterId);
      $indice = $cluster->getIndice($indiceName);

      return view('indices.show', compact('cluster', 'indice', 'indiceName'));
   }
}
