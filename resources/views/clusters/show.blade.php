<?php
   $clusterStatus = $cluster->details['status'];
   $statusLabel = 'label-info';

   if ($clusterStatus === 'yellow') {
      $statusLabel = 'label-warning';
   // } else if ($clusterStatus === 'orange') {
   } else {
      $statusLabel = 'label-danger';
   }
?>

@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>
         Cluster / <span class="text-muted">{!! $cluster->name !!}</span>

         @if ($currentUser->can('CLUSTERS.MANAGE'))
            <a href="/cluster/edit" class="btn btn-primary pull-right">Edit Cluster</a>
         @endif
      </h3>
      <div class="row">
         <section class="col-md-12">
            <div class="col-md-12">
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Nodes', 'value' => $cluster->details['nodes_count']])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Total Shards', 'value' => $cluster->details['shards_count']])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Indices', 'value' => $cluster->details['indices_count']])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Documents', 'value' => $cluster->details['docs_count']])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Size', 'value' => Helpers::bytesToHuman($cluster->details['store_size'])])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Deleted Docs', 'value' => $cluster->details['deleted_docs_count']])
               </div>
            </div>
         </section>

         <section class="col-md-6">
            <div class="panel panel-default">
               <div class="panel-heading">Cluster Health</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover">
                        <tbody>
                           <tr>
                              <td>Status</td>
                              <td><span class="label {!! $statusLabel !!}">{!! $cluster->details['status'] !!}</span></td>
                           </tr>
                           <tr>
                              <td># Nodes</td>
                              <td>{!! $cluster->details['nodes_count'] !!}</td>
                           </tr>
                           <tr>
                              <td># Data Nodes</td>
                              <td>{!! $cluster->details['data_only_nodes_count'] !!}</td>
                           </tr>
                           <tr>
                              <td># Primary Shards</td>
                              <td>{!! $cluster->details['primary_shards_count'] !!}</td>
                           </tr>
                           <tr>
                              <td># Replication Shards</td>
                              <td>{!! $cluster->details['replication_shards_count'] !!}</td>
                           </tr>
                           <tr>
                              <td># Total Shards</td>
                              <td>{!! $cluster->details['shards_count'] !!}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>

         <section class="col-md-6">
            <div class="panel panel-default">
               <div class="panel-heading">Indices</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Index</th>
                              <th># Docs</th>
                              <th>Primary Size</th>
                              <th># Shards</th>
                              <th># Replicas</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($cluster->indice_details as $indice)
                              <tr>
                                 <td><a href="/indices/{!! $indice['name'] !!}">{!! $indice['name'] !!}</a></td>
                                 <td>{!! $indice['docs_count'] !!}</td>
                                 <td>{!! Helpers::bytesToHuman($indice['primary_size']) !!}</td>
                                 <td>{!! $indice['shards_count'] !!}</td>
                                 <td>{!! $indice['replicas_count'] !!}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
@stop
