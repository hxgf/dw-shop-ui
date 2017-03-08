<div class="subnav">
	<ul>
<? //		<li><a href="">+ Add new user</a></li> ?>
	</ul>
</div>


{{#users_list}}
<div class="user-edit">
	<h2>{{email}}</h2>
	<label>Discount</label>
	<input type="text" class="user-discount" data-id="{{uid}}" value="{{user_discount}}" />
	<select data-id="{{uid}}">
		<option value="2" {{#group_regular}}selected{{/group_regular}}>Customer</option>
		<option value="1" {{#group_admin}}selected{{/group_admin}}>Admin</option>
		<option value="3" {{#group_wholesale}}selected{{/group_wholesale}}>Wholesale</option>
	</select>
</div>
{{/users_list}}