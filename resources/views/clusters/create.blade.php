@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>Add Cluster</h3>

      <div class="row">
         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-body">
                  {!! Form::open(['url' => '/clusters', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                     <fieldset></fieldset>
                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Endpoint</label>
                           <div class="col-sm-6">
                              <input type="text" name="endpoint" class="form-control" placeholder="Ex: example.com, 127.0.0.1">
                              <span class="help-block m-b-none">Enter your Elasticsearch cluster address <strong>without</strong> the scheme</span>
                           </div>
                        </div>
                     </fieldset>
                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Port</label>
                           <div class="col-sm-2">
                              <input type="text" name="port" class="form-control" value="9200">
                           </div>
                        </div>
                     </fieldset>
                     <fieldset>
                        <div class="form-group">
                           <label for="input-id-1" class="col-sm-2 control-label">Username</label>
                           <div class="col-sm-6">
                              <input name="username" type="text" class="form-control">
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <label for="input-id-1" class="col-sm-2 control-label">Password</label>
                           <div class="col-sm-6">
                              <input name="password" type="text" class="form-control">
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <label for="input-id-1" class="col-sm-2 control-label">Use SSL?</label>
                           <div class="col-sm-2">
                              <select name="use_ssl" class="form-control m-b">
                                 <option value="0">No</option>
                                 <option value="1">Yes</option>
                              </select>
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <div class="col-sm-2 pull-right">
                              <button class="btn btn-primary pull-right">Save Cluster</button>
                           </div>
                        </div>
                     </fieldset>
                  {!! Form::close() !!}
               </div>
            </div>
         </section>
      </div>
   </div>
@stop
