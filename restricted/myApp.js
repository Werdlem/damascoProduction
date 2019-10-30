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


// CUSTOM FILTERs. DROPS DIGITS AFTER 2 DECIMAL PLACES. FOR USE WHEN DISPLAYING FIGURES AS CURRENCY
myApp.filter('dropDigits', function() {
  return function(floatNum) {
    return String(floatNum)
    .split('.')
    .map(function (d, i) { return i ? d.substr(0, 2) : d; })
    .join('.');
  };
});


myApp.controller('goodsIn',function($scope, $http){

	$http({
		method:'GET',
		url:'./jsonData/getGoodsInSku.json.php'
		}).then((response)=>{
			this.getGoodsInSku = response.data;
		});
	});
myApp.controller('productionSchedule', function($scope, $http){
	$scope.machines=[{
		id: 1,
		name: 'Machine 1',
		capacity: 480
	},
	{
	id: 2,
	name: 'Autobox',
	capacity: 480}];
	$scope.search=()=>{
		value = $scope.searchOrder;

	$http({
		method:'POST',
		url:'./jsonData/productionSchedule.json.php',
		data: {order:value}
		}).then((response)=>{
			this.getSchedule = response.data;
		});
}
});
