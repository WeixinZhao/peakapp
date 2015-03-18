<!DOCTYPE html>
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
                    <li class="active"><a href="/">Home</a></li>                   
                    <li><a href="logout">Logout</a></li>                    
                    <li><a href="#">About</a></li>
                   
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        
      
       <form class="form-inline">

                <div class="form-group">
                    <label>Search:</label>
                    <input ng-model="query" type="text" class="form-control" placeholder="Search for Peak" />
                </div>
                <div class="form-group">
                    <label>Order By:</label>
                    <select ng-model="PeakOrder" class="form-control">
                        <option value="name">Name</option>
                        <option value="elevation">Elevation</option>
                    </select>
                    <label class="form-group">
                        <input type="radio" ng-model="direction" name="direction" checked />
                        Ascending
                    </label>
                    <label class="form-group">
                        <input type="radio" ng-model="direction" name="direction" value="reversed" />
                        Descending
                    </label>
                </div>
           </form>           
       
        <div class="clearfix"></div>

        <div class="row">      
           <div class="col-xs-7">
                <ul class="peak-thumbs">
                    <li  ng-repeat="peak in peaks | filter:query |orderBy: PeakOrder :direction">
                        <div ng-mouseover="hoverIn(peak)" ng-mouseleave="hoverOut()">
                        <div class="thumbnail"  >
                            <a href="#/{{peak.name}}" ><img  class="img-rounded" ng-src="_images/{{peak.name}}.jpg" /></a>             
                               </div>                            
                          <a href="#/{{peak.name}}" ><span>{{peak.name}}</span></a>
                                <p>Elevation: {{peak.elevation | number}} feet</p> 
                        </div>                   
                                                                         
                    </li>
                </ul>
            </div>
                           

        
                  <div class="col-xs-5">
                 <ui-gmap-google-map center='map.center' zoom='map.zoom'  options="map.options">              
                                                              
                       <ui-gmap-marker ng-repeat="peak in peaks | filter:query " coords="{ latitude:peak.lat, longitude: peak.lon }" idkey="0">
                     <ui-gmap-window isIconVisibleOnClick="true" show="peak.name == showName" >
                <div>{{peak.name}}</div>
            </ui-gmap-window>
                           
                              </ui-gmap-marker>
                </ui-gmap-google-map>
            </div>
        </div>
        

       
        </div>

    
</body>
</html>
