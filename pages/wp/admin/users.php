
<div class="subnav">
<? /*
	<ul>
		<li><a href="">+ Add new user</a></li>
	</ul>
*/ ?>
</div>


<ul class="credits-list">
{{#users_list}}
	<li>{{email}} {{#shipping_name}}({{shipping_name}}){{/shipping_name}}
	<input type="text" data-id="{{id}}" value="{{credit_balance}}" />
	</li>
{{/users_list}}