
var peaksApp = angular.module('peaksApp', ['uiGmapgoogle-maps']);



peaksApp.factory('peaks', function ($http) {

    function getData(callback) {
        $http({
            method: 'GET',
            url: '/api/peaks',
            cache: true
        }).success(callback);
    }
    return {
        list: getData,
        find: function (name, callback) {
            getData(function (data) {
                var peak = data.filter(function (entry) {
                    return entry.name === name;
                })[0];
                callback(peak);
            });
        }
    };           
});

   
        
peaksApp.controller('PeaksListCtrl', function ($scope, peaks) {
    peaks.list(function (data) {
        $scope.peaks = data;
        $scope.PeakOrder = 'name';
        $scope.showName = "";

        $scope.map = { center: { latitude: data[0].lat, longitude: data[0].lon }, zoom: 8 };
   //     $scope.marker = { id: 0, coords: { latitude: data[0].lat, longitude: data[0].lon } };
      
        $scope.hoverIn = function (peak) {
            $scope.showName = peak.name;
           
        };
        $scope.hoverOut = function () {
            $scope.showName = "";
        };

    });
});




peaksApp.controller('PeakDetailCtrl', function ($scope, $routeParams, peaks) {
    peaks.find($routeParams.peakName, function (peak) {
        $scope.peak = peak;
        $scope.map = { center: { latitude: peak.lat, longitude: peak.lon }, zoom: 13, options: { mapTypeId: google.maps.MapTypeId.TERRAIN } };  
        $scope.marker = { id: 0, coords: { latitude: peak.lat, longitude: peak.lon } };
    });
});

