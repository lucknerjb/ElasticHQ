<?php

namespace ElasticHQ\Http\Controllers;

use View;
use Input;
use Redirect;
use Flash;
use ElasticHQ\Http\Requests\AddGroupFormRequest;
use ElasticHQ\Domain\Groups\Group;
use ElasticHQ\Domain\ClusterDetails\ClusterDetail;

class GroupsController extends BaseController {
   public function index()
   {
      $defaultGroups = Group::where(['account_id' => 0])->get();
      $groups = $this->currentAccount->groups()->get();

      return view('groups.index', compact('groups', 'defaultGroups'));
   }

   public function create()
   {
      return view('groups.create');
   }

   public function store(AddGroupFormRequest $addGroupFormRequest)
   {
      $group = new Group([
         'name' => Input::get('name')
      ]);

      $saved = $this->currentAccount->groups()->save($group);

      if (!$saved) {
         Flash::error('Could not save group');
         return Redirect::back()->withInput();
      }

      return Redirect::to('/groups');
   }
}
