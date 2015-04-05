@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>
         Clusters

         <a href="/clusters/create" class="btn btn-primary pull-right">Add Cluster</a>
      </h3>
      <div class="row">
         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>ID #</th>
                              <th>Name</th>
                              <th>Nodes</th>
                              <th>Shards</th>
                              <th>Indices</th>
                              <th>Documents</th>
                              <th>Size</th>
                              <th>&nbsp;</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if (count($clusters))
                              @foreach($clusters as $cluster)
                                 <tr>
                                    <td>{!! $cluster->id !!}</td>
                                    <td>{!! $cluster->name !!}</td>
                                    <td>{!! $cluster->details['nodes_count'] !!}</td>
                                    <td>{!! $cluster->details['shards_count'] !!}</td>
                                    <td>{!! $cluster->details['indices_count'] !!}</td>
                                    <td>{!! $cluster->details['docs_count'] !!}</td>
                                    <td>{!! Helpers::bytesToHuman($cluster->details['store_size']) !!}</td>
                                    <td>
                                       <a class="btn btn-primary btn-sm" href="/clusters/{!! $cluster->url_slug !!}">View Cluster</a>
                                    </td>
                                 </tr>
                              @endforeach
                           @else
                              <tr>
                                 <td colspan="7">
                                    <div class="alert alert-info">You do not have any clusters</div>
                                 </td>
                              </tr>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
@stop
