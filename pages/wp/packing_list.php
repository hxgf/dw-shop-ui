<!DOCTYPE html>
<html>
<head>

	<title>WP.CO PACKING LIST</title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="viewport" content="width=1150" >

	<link rel="stylesheet" href="{{css}}/global.css" />

</head>
<body>

	{{#packing_list}}
	<div id="packing-list">

		<img src="http://warpaintmade.com/media/img/wp-logo-head-2.jpg" id="logo" />

		<h3>order #{{order_number}}</h3>
		<h4>{{shipping_label}}</h4>
		<div class="summary">
			<ul>
				{{#shipping_summary}}
				<li>
					<a href="{{thumbnail_url}}" target="newbrowserwindow"><img src="{{thumbnail_url}}" /></a>
					<span>
					<h3>{{title}} ({{subtitle}})</h3>
					{{#options}}
					<b>- {{option}}: {{attribute}}</b>
					{{/options}}
					</span>
				</li>
				{{/shipping_summary}}
			</ul>
		</div>

		<div id="packing-foot">
			WAR PAINT CLOTHING CO &nbsp;+ + + + + + + + + + + + + +&nbsp; WARPAINTSTORE.COM
		</div>

	</div>

	{{/packing_list}}


</body>
</html>