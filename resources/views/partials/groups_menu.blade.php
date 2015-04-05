<div class="page-action-buttons pull-right">
   @if (isset($group))
      <a href="/indices/{!! $indice['name'] !!}/shards" class="btn btn-primary">
         Shards
      </a>
   @endif
   <a href="/groups/create" class="btn btn-primary">
      Create Group
   </a>
</div>
