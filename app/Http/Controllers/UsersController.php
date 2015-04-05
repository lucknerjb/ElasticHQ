<?php

namespace ElasticHQ\Http\Controllers;

use View;
use Input;
use Redirect;
use Flash;
use DB;
use ElasticHQ\Http\Requests\AddUserFormRequest;
use ElasticHQ\Domain\Users\User;
use ElasticHQ\Domain\Groups\Group;
use ElasticHQ\Domain\ClusterDetails\ClusterDetail;

class UsersController extends BaseController {
   public function index()
   {
      $users = $this->currentAccount->users()->get();

      return view('users.index', compact('users'));
   }

   public function create()
   {
      $defaultGroups = Group::where(['account_id' => 0])->get();
      $groups = $this->currentAccount->groups()->get();

      return view('users.create', compact('groups', 'defaultGroups'));
   }

   public function edit($userId)
   {
      $user = $this->currentAccount->users()->where(['id' => $userId])->first();
      $defaultGroups = Group::where(['account_id' => 0])->get();
      $groups = $this->currentAccount->groups()->get();

      return view('users.edit', compact('groups', 'defaultGroups', 'user'));
   }

   public function store(AddUserFormRequest $addUserFormRequest)
   {
      $user = new User([
         'name' => Input::get('name'),
         'email' => Input::get('email'),
      ]);

      DB::beginTransaction();

      $saved = $this->currentAccount->users()->save($user);

      if (!$saved) {
         Flash::error('Could not save user');
         return Redirect::back()->withInput();
      }

      // Save the groups
      // foreach(Input::get('user_groups') as $groupId) {
      //    $user->groups()->attach($groupId);
      // }
      $user->groups()->sync(Input::get('user_groups'));

      DB::commit();

      return Redirect::to('/users');
   }

   public function update($userId, AddUserFormRequest $addUserFormRequest)
   {
      $user = $this->currentAccount->users()->where(['id' => $userId])->first();

      $user->fill([
         'name' => Input::get('name'),
         'email' => Input::get('email'),
         'password' => Input::get('password')
      ]);

      DB::beginTransaction();
      if (!$user->save()) {
         Flash::error('Could not save user');
         return Redirect::back()->withInput();
      }

      $user->groups()->sync(Input::get('user_groups'));

      DB::commit();

      return Redirect::to('/users');
   }
}
