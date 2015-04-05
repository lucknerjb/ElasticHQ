@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>Account Settings</h3>

      <div class="row">
         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-body">
                  {!! Form::open(['url' => '/settings', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                     <fieldset></fieldset>
                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Account Name</label>
                           <div class="col-sm-6">
                              <input type="text" name="account_name" class="form-control" value="{!! $account->name !!}">
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <div class="col-sm-2 pull-right">
                              <button class="btn btn-primary pull-right">Save Settings</button>
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
