<div class="page-action-buttons pull-right">
   @if (isset($user))
      <a href="/users/{!! $user->id !!}/edit" class="btn btn-primary">
         Edit User
      </a>
   @endif
   <a href="/users/create" class="btn btn-primary">
      Create User
   </a>
</div>
