<div class="subnav">
	<ul>
		<li><a id="add-discount" href="/admin/discounts/edit/">+ Add discount</a></li>
	</ul>
</div>





{{^edit}}

	<ul class="edit-list">
	{{#discount_list}}
		<li><a href="/admin/discounts/edit/{{id}}/">{{title}}</a></li>
	{{/discount_list}}
	</ul>

{{/edit}}




{{#edit}}

	<form action="/admin/discounts/update/{{id}}/" method="post">

		<label>Discount Code</label>
		<input type="text" name="code" value="{{code}}" />
		
		<label>Discount Percentage</label>
		<input type="text" name="amount_percentage" value="{{amount_percentage}}" />

		<label>Shipping Discount Percentage</label>
		<input type="text" name="amount_percentage_shipping" value="{{amount_percentage_shipping}}" />

		<button>Save</button> &nbsp;&nbsp;{{#id}}
		<a href="/admin/discounts/delete/{{id}}/" class="delete">delete</a>{{/id}}

	</form>

{{/edit}}



