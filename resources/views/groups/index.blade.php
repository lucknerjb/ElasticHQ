@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>
         Security / Groups

         @include('partials.groups_menu')
      </h3>
      <div class="row">
         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">Default Groups</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Name</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($defaultGroups as $group)
                              <tr>
                                 <td>{!! $group->name !!}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>

         <section class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">Your Groups</div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Name</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if (count($groups))
                              @foreach($groups as $group)
                                 <tr>
                                    <td>{!! $group->name !!}</td>
                                 </tr>
                              @endforeach
                           @else
                              <tr>
                                 <td>
                                    <div class="alert">You have no groups. <a href="/groups/create">Create one now</a></div>
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
