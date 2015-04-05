@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3 class="clearfix">
         <span class="page-title" style="margin-bottom: 10px; display: inline-block;">
            Cluster: <span class="text-muted">{!! $cluster->name !!}</span> / Indice: <span class="text-muted">{!! $indiceName !!}</span>
         </span>

         <div class="page-action-buttons pull-right">
            <a href="/clusters/{!! $cluster->url_slug !!}/indices/{!! $indice['name'] !!}/mappings" class="btn btn-danger">
               Delete Mapping
            </a>
         </div>
      </h3>
      <div class="row">

         <!-- Mapping -->
         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">Mapping for "{!! $typeName !!}"</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Format</th>
                              <th>Store?</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($mapping as $fieldName => $property)
                              <tr>
                                 <td>{!! $fieldName !!}</td>
                                 <td>{!! $property['type'] !!}</td>
                                 <td></td>
                                 <td></td>
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
