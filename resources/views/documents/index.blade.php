@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3 class="clearfix">
         <span class="page-title" style="margin-bottom: 10px; display: inline-block;">
            Documents Explorer
         </span>
      </h3>
      <div class="row">

         <!-- Type Mappings -->
         <section class="col-md-4">
            <div class="panel panel-default">
               <div class="panel-body">
                  {!! Form::open(['url' => '#', 'id' => 'explore-form', 'class' => 'form-horizontal']) !!}
                     <div class="form-group col-md-12">
                        <select name="index" class="form-control explore-filter-index">
                           <option value="">Select an index</option>
                           @foreach($cluster->indice_details as $index)
                              <option value="{!! $index['name'] !!}">Index: {!! $index['name'] !!}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-12">
                        <select name="type" class="form-control explore-filter-type">
                        </select>
                     </div>
                     <div class="form-group col-md-12">
                        <a href="#" class="btn btn-primary toggle-filter-fields" disabled>Filter by field</a>
                     </div>

                     <div class="form-group col-md-12" id="filter-fields" style="display: none;"></div>

                     <div class="form-group col-md-12">
                        <button class="btn btn-success search-btn">Search</button>
                     </div>
                  {!! Form::close() !!}
               </div>
            </div>
         </section>

         <section class="col-md-8">
            <div class="panel panel-default">
               <div class="panel-heading">Results</div>
               <div class="panel-body">
                  <div class="table-responsive" id="results-container" style="overflow:scroll;">
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
@stop
