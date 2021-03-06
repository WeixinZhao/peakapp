﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" ng-app="peaksApp" ng-controller="PeaksListCtrl">
<head>
    <title></title>
       <!-- all angular resources will be loaded from the /public folder -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="_css/custom.css">
    <script src="_js/bootstrap.min.js"></script>
    <script src="_js/angular.min.js"></script>
    <script src='//maps.googleapis.com/maps/api/js?sensor=false'></script>
    <script src='_js/lodash.min.js'></script>
<script src='_js/angular-google-maps.min.js'></script>
     <script src="_js/controller.js"></script>
    
</head>

<body>
    <div class="row">
        <nav class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav">
                    <li ><a href="/">Home</a></li>                    
                    <li ><a href="register">Registration</a></li>                                      
                    <li><a href="#">About</a></li>
                   
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
      <h4>You have successfully logged out. <a href="{{ URL::to('/login') }}">Log in?</a></h4>
       
        </div>

    
</body>
</html>
