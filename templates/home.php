<div ng-controller="productionSchedule as ps">

	
<h1>Production Schedule </h1>

<h3>Order Search: <input type="" ng-model="searchOrder" ng-change="search()"></h3>
<p>"NB:for Postpack orders, please use the prefix 'p' followed by the order number and 'd' followed by the order number for damasco"</p>


<table class="table">
	<tr>
	<th>Order Id</th>
	<th>Customer Name</th>
	<th>SKU</th>
	<th>Qty</th>
	</tr>
	<tr ng-repeat="x in ps.getSchedule">
		<td>{{x.order_id}}</td>
		<td>{{x.customer}}</td>
		<td>{{x.sku}}</td>
		<td>{{x.qty}}</td>
		<td><button ng-click="showDetails(x)" class="btn btn-info btn-sml">Schedule</td>
	</tr>
	</table>

	<div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Schedule Production</h4>
                            </div>
                            <div class="modal-body">
                            	<p>Order Id: {{details.order_id}}</p>
                                <p>SKU: {{details.sku}}</p>
                                <p>Qty: {{details.qty}}</p>
                                <p>Machine: <select ng-model="machine" ng-options="x.name for x in machines" ></select></p>
                                <p>Duration: <input type="number" ng-model="duration"></p>
                                <p>Schedule Date: <input type="date" ng-model="scheduleDate"></p>
                                </div>
                            <div class="modal-footer">
                            	<button type="button" class="btn btn-default" ng-click="schedule(details.order_id,details.sku, details.qty, machine, duration, scheduleDate)">Schedule</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
</div>
