<div class="subnav">
	<ul>
		<li {{#unshipped}}class="current"{{/unshipped}}><a href="/admin/orders/">unshipped (retail)</a></li>
		<li {{#unshipped_wholesale}}class="current"{{/unshipped_wholesale}}><a href="/admin/orders/unshipped-wholesale/">unshipped (wholesale)</a></li>
		<li {{#packaged}}class="current"{{/packaged}}><a href="/admin/orders/packaged/">packaged</a></li>
		<li {{#incomplete}}class="current"{{/incomplete}}><a href="/admin/orders/incomplete/">incomplete</a></li>
		<li {{#shipped}}class="current"{{/shipped}}><a href="/admin/orders/shipped/">shipped</a></li>
	</ul>
</div>




{{#orders_list}}

	<div class="orders-list {{#odd}}odd{{/odd}}">
		<h3>{{^status_incomplete}}{{shipping_name}} {{#order_number}}<span>order #{{order_number}}</span>{{/order_number}}<br />{{/status_incomplete}}
		<a href="mailto:{{shipping_email}}">{{shipping_email}}</a>
		</h3>

		<div class="details">
		{{#status_incomplete}}
			<div class="summary">
				<pre>{{shipping_summary}}</pre>
			</div>
		{{/status_incomplete}}
		{{^status_incomplete}}
			<h4>
				<b>Ship to:</b>
				{{shipping_label}}
				{{#shipping_rush}}<i>RUSH SHIPPING</i>{{/shipping_rush}}
			</h4>
			<div class="summary">
				<b>Order:</b>
				<pre>{{shipping_summary}}</pre>
			</div>
			{{/status_incomplete}}
		</div>
		
		<div class="data">

		{{#status_incomplete}}
			<button class="orders-delete" data-order_id="{{order_id}}">Delete</button>
		{{/status_incomplete}}
		
		
		{{^status_incomplete}}
			<b>Total:</b> ${{paid_total}} <span>(paid {{paid_date}})</span><br /><br />

		{{#shipped}}
			<b>Shipped on:</b> {{shipped_date}}<br />
			{{#tracking_number}}<b>Tracking number:</b> {{tracking_number}}{{/tracking_number}}
		{{/shipped}}
		

		{{^shipped}}
			<input type="text" name="tracking" placeholder="Tracking number" />
			{{^packaged}}<button class="orders-pack" data-order_id="{{order_id}}">Pack it</button>{{/packaged}}
			<button class="orders-ship" data-id="{{order_id}}">Ship it</button>
			<button class="orders-pickup" data-order_id="{{order_id}}">Pickup</button>
		{{/shipped}}

	{{/status_incomplete}}

		</div>
	</div>


{{/orders_list}}