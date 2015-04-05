<div class="page-action-buttons pull-right">
   <a href="/indices/{!! $indice['name'] !!}/mappings" class="btn btn-primary">
      Mappings
   </a>
   <a href="/indices/{!! $indice['name'] !!}/aliases" class="btn btn-primary">
      Aliases
   </a>
   <a href="/indices/{!! $indice['name'] !!}/shards" class="btn btn-primary">
      Shards
   </a>
   @if ($currentUser->can('INDICE.MANAGE'))
      <a href="/indices/{!! $indice['name'] !!}/manage" class="btn btn-primary">
         Manage
      </a>
   @endif
</div>
