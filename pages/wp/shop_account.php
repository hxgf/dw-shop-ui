
<div class="col col-left account-order">

	{{#order_status}}

		{{#empty}}
		<div class="empty">
		<img src="{{img}}/blank-x.png" /> 
		</div>
		{{/empty}}
		
		{{^empty}}
		
			{{#thanks}}
			<div class="thanks">
				Your order has been placed and will be shipped soon.
			</div>
			{{/thanks}}
	
			<div class="order-status">
				{{#order_detail}}
				<div class="order">
					<ul>
						<li>Order # {{order_number}}</li>
						<li class="price">Total: <span>$</span>{{price_total}}</li>
						<li>Status: {{status}} {{#tracking_number}}<br />Tracking # {{tracking_number}}{{/tracking_number}}</li>
					</ul>
					<pre class="summary">{{shipping_summary}}</pre>

				</div>
				{{/order_detail}}
			</div>

			<div class="fine-print">
			<? //	* Whatever fine print is needed (who we ship with, helpful information, etc). <br />After that, link to contact and legal. ?>
			</div>
	
		{{/empty}}


	{{/order_status}}

</div>



<div class="col col-right account-order">


	{{#user_data}}
	{{#user}}

	{{#credit_balance}}
	<h3>Store credit: ${{credit_balance}}</h3><br /><br />
	{{/credit_balance}}


	<form class="user-data {{^info_match}}nomatch{{/info_match}}">

		<h2>Account Information</h2>

		<div class="account-data">
			<div class="col half">	
				<label>Email</label>
				<input type="text" name="email" value="{{email}}" />
			</div>
			<div class="col half">
				<label>Password</label>
				<input type="password" name="pw" />
			</div>
			<div class="clear"></div>
		</div>


		<h2 class="m">Billing/shipping Information</h2>
		<h2 class="nm">Billing Information</h2>

		<div class="col half">	
			<label>Full Name</label>
			<input type="text" name="billing_name" value="{{billing_name}}" />
		</div>
		<div class="col half">
			<label>Street Address</label>
			<input type="text" name="billing_address" value="{{billing_address}}" />
		</div>

		<div class="col third">		
			<label>City</label>
			<input type="text" name="billing_city" value="{{billing_city}}" />
		</div>

		<div class="col fourth">				
			<label>State</label>
			<input type="text" name="billing_state" value="{{billing_state}}" />
		</div>
			
		<div class="col quarter">		
			<label>Country</label>
			<input type="text" name="billing_country" maxlength="2" value="{{billing_country}}" />
		</div>
	
		<div class="col quarter">		
			<label>Zip/Postal Code</label>
			<input type="text" name="billing_zip" value="{{billing_zip}}" />
		</div>

		<div class="clear"></div>


		<div class="inline">
			<input type="checkbox" name="info_match" {{#info_match}}checked="checked"{{/info_match}} id="match" /> <label for="match" class="inline">Use the same address for shipping and billing information</label>
		</div>


		<div class="nm">
			<h2>Shipping Information</h2>

			<div class="col half">	
				<label>Full Name</label>
				<input type="text" name="shipping_name" value="{{shipping_name}}" />
			</div>
			<div class="col half">
				<label>Street Address</label>
				<input type="text" name="shipping_address" value="{{shipping_address}}" />
			</div>
	
			<div class="col third">		
				<label>City</label>
				<input type="text" name="shipping_city" value="{{shipping_city}}" />
			</div>
	
			<div class="col fourth">				
				<label>State</label>
				<input type="text" name="shipping_state" value="{{shipping_state}}" />
			</div>
				
			<div class="col quarter">		
				<label>Country</label>
				<input type="text" name="shipping_country" maxlength="2" value="{{shipping_country}}" />
			</div>
		
			<div class="col quarter">		
				<label>Zip/Postal Code</label>
				<input type="text" name="shipping_zip" value="{{shipping_zip}}" />
			</div>
	
			<div class="clear"></div>

		</div>

	</form>
	{{/user}}
	{{/user_data}}

	
	<button class="btn account">Save changes</button>
	<br /><br /><br />

</div>

