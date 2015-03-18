
var peaksApp = angular.module('peaksApp', ['uiGmapgoogle-maps']);




peaksApp.factory('peaks', function($http) {

    return {
        
        get : function() {
            return $http.get('/api/peaks');
        },

        
        save : function(peakData) {
            return $http({
                method: 'POST',
                url: '/api/peaks',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(peakData)
            });
        },

        
        destroy : function(id) {
            return $http.delete('/api/peaks/' + id);
        }
    }

});
        
peaksApp.controller('PeaksListCtrl', function ($scope, peaks) {
 //  $scope.showName = 'xxxxxx';
 //  $scope.peaks=[{'name':'maroon'}];

    peaks.get(function (data) {
        $scope.peaks = data;
        $scope.PeakOrder = 'name';
        $scope.showName = 'xxxxxx';
        $scope.map = { center: { latitude: data[0].lat, longitude: data[0].lon }, zoom: 8 };
        
        $scope.hoverIn = function (peak) {
            $scope.showName = peak.name;
           
        };
        $scope.hoverOut = function () {
            $scope.showName = '';
        };

    });
});

/*
peaksApp.controller('PeakDetailCtrl', function ($scope, $routeParams, peaks) {
    peaks.find($routeParams.peakName, function (peak) {
        $scope.peak = peak;
        $scope.map = { center: { latitude: peak.lat, longitude: peak.lon }, zoom: 13, options: { mapTypeId: google.maps.MapTypeId.TERRAIN } };  
        $scope.marker = { id: 0, coords: { latitude: peak.lat, longitude: peak.lon } };
    });
});
*/
