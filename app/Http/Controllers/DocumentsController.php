<?php

namespace ElasticHQ\Http\Controllers;

use View;
use Input;
use Redirect;
use Response;
use ElasticHQ\Http\Requests\AddClusterFormRequest;
use ElasticHQ\Domain\Clusters\Cluster;
use ElasticHQ\Domain\ES\ESClient;
use ElasticHQ\Domain\ClusterDetails\ClusterDetail;

class DocumentsController extends BaseController {
   public function index()
   {
      $cluster = Cluster::findOrFail($this->currentClusterId);

      // $this->pr($cluster->indice_details);

      return view('documents.index', compact('cluster'));
   }

   public function get_index_types() {
      $indiceName = Input::get('index');
      $cluster = Cluster::findOrFail($this->currentClusterId);
      $indice = $cluster->getIndice($indiceName);
      $types = array_keys($indice['mappings']);

      return view('partials.indice_type_options', compact('types'));
   }

   public function get_type_fields() {
      $indiceName = Input::get('index');
      $typeName = Input::get('type');
      $cluster = Cluster::findOrFail($this->currentClusterId);
      $indice = $cluster->getIndice($indiceName);
      $fields = array_keys($indice['mappings'][$typeName]);

      return view('partials.indice_type_fields_options', compact('fields'));
   }

   public function query()
   {
      $cluster = Cluster::findOrFail($this->currentClusterId);
      $filters = Input::all();

      $params = [];
      if (!isset($filters['index'])) { return ''; }

      if (!isset($filters['type'])) { return; }

      if (isset($filters['fields'])) {
         foreach($filters['fields'] as $field => $value) {
            if (empty($value)) { continue; }
            $params['body']['query']['match'][$field] = $value;
         }
      }

      $params['index'] = $filters['index'];
      $params['type'] = $filters['type'];
      $params['from'] = 0;
      $params['size'] = 100;
      $indice = $cluster->getIndice($params['index']);

      $client = ESClient::getClient($cluster->connection_url);
      $results = $client->search($params);

      if (isset($filters['json'])) {
         return Response::json($results);
      }

      // Do we have results
      $haveResults = false;
      if ($results['hits'] && $results['hits']['total'] > 0) {
         $haveResults = true;
         // $fields = array_keys($results['hits']['hits'][0]['_source']);
      }
      $fields = array_keys($indice['mappings'][$params['type']]);

      return view('documents.results', compact('fields', 'results', 'haveResults'));
   }
}
