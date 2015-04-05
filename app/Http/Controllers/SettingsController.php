<?php

namespace ElasticHQ\Http\Controllers;

use View;
use Input;
use Redirect;
use ElasticHQ\Http\Requests\AddClusterFormRequest;
use ElasticHQ\Domain\Clusters\Cluster;
use ElasticHQ\Domain\ES\ESClient;
use ElasticHQ\Domain\ClusterDetails\ClusterDetail;

class SettingsController extends BaseController
{
   public function show()
   {
      $account = $this->currentAccount;
      return view('settings.show', compact('account'));
   }
}
