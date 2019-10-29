<div ng-controller="productionSchedule as ps">
<h1>Production Schedule </h1>

<input type="" ng-model="searchOrder" ng-change="search()" >


<table class="table">
	<tr>
	<th>Order Id</th>
	<th>Customer Name</th>
	<th>SKU</th>
	</tr>
	<tr ng-repeat="x in ps.getSchedule">
		<td>{{x.order_id}}</td>
		<td>{{x.customer}}</td>
		<td>{{x.sku}}</td>
		<td><input type="button" class="btn btn-info btn-sml" value="Schedule"></td>
		
		
	</tr>
</table>
</div>
