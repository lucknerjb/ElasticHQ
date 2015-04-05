<?php

namespace ElasticHQ\Http\Controllers;

use View;
use Input;
use Redirect;
use ElasticHQ\Http\Requests\AddClusterFormRequest;
use ElasticHQ\Domain\Clusters\Cluster;
use ElasticHQ\Domain\ES\ESClient;
use ElasticHQ\Domain\ClusterDetails\ClusterDetail;

class MappingsController extends BaseController {
   public function show($clusterId, $indiceName, $typeName)
   {
      $cluster = Cluster::findOrFail($clusterId);
      $indice = $cluster->getIndice($indiceName);

      if (!isset($indice['mappings'][$typeName])) {
         return Redirect::to('/clusters');
      }
      $mapping = $indice['mappings'][$typeName];

      return view('mappings.show', compact('cluster', 'indice', 'indiceName', 'typeName', 'mapping'));
   }
}
