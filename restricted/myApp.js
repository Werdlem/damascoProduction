var myApp = angular.module('myApp', ['ngRoute','ngFileUpload'])
.config(function($routeProvider, $locationProvider){
	$routeProvider.when("/", {
		templateUrl : "/templates/home.php"
	})
  .when("/goodsIn", {
    templateUrl : "/templates/goodsIn.php"
  });


  $locationProvider
  .html5Mode(true)
  .hashPrefix('!');

});

app.filter('inchFilter', function() {
  return function(input) {
    return Math.floor(input * 0.0393701);
  };
});

// CUSTOM FILTERs. DROPS DIGITS AFTER 2 DECIMAL PLACES. FOR USE WHEN DISPLAYING FIGURES AS CURRENCY
myApp.filter('dropDigits', function() {
  return function(floatNum) {
    return String(floatNum)
    .split('.')
    .map(function (d, i) { return i ? d.substr(0, 2) : d; })
    .join('.');
  };
});

myApp.filter('dateToISO', function() {
  return function(input) {
    input = new Date(input).toISOString();
    return input;
  };
});

myApp.filter('sales', function(){

});

myApp.controller('userSelect',function($scope, $http, $cookies){

  $scope.selectSales1 = function(){
$cookies.put('userCookie', $scope.selectedSalesman.sales_man);
var userCookie = $cookies.get('userCookie');
alert(userCookie);
}

$scope.selectSales2 = function(){
localStorage.setItem('user', $scope.selectedSalesman.sales_man);
var userStorage = localStorage.getItem('user');
return $scope.user;
}

$http({
  method:'GET',
  url:'./jsonData/getSalesMan.json.php'
}).then((response)=>{
  this.getSalesman = response.data;
});
});

myApp.controller('goodsIn', function($scope, $location, $http, $timeout,$compile, Upload){
});
