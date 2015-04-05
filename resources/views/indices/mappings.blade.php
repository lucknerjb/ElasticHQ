@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3 class="clearfix">
         <span class="page-title" style="margin-bottom: 10px; display: inline-block;">
            Indice Mappings | <span class="text-muted">{!! $indiceName !!}</span>
         </span>

         @include('partials.indices_menu')
      </h3>
      <div class="row">

         <!-- Type Mappings -->
         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">Type Mappings</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Type</th>
                              <th>Index</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($indice['mappings'] as $typeName => $mapping)
                              <tr>
                                 <td>
                                    <a href="/clusters/{!! $cluster->url_slug !!}/indices/{!! $indice['name'] !!}/mappings/{!! $typeName !!}">
                                       {!! $typeName !!}
                                    </a>
                                 </td>
                                 <td>{!! $indiceName !!}</td>
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
