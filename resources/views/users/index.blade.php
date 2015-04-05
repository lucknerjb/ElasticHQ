@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>
         Security / Users

         @include('partials.users_menu')
      </h3>
      <div class="row">
         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">Your Users</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Groups</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if (count($users))
                              @foreach($users as $user)
                                 <tr>
                                    <td>
                                       {!! $user->name !!}
                                       @if ($currentUser->id === $user->id)
                                          <span style="display:inline-block; margin-left:5px;" class="label label-primary">You</span>
                                       @endif
                                    </td>
                                    <td>{!! $user->email !!}</td>
                                    <td>[ {!! implode(', ', $user->groups_list) !!} ]</td>
                                    <td>{!! ucfirst($user->status) !!}</td>
                                    <td>
                                       <a class="btn btn-sm btn-primary" href="/users/{!! $user->id !!}/edit">Edit User</a>
                                    </td>
                                 </tr>
                              @endforeach
                           @else
                              <tr>
                                 <td>
                                    <div class="alert">You have no users. <a href="/users/create">Create one now</a></div>
                                 </td>
                              </tr>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
@stop
