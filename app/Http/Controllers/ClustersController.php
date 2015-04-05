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
      $connected = ESClient::pingCluster($cluster->connection_url);
      if ($connected === false) {
         return Redirect::back(['error' => 'Unable to establish a connection']);
      }

      $clusterDetails = $cluster->toArray();
      $cluster->name = $clusterDetails['state']['cluster_name'];

      // Attempt to save the cluster
      $saved = $this->currentAccount->clusters()->save($cluster);
      if (!$saved) {
         return Redirect::back(['error' => 'Unable to save the cluster']);
      }

      return Redirect::to('/clusters');
   }

   public function show($clusterId = null)
   {
      if (is_null($clusterId)) {
         $clusterId = $this->currentCluster['id'];
      }

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

   public function select_cluster() {
      $clusterId = Input::get('cluster_id');

      // Check that the user owns the cluster
      $cluster = Cluster::where(['account_id' => $this->currentAccount->id, 'id' => $clusterId])->first();

      if (!$cluster) {
         return Response::json(['status' => 'error']);
      }

      Session::put('currentCluster', $cluster->toArray());
      return Response::json(['status' => 'success']);
   }
}
