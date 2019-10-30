<div ng-controller="productionSchedule as ps">

	<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" ng-show="schedule">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Add New Tool</h3>
      </div>
      <div class="modal-body">   
<p>
<button type="submit" id="submit" value="Submit" >Submit</button>
</p>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>
<!--END MODAL-->
<h1>Production Schedule </h1>

<input type="" ng-model="searchOrder" ng-change="search()" >


<table class="table">
	<tr>
	<th>Order Id</th>
	<th>Customer Name</th>
	<th>SKU</th>
	<th>Machine</th>
	<th>Duration</th>
	<th>Schedule Date</th>
	</tr>
	<tr ng-repeat="x in ps.getSchedule">
		<td>{{x.order_id}}</td>
		<td>{{x.customer}}</td>
		<td>{{x.sku}}</td>
		<td><select ng-model="machine" ng-options="x.name for x in machines" ></td>
			<td><input type="number" name=""></td>
		<td><input type="date" ng-model="scheduleDate"></td>
		<td><p data-toggle="modal" data-target="#myModal" ng-click="schedule = true">Open Modal</p></td>
	</tr>
	</table>
</div>
