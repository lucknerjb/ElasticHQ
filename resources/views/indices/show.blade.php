@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>
         Cluster: <span class="text-muted">{!! $cluster->name !!}</span> / Indice: <span class="text-muted">{!! $indiceName !!}</span>
         <a href="/clusters/{!! $cluster->url_slug !!}/edit" class="btn btn-primary pull-right">Edit Cluster</a>
      </h3>
      <div class="row">
         <section class="col-md-12">
            <div class="col-md-12">
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Documents', 'value' => $indice['total']['docs']['count']])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Primary Size', 'value' => $indice['primaries']['store']['size_in_bytes'] . 'B'])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Total Size', 'value' => $indice['total']['store']['size_in_bytes'] . 'B'])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Total Shards', 'value' => $cluster->details['shards_count']])
               </div>
            </div>
         </section>

         <!-- Documents -->
         <section class="col-md-6">
            <div class="panel panel-default">
               <div class="panel-heading">Documents</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover">
                        <tbody>
                           <tr>
                              <td>Documents</td>
                              <td>{!! $indice['total']['docs']['count'] !!}</td>
                           </tr>
                           <tr>
                              <td>Deleted Documents</td>
                              <td>{!! $indice['total']['docs']['deleted'] !!}</td>
                           </tr>
                           <tr>
                              <td>Primary Size</td>
                              <td>{!! $indice['primaries']['store']['size_in_bytes'] . 'B' !!}</td>
                           </tr>
                           <tr>
                              <td>Total Size</td>
                              <td>{!! $indice['total']['store']['size_in_bytes'] . 'B' !!}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>

         <!-- Search Totals -->
         <section class="col-md-6">
            <div class="panel panel-default">
               <div class="panel-heading">Search Totals</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover">
                        <tbody>
                           <tr>
                              <td>Query Total</td>
                              <td>{!! $indice['total']['search']['query_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Query Time</td>
                              <td>{!! $indice['total']['search']['query_time_in_millis'] !!}</td>
                           </tr>
                           <tr>
                              <td>Fetch Total</td>
                              <td>{!! $indice['total']['search']['fetch_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Fetch Time</td>
                              <td>{!! $indice['total']['search']['fetch_time_in_millis'] !!}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>

         <!-- Indexing Totals -->
         <section class="col-md-6">
            <div class="panel panel-default">
               <div class="panel-heading">Indexing Totals</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover">
                        <tbody>
                           <tr>
                              <td>Index Total</td>
                              <td>{!! $indice['total']['indexing']['index_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Index Time</td>
                              <td>{!! $indice['total']['indexing']['index_time_in_millis'] !!}</td>
                           </tr>
                           <tr>
                              <td>Delete Total</td>
                              <td>{!! $indice['total']['indexing']['delete_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Delete Time</td>
                              <td>{!! $indice['total']['indexing']['delete_time_in_millis'] !!}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>

         <!-- Get Totals -->
         <section class="col-md-6">
            <div class="panel panel-default">
               <div class="panel-heading">Get Totals</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover">
                        <tbody>
                           <tr>
                              <td>Get Total</td>
                              <td>{!! $indice['total']['get']['total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Get Time</td>
                              <td>{!! $indice['total']['get']['time_in_millis'] !!}</td>
                           </tr>
                           <tr>
                              <td>Exists Total</td>
                              <td>{!! $indice['total']['get']['exists_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Exists Time</td>
                              <td>{!! $indice['total']['get']['exists_time_in_millis'] !!}</td>
                           </tr>
                           <tr>
                              <td>Mising Total</td>
                              <td>{!! $indice['total']['get']['missing_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Mising Time</td>
                              <td>{!! $indice['total']['get']['missing_time_in_millis'] !!}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>

         <!-- Operations Totals -->
         <section class="col-md-6">
            <div class="panel panel-default">
               <div class="panel-heading">Operations Totals</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover">
                        <tbody>
                           <tr>
                              <td>Refresh Total</td>
                              <td>{!! $indice['total']['refresh']['total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Refresh Time</td>
                              <td>{!! $indice['total']['refresh']['total_time_in_millis'] !!}</td>
                           </tr>
                           <tr>
                              <td>Flush Total</td>
                              <td>{!! $indice['total']['flush']['total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Flush Time</td>
                              <td>{!! $indice['total']['flush']['total_time_in_millis'] !!}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>

         <!-- Merge Activity -->
         <section class="col-md-6">
            <div class="panel panel-default">
               <div class="panel-heading">Merge Activity</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover">
                        <tbody>
                           <tr>
                              <td>Merge Total</td>
                              <td>{!! $indice['total']['merges']['total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Merge Total Time</td>
                              <td>{!! $indice['total']['merges']['total_time_in_millis'] !!}</td>
                           </tr>
                           <tr>
                              <td>Merge Total Docs</td>
                              <td>{!! $indice['total']['merges']['total_docs'] !!}</td>
                           </tr>
                           <tr>
                              <td>Merge Total Size</td>
                              <td>{!! $indice['total']['merges']['total_size_in_bytes'] !!} bytes</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
@stop
