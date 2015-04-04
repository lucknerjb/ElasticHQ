<?php

namespace ElasticHQ\Http\Controllers;

use View;
use Input;
use Redirect;
use ElasticHQ\Http\Requests\AddClusterFormRequest;
use ElasticHQ\Domain\Clusters\Cluster;
use ElasticHQ\Domain\ES\ESClient;
use ElasticHQ\Domain\ClusterDetails\ClusterDetail;

class ClustersController extends BaseController {
   public function index()
   {
      $clusters = $this->currentAccount->clusters()->get();

      return view('clusters.index', compact('clusters'));
   }

   public function create()
   {
      return view('clusters.create');
   }

   public function store(AddClusterFormRequest $addClusterFormRequest)
   {
      $cluster = new Cluster(Input::all());

      // Try and connect to the cluster before we save it
      $connected = ESClient::pingCluster($cluster);
      if ($connected === false) {
         return Redirect::back(['error' => 'Unable to establish a connection']);
      }

      // Fetch some basic details about the cluster
      $rawInfo = ClusterDetail::fetchInfo($cluster);
      $info = ClusterDetail::formatInfo($rawInfo);
      $cluster->name = $info['name'];

      // Attempt to save the cluster
      $saved = $this->currentAccount->clusters()->save($cluster);
      if (!$saved) {
         return Redirect::back(['error' => 'Unable to save the cluster']);
      }

      return Redirect::to('/clusters');
   }

   public function show($clusterId)
   {
      $cluster = Cluster::findOrFail($clusterId);
      return view('clusters.show', compact('cluster'));
   }

   public function edit($cluterId)
   {
      return view('clusters.edit');
   }

   public function update($cluterId)
   {
   }
}
