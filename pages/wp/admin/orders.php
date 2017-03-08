<div class="subnav">
	<ul>
		<li {{#unshipped}}class="current"{{/unshipped}}><a href="/admin/orders/">unshipped</a></li>
		<? // <li {{#incomplete}}class="current"{{/incomplete}}><a href="/admin/orders/incomplete/">incomplete</a></li> ?>
		<li {{#shipped}}class="current"{{/shipped}}><a href="/admin/orders/shipped/">shipped</a></li>
	</ul>
</div>




{{#orders_list}}

	<div class="orders-list {{#odd}}odd{{/odd}}">
		<h3>{{shipping_name}} <span>order #{{order_number}}</span> <small><a href="/packing-list/{{order_id}}/">(print)</a></small><br />
				<a href="mailto:{{shipping_email}}">{{shipping_email}}</a>
		</h3>

		<div class="details">
			<h4>
				<b>Ship to:</b>
				{{shipping_label}}
				{{#shipping_rush}}<i>RUSH SHIPPING</i>{{/shipping_rush}}
			</h4>
			<div class="summary">
				<b>Order:</b>
				<ul>
					{{#shipping_summary}}
					<li>
						<a href="/item/{{id}}/{{url_title}}/" target="newbrowserwindow"><img src="{{thumbnail_url}}" /></a>
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
		</div>
		
		<div class="data">
			<b>Total:</b> ${{paid_total}} <span>(paid {{paid_date}})</span><br /><br />
{{#order_incomplete}}
	{{date_started}} -- {{order_id}}
{{/order_incomplete}}
		{{#tracking_number}}
			<b>Shipped on:</b> {{shipped_date}}<br />
			<b>Tracking number:</b> {{tracking_number}}
		{{/tracking_number}}

		{{^tracking_number}}
			<input type="text" name="tracking" placeholder="Tracking number" />
			<button class="orders-ship" data-id="{{order_id}}">Ship it</button>
		{{/tracking_number}}

		</div>
	</div>


{{/orders_list}}