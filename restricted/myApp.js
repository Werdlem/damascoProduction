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


myApp.controller('getSchedule',function($scope, $http){

	$http({
		method:'GET',
		url:'./jsonData/getSchedule.json.php'
		}).then((response)=>{
			this.getSchedule = response.data;
		});
	});
myApp.controller('productionSchedule', function($scope, $http, $route){

$scope.schedule =()=>{
	$http({
		method:'POST',
		url:'./jsonData/schedule.json.php',
		data: {order_id:$scope.details.order_id,
			sku:$scope.details.sku, 
			qty:$scope.details.qty, 
			machine:$scope.machine, 
			duration:$scope.duration, 
			scheduleDate:$scope.scheduleDate}
		}).then((response)=>{
			$('#myModal').modal('hide');
		});

}

	$scope.machines=[{
		id: 1,
		name: 'Machine 1',
		capacity: 480
	},
	{
	id: 2,
	name: 'Autobox',
	capacity: 480}];

	$scope.showDetails = function(x){
		$scope.details = x;
		$('#myModal').modal('show');
	}

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
