<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>Stupid app</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- build:css(.) styles/vendor.css -->
    <!-- bower:css -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="public/css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
    <!-- endbuild -->
  </head>
  <body ng-app="mateoApp">
    <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <div class="header" ng-include="'public/views/nav-bar.html'">
    
      <!-- Navigation -->
    
    </div>
      <!-- /.content area -->
    <div ui-view></div>
  

    <div class="footer">
      <div class="container">
        <p><span class="glyphicon glyphicon-heart"></span> from the Yeoman team</p>
      </div>
    </div>


    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID -->
     <script>
       !function(A,n,g,u,l,a,r){A.GoogleAnalyticsObject=l,A[l]=A[l]||function(){
       (A[l].q=A[l].q||[]).push(arguments)},A[l].l=+new Date,a=n.createElement(g),
       r=n.getElementsByTagName(g)[0],a.src=u,r.parentNode.insertBefore(a,r)
       }(window,document,'script','//www.google-analytics.com/analytics.js','ga');

       ga('create', 'UA-XXXXX-X');
       ga('send', 'pageview');
    </script>

    <!-- build:js(.) scripts/vendor.js -->
    <!-- bower:js -->
    
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    $('.carousel').carousel({
      interval: 5000
    });
   
</script>  
    <script src="bower_components/angular/angular.js"></script>
    <script src="bower_components/ngStorage/ngStorage.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.10/ngStorage.min.js"></script>
    <script src="bower_components/angular-animate/angular-animate.js"></script>
    <script src="bower_components/angular-aria/angular-aria.js"></script>
    <script src="bower_components/angular-cookies/angular-cookies.js"></script>
    <script src="bower_components/angular-resource/angular-resource.js"></script>
    <script src="bower_components/angular-route/angular-route.js"></script>
    <script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
    <script src="bower_components/angular-touch/angular-touch.js"></script>
    <script src="bower_components/angular-messages/angular-messages.js"></script>
    <script src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
    <script src="bower_components/angular-ui-utils/ui-utils.js"></script>
    <script src="bower_components/angular-file-upload/angular-file-upload.js"></script>
    <script src="bower_components/es5-shim/es5-shim.js"></script>
    <!-- endbower -->
    <!-- endbuild -->

    <!-- Script to Activate the Carousel -->
           <!-- build:js({.tmp,app}) scripts/scripts.js -->
         <script src="public/app/modules/core/config.js"></script>
            <script src="public/app/modules/core/init.js"></script>
            <script src="public/app/modules/core/coreModules.js"></script>
            <script src="public/app/modules/core/route/coreRoute.js"></script>
            <script src="public/app/modules/core/services/authServices.js"></script>
            <script src="public/app/modules/core/services/dataServices.js"></script>
            <script src="public/app/modules/core/menu/coreService.js"></script>
            <script src="public/app/modules/core/menu/coreConfig.js"></script>                   
            <script src="public/app/modules/core/controllers/main.js"></script>
            <script src="public/app/modules/core/controllers/signupCtrl.js"></script>
            <script src="public/app/modules/users/usersModule.js"></script>
            <script src="public/app/modules/users/usersConfig.js"></script>
            <script src="public/app/modules/users/route/usersRoute.js"></script>
            <script src="public/app/modules/users/controllers/usersCtrl.js"></script>
            <script src="public/app/modules/users/controllers/userslistCtrl.js"></script>
            <script src="public/app/modules/users/services/usersServices.js"></script>
            <script src="public/app/modules/task/taskModule.js"></script>
            <script src="public/app/modules/task/taskConfig.js"></script>
            <script src="public/app/modules/task/route/taskRoute.js"></script>
            <script src="public/app/modules/task/controllers/tasklistCtrl.js"></script>
            <script src="public/app/modules/task/controllers/taskCtrl.js"></script>
            <script src="public/app/modules/task/services/taskServices.js"></script>
            <script src="public/app/modules/core/controllers/headerCtrl.js"></script>  
        <!-- endbuild -->
</body>
</html>
