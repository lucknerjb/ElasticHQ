@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3 class="clearfix">
         <span class="page-title" style="margin-bottom: 10px; display: inline-block;">
            Manage Indice | <span class="text-muted">{!! $indiceName !!}</span>
         </span>

         @include('partials.indices_menu')
      </h3>
      <div class="row">

         <!-- Administrative Actions -->
         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">Administrative Actions</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover">
                        <tbody>
                           <tr>
                              <td>
                                 <a href="#" id="flush-index-btn" class="btn btn-primary">Flush Index</a>
                              </td>
                              <td>
                                 The flush process of an index frees memory from the index by flushing data to the index storage and clearing the internal transaction log. By default, ElasticSearch uses memory heuristics in order to automatically trigger flush operations as required in order to clear memory.
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <a href="#" id="clear-index-cache-btn" class="btn btn-primary">Clear Cache</a>
                              </td>
                              <td>
                                 Clears the cache on all indices.
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <a href="#" id="optimize-index-btn" class="btn btn-primary">Optimize Index</a>
                              </td>
                              <td>
                                 The optimize process basically optimizes the index for faster search operations (and relates to the number of segments a lucene index holds within each shard). The optimize operation allows to reduce the number of segments by merging them.
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <a href="#" id="refresh-index-btn" class="btn btn-primary">Refresh Index</a>
                              </td>
                              <td>
                                 Refresh the index, making all operations performed since the last refresh available for search. The (near) real-time capabilities depend on the index engine used. For example, the robin one requires refresh to be called, but by default a refresh is scheduled periodically.
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <a href="#" id="close-index-btn" class="btn btn-warning">Close Index</a>
                              </td>
                              <td>
                                 The open and close index commands allow to close an index, and later on opening it. A closed index has almost no overhead on the cluster (except for maintaining its metadata), and is blocked for read/write operations. A closed index can be opened which will then go through the normal recovery process.
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <a href="#" id="delete-index-btn" class="btn btn-danger">Delete Index</a>
                              </td>
                              <td>
                                 <strong>
                                    WARNING! This action cannot be undone. You will destroy this index and all documents associated with this, by clicking this button.
                                 </strong>
                              </td>
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
