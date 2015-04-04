<?php

namespace ElasticHQ\Http\Controllers;

use View;

class DashboardsController extends BaseController {
   public function index()
   {
      return view('dashboards.index');
   }
}
