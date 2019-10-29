<div ng-controller="goodsIn as gi">

	<table>
	<tr ng-repeat="x in gi.getGoodsInSku">
		<td>{{x.sku}}</td>
		<td>{{x.description}}</td>
		<td>{{x.QTY}}</td>
	</tr>
</table>
</div>