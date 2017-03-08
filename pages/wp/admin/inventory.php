<div class="subnav">
	<ul>
		<li {{#all}}class="current"{{/all}}><a href="/admin/inventory/">all items</a></li>
		<li><a href="/admin/inventory/" id="item-add">+ Add item</a></li>
<? /*		<li {{#types}}class="current"{{/types}}><a href="/admin/inventory/types/">item types</a></li>
		<li {{#bulk_edit}}class="current"{{/bulk_edit}}><a href="/admin/inventory/bulk-edit/">bulk edit</a></li>
*/ ?>
	</ul>
</div>


{{#all}}


	<ul class="inventory-container">

	{{#items_list}}
		<li class="inventory-list" id="{{id}}">
			<a href="/admin/edit/{{id}}/"><img src="{{img}}" /></a>
			<h3><a href="/admin/edit/{{id}}/">{{title}}</a></h3>
		</li>
	{{/items_list}}

	</ul>

{{/all}}



{{#types}}
	// fixit i don't remember what this does
{{/types}}


{{#bulk_edit}}
	// fixit i don't remember what this does... think it's the regular edit screen, but for all items of a certain type
{{/bulk_edit}}
