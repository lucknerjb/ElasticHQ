@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>Edit User | {!! $user->name !!}</h3>

      <div class="row">
         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-body">
                  {!! Form::model($user, ['url' => "/users/{$user->id}", 'class' => 'form-horizontal', 'method' => 'put']) !!}
                     <fieldset></fieldset>
                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Name</label>
                           <div class="col-sm-6">
                              {!! Form::text('name', null, ['class' => 'form-control']) !!}
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Email</label>
                           <div class="col-sm-6">
                              {!! Form::text('email', null, ['class' => 'form-control']) !!}
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Password</label>
                           <div class="col-sm-6">
                              {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Groups</label>
                           <div class="col-sm-6" style="padding-top:10px;">
                              @foreach($defaultGroups as $group)
                                 {!! Form::checkbox('user_groups[]', $group->id, (in_array($group->name, $user->groups_list))) !!}  {!! $group->name !!}
                                 <br>
                              @endforeach

                              @foreach($groups as $group)
                                 {!! Form::checkbox('user_groups[]', $group->id, in_array($group->name, $user->groups_list)) !!}  {!! $group->name !!}
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
