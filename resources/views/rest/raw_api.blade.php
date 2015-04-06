@extends('layouts.dashboard')

@section('content')
   <div class="content-wrapper">
      <h3>
         REST / Raw API
      </h3>
      <div class="row">
         <section class="col-md-3">
            <div class="span2 well sidebar-nav">
               {!! Form::open() !!}
               <ul class="nav nav-list">
                  <li class="nav-header hide">Editor</li>
                  <li class="hide">
                     <a href="#jsoneditor"><i class="icon-double-angle-right"></i> JSON Editor</a>
                  </li>

                  <li class="nav-header">Cluster</li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="clusters" data-call="health"><i class="icon-double-angle-right"></i> Health</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="clusters" data-call="state"><i class="icon-double-angle-right"></i> State</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="clusters" data-call="settings"><i class="icon-double-angle-right"></i> Settings</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="clusters" data-call="ping"><i class="icon-double-angle-right"></i> Ping</a>
                  </li>

                  <li class="nav-header">Nodes</li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="nodes" data-call="info"><i class="icon-double-angle-right"></i> Info</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="nodes" data-call="stats"><i class="icon-double-angle-right"></i> Stats</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="nodes" data-call="cputhreads" rel="popRight" data-trigger="hover" data-title="Note..." data-html="true" data-content="The information will open in a new window." data-original-title="" title=""><i class="icon-double-angle-right"></i> CPU Threads</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="nodes" data-call="waitthreads" rel="popRight" data-trigger="hover" data-title="Note..." data-html="true" data-content="The information will open in a new window." data-original-title="" title=""><i class="icon-double-angle-right"></i> Wait Threads</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="nodes" data-call="blockthreads" rel="popRight" data-trigger="hover" data-title="Note..." data-html="true" data-content="The information will open in a new window." data-original-title="" title=""><i class="icon-double-angle-right"></i> Block Threads</a>
                  </li>

                  <li class="nav-header">Indices</li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="indices" data-call="aliases"><i class="icon-double-angle-right"></i> Aliases</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="indices" data-call="settings"><i class="icon-double-angle-right"></i> Settings</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="indices" data-call="stats"><i class="icon-double-angle-right"></i> Stats</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="indices" data-call="status"><i class="icon-double-angle-right"></i> Status</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="indices" data-call="segments"><i class="icon-double-angle-right"></i> Segments</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="indices" data-call="mappings"><i class="icon-double-angle-right"></i> Mappings</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="indices" data-call="refresh"><i class="icon-cog"></i> Refresh</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="indices" data-call="flush"><i class="icon-cog"></i> Flush</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="indices" data-call="optimize"><i class="icon-cog"></i> Optimize</a>
                  </li>
                  <li>
                     <a href="#" class="raw-api-calller" data-section="indices" data-call="clear_cache"><i class="icon-cog"></i> Clear Cache</a>
                  </li>
               </ul>
               {!! Form::close() !!}
            </div>
         </section>

         <section class="col-md-9" id="response-container">
         </section>
      </div>
   </div>
@stop
