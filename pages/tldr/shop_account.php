
<div class="row account-details">

	<div class="medium-6 columns">

	{{#user_data}}
	{{#user}}
	<form class="user-data {{^info_match}}nomatch{{/info_match}}">

		<h2>Account Information</h2>

		<div class="row account-data">
			<div class="medium-6 columns">				
				<label>Email</label>
				<input type="text" name="email" value="{{email}}" />
			</div>
			<div class="medium-6 columns">
				<label>Password</label>
				<input type="password" name="pw" />			
			</div>
		</div>


		<h2 class="m">Billing/shipping Information</h2>
		<h2 class="nm">Billing Information</h2>

		<div class="row">
			<div class="medium-6 columns">				
				<label>First Name</label>
				<input type="text" name="billing_first" value="{{billing_first}}" />
			</div>
			<div class="medium-6 columns">
				<label>Last Name</label>
				<input type="text" name="billing_last" value="{{billing_last}}" />				
			</div>
		</div>

		<div class="row">
			<div class="medium-6 columns">				
				<label>Phone</label>
				<input type="text" name="billing_phone" value="{{billing_phone}}" />
			</div>
			<div class="medium-6 columns">
			</div>
		</div>

		<div class="row">
			<div class="medium-12 columns">				
				<label>Address</label>
				<input type="text" name="billing_address" value="{{billing_address}}" />
			</div>
		</div>

		<div class="row">
			<div class="medium-4 columns">				
				<label>City</label>
				<input type="text" name="billing_city" value="{{billing_city}}" />
			</div>

			<div class="medium-4 columns">
				<label>State</label>
				<input type="text" name="billing_state" value="{{billing_state}}" />			
			</div>
			
			<div class="medium-4 columns">
				<label>Zip/Post Code</label>
				<input type="text" name="billing_zip" value="{{billing_zip}}" />				
			</div>
		</div>

		<div class="row">
			<div class="medium-4 columns">				
				<label>Country</label>
				<input type="text" name="billing_country" value="{{billing_country}}" />
			</div>
			<div class="medium-8 columns">
<!--
				<div class="inline info-match">
					<label for="match" class="inline"><input type="checkbox" name="info_match" {{#info_match}}checked="checked"{{/info_match}} id="match" /> &nbsp;Same address for shipping & billing information</label>
				</div>
-->
			</div>
		</div>



		<div class="nm">
			<h2>Shipping Information</h2>

	
	
			<div class="row">
				<div class="medium-6 columns">				
					<label>First Name</label>
					<input type="text" name="shipping_first" value="{{shipping_first}}" />
				</div>
				<div class="medium-6 columns">
					<label>Last Name</label>
					<input type="text" name="shipping_last" value="{{shipping_last}}" />			
				</div>
			</div>
	
			<div class="row">
				<div class="medium-12 columns">				
					<label>Address</label>
					<input type="text" name="shipping_address" value="{{shipping_address}}" />
				</div>
			</div>
	
			<div class="row">
				<div class="medium-4 columns">				
					<label>City</label>
					<input type="text" name="shipping_city" value="{{shipping_city}}" />
				</div>
	
				<div class="medium-4 columns">
					<label>State</label>
					<input type="text" name="shipping_state" value="{{shipping_state}}" />	
				</div>
				
				<div class="medium-4 columns">
					<label>Zip/Post Code</label>
					<input type="text" name="shipping_zip" value="{{shipping_zip}}" />		
				</div>
			</div>
	
			<div class="row">
				<div class="medium-4 columns">				
					<label>Country</label>
					<input type="text" name="shipping_country" value="{{shipping_country}}" />
				</div>
				<div class="medium-8 columns">
				</div>
			</div>

		</div>


	</form>
	{{/user}}
	{{/user_data}}

	
	<button class="btn account">Save changes</button>


	</div>



	<div class="medium-6 columns account-status">


	{{#order_status}}

		

		{{#empty}}
		<div class="empty">

		</div>
		{{/empty}}
		
		{{^empty}}
		
			{{#thanks}}
			<div class="thanks">
				Your order has been placed and will be shipped very soon. Thanks! We love you.
			</div>
			{{/thanks}}


			<h2>Order information</h2>

			{{#order_incomplete}}
			<div class="order-incomplete">
			** Your current order has not been placed **<br />
			<a href="/cart/">Order details / checkout here</a>
			</div>
			{{/order_incomplete}}
	
			<div class="order-status">
				{{#order_detail}}
				<div class="order">
					<ul>
						<li>Order # <i>{{order_number}}</i></li>
						<li class="price">Total <i><span>$</span>{{price_total}}</i></li>
						<li class="status">Status <i>{{status}}</i> </li>
						{{#tracking_number}}<li class="tracking">Tracking # <i>{{tracking_number}}</i></li>{{/tracking_number}}
					</ul>
					<pre class="summary">{{shipping_summary}}</pre>

				</div>
				{{/order_detail}}
			</div>

			<div class="fine-print">

			</div>
	
		{{/empty}}



	{{/order_status}}


	</div>
</div>
