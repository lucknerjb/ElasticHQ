@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>Create User</h3>

      <div class="row">
         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-body">
                  {!! Form::open(['url' => '/users', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                     <fieldset></fieldset>
                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Name</label>
                           <div class="col-sm-6">
                              <input type="text" name="name" class="form-control">
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Email</label>
                           <div class="col-sm-6">
                              <input type="text" name="email" class="form-control">
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Password</label>
                           <div class="col-sm-6">
                              <input type="text" name="password" class="form-control">
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Groups</label>
                           <div class="col-sm-6" style="padding-top:10px;">
                              @foreach($defaultGroups as $group)
                                 <input type="checkbox" name="user_groups[]" value="{!! $group->id !!}"> {!! $group->name !!}
                                 <br>
                              @endforeach

                              @foreach($groups as $group)
                                 <input type="checkbox" name="user_groups[]" value="{!! $group->id !!}"> {!! $group->name !!}
                                 <br>
                              @endforeach
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <div class="col-sm-2 pull-right">
                              <button class="btn btn-primary pull-right">Save User</button>
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
