@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3 class="clearfix">
         <span class="page-title" style="margin-bottom: 10px; display: inline-block;">
            Indice Details | <span class="text-muted">{!! $indiceName !!}</span>
         </span>

         @include('partials.indices_menu')
      </h3>
      <div class="row">
         <section class="col-md-12">
            <div class="col-md-12">
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Documents', 'value' => $indice['docs_count']])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Primary Size', 'value' => $indice['primary_size'] . 'B'])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Total Size', 'value' => $indice['total_size'] . 'B'])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Total Shards', 'value' => $indice['shards_count']])
               </div>
               <div class="col-sm-2">
                  @include('partials.widget', ['caption' => 'Total Replicas', 'value' => $indice['replicas_count']])
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
                              <td>{!! $indice['docs_count'] !!}</td>
                           </tr>
                           <tr>
                              <td>Deleted Documents</td>
                              <td>{!! $indice['deleted_docs_count'] !!}</td>
                           </tr>
                           <tr>
                              <td>Primary Size</td>
                              <td>{!! $indice['primary_size'] . 'B' !!}</td>
                           </tr>
                           <tr>
                              <td>Total Size</td>
                              <td>{!! $indice['total_size'] . 'B' !!}</td>
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
                              <td>{!! $indice['search']['query_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Query Time</td>
                              <td>{!! $indice['search']['query_time'] !!}</td>
                           </tr>
                           <tr>
                              <td>Fetch Total</td>
                              <td>{!! $indice['search']['fetch_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Fetch Time</td>
                              <td>{!! $indice['search']['fetch_time'] !!}</td>
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
                              <td>{!! $indice['indexing']['index_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Index Time</td>
                              <td>{!! $indice['indexing']['index_time'] !!}</td>
                           </tr>
                           <tr>
                              <td>Delete Total</td>
                              <td>{!! $indice['indexing']['delete_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Delete Time</td>
                              <td>{!! $indice['indexing']['delete_time'] !!}</td>
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
                              <td>{!! $indice['get']['get_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Get Time</td>
                              <td>{!! $indice['get']['get_time'] !!}</td>
                           </tr>
                           <tr>
                              <td>Exists Total</td>
                              <td>{!! $indice['get']['exists_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Exists Time</td>
                              <td>{!! $indice['get']['exists_time'] !!}</td>
                           </tr>
                           <tr>
                              <td>Mising Total</td>
                              <td>{!! $indice['get']['missing_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Mising Time</td>
                              <td>{!! $indice['get']['missing_time'] !!}</td>
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
                              <td>{!! $indice['operations']['refresh_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Refresh Time</td>
                              <td>{!! $indice['operations']['refresh_time'] !!}</td>
                           </tr>
                           <tr>
                              <td>Flush Total</td>
                              <td>{!! $indice['operations']['flush_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Flush Time</td>
                              <td>{!! $indice['operations']['flush_time'] !!}</td>
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
                              <td>{!! $indice['merges']['merge_total'] !!}</td>
                           </tr>
                           <tr>
                              <td>Merge Total Time</td>
                              <td>{!! $indice['merges']['merge_time'] !!}</td>
                           </tr>
                           <tr>
                              <td>Merge Total Docs</td>
                              <td>{!! $indice['merges']['merge_docs'] !!}</td>
                           </tr>
                           <tr>
                              <td>Merge Total Size</td>
                              <td>{!! $indice['merges']['merge_size'] !!} bytes</td>
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
