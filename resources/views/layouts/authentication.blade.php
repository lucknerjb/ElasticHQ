<!DOCTYPE html>
<html class="login-bg">
<head>
   <title>Detail Admin - Sign in</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- bootstrap -->
   @if ($page === 'login')
      <link href="/assets/css/login.css" rel="stylesheet" />
   @else
      <link href="/assets/css/login.css" rel="stylesheet" />
   @endif

   <!-- open sans font -->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

   <!--[if lt IE 9]>
   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>
<body>
    @yield('content')

   <!-- scripts -->
    <script src="/assets/js/authentication.js"></script>
</body>
</html>
