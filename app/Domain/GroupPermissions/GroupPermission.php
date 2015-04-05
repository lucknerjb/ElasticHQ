<?php

namespace ElasticHQ\Domain\GroupPermissions;

use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model {
   protected $table = 'group_permissions';
   protected $fillable = ['group_id', 'permission_id'];

   public function group() {
      return $this->belongsTo('ElasticHQ\Domain\Groups\Group');
   }
}
