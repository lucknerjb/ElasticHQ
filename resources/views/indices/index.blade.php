@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>
         Cluster Indices
      </h3>
      <div class="row">
         <section class="col-md-12">
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
