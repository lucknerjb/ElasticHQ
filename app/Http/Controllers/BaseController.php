<?php namespace ElasticHQ\Http\Controllers;

use View;
use Auth;
use Response;
use Agent;
use Session;
use ElasticHQ\Domain\Users\User;
use ElasticHQ\Domain\Accounts\Account;
use Illuminate\Foundation\Bus\DispatchesCommands;

class BaseController extends Controller {
   use DispatchesCommands;

   protected $currentUser;
   protected $currentAccount;
   protected $currentCluster;
   protected $currentClusterId;

   public function __construct() {
      $this->beforeFilter(function() {
         // Get assets version
         $version = trim(file_get_contents(base_path() . '/version'));
         View::share('assetsVersion', $version);

         // Default for page_title
         View::share('base_title', 'ElasticHQ');
         View::share('sectionName', '');
         View::share('pageTitle', '');
         View::share('pageSaveButton', '');
         View::share('baseUrl', env('BASEURL'));
         View::share('apiUrl', env('APIURL'));
         View::share('user', Auth::user());
         View::share('currentUser', Auth::user());

         if (Auth::check()) {
            $this->currentAccount = Account::find(Auth::user()->account_id);
            View::share('currentAccount', $this->currentAccount);

            // Get a list of clusters
            $accountClusters = $this->currentAccount->clusters()->get();
            View::share('accountClusters', $accountClusters);

            // Selected cluster
            $this->autoselectCluster($accountClusters);
            View::share('currentCluster', $this->currentCluster);
         }

         // // Base Config
         // $siteConfig = [
         //    'isMobile' => Agent::isMobile(),
         //    'isTablet' => Agent::isTablet()
         // ];
         // View::share('siteConfig', $siteConfig);

         // if (!Auth::guest()) {
         //    $user = Auth::user();
         //    $this->currentUser = $user;
         // }
      });
   }

   private function autoselectCluster($clusters) {
      if (!$clusters) {
         return;
      }

      $currentCluster = Session::get('currentCluster');

      if (!$currentCluster) {
         Session::put('currentCluster', $clusters[0]->toArray());
      }

      $this->currentCluster = Session::get('currentCluster');
      $this->currentClusterId = $this->currentCluster['id'];
   }

   protected function setLoggedInUser(User $user) {
      // Authenticate the user
      Auth::login($user);
   }

   /**
    * refreshUser
    *
    * Used when we need access to fields that were added to the users table and will not be available
    * for logged in users after a deploy
    */
   private function refreshUser() {
      $user = User::find($this->currentUser->id);
      $this->currentUser = $user;
      Auth::login($user);
   }

   protected function currentUser() {
      return Auth::user();
   }

   protected function isCurrentUser($userId) {
      $user = Auth::user();
      return intval($user->id) === intval($userId);
   }

   public function ensureCurrentUser() {
      // if (Auth::check() === false) {
      //    return Redirect::to('/login');
      // }
   }

   /**
    * Setup the layout used by the controller.
    *
    * @return void
    */
   protected function setupLayout()
   {
      if ( ! is_null($this->layout))
      {
         $this->layout = View::make($this->layout);
      }
   }

   protected function json($data) {
      return Response::json($data);
   }

   protected function env() {
      return \App::environment();
   }

   protected function respond($code, $data = []) {
      return Response::json($data, $code);
   }

   protected function respondSuccess($data = ['status' => 'success']) {
      return $this->respond(200, $data);
   }

   protected function respondUserError($data = ['status' => 'error']) {
      return $this->respond(400, $data);
   }

   protected function respondServerError($data = ['status' => 'error']) {
      return $this->respond(500, $data);
   }

   protected function respondAccessDenied($data = ['status' => 'error']) {
      return $this->respond(403, $data);
   }

   protected function respondNoContent() {
      return $this->respond(204);
   }

   protected function pr($data) {
      echo '<pre>';
      print_r($data);
      die;
   }

}
