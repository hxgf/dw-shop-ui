<!DOCTYPE html>
<html>
<head>

	<title>{{pagetitle}}</title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

	<link rel="stylesheet" href="{{css}}/admin.css" />
	<script data-controller="{{control_client}}" id="js_init" data-main="{{js}}/_global" src="{{js}}/stereo/require.js"></script>

</head>
<body id="{{control_server}}">


	{{#is_admin}}
		<div id="head">
			<div class="inner">

			{{#nav}}
				<ul class="nav">
					<li {{#c_orders}}class="current"{{/c_orders}}><a href="/admin/orders/">orders</a></li>
					<li {{#c_inventory}}class="current"{{/c_inventory}}><a href="/admin/inventory/">inventory</a></li>
					<li {{#c_discounts}}class="current"{{/c_discounts}}><a href="/admin/discounts/">global discounts</a></li>
					<li {{#c_users}}class="current"{{/c_users}}><a href="/admin/users/">users</a></li>
				</ul>
			{{/nav}}
				
				<ul class="logout">
					<li><a href="/">back to store</a></li>
				</ul>

			</div>
		</div>
		<div id="content">

			{{#orders}}
			<? include("orders.php"); ?>
			{{/orders}}

			{{#inventory}}
			<? include("inventory.php"); ?>
			{{/inventory}}

			{{#edit}}
			<? include("edit.php"); ?>
			{{/edit}}

			{{#discounts}}
			<? include("discounts.php"); ?>
			{{/discounts}}

			{{#users}}
			<? include("users.php"); ?>
			{{/users}}

		</div>
	
	{{/is_admin}}


</body>
</html>