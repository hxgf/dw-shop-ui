{{#cart}}



	{{#empty}}
<h2 class="empty">
	You don't have any items in your shopping cart.
</h2>
	{{/empty}}




	{{^empty}}


<div class="row checkout">

	<div class="medium-6 columns checkout-order {{#wholesale}}wholesale{{/wholesale}}">

	
		<input type="hidden" name="order-id" value="{{order_id}}" />

	<ul>
		{{#items}}
		<li id="cart-{{cart_id}}">
			<span class="data">
				{{#thumbnail_url}}<a href="/item/{{url_title}}/"><img src="{{thumbnail_url}}" /></a>{{/thumbnail_url}}
				<span class="details">
					<h2><a href="/item/{{url_title}}/">{{title}}</a></h2>
					{{#attributes}}
					{{#attribute}}<span class="attribute">{{attribute}}:
						<span class="option">{{option}}</span>
					</span>{{/attribute}}
					{{/attributes}}

					<span class="qty">
						<input type="text" name="qty[{{cart_id}}]" data-id="{{cart_id}}" data-ov="{{cart_qty}}" value="{{cart_qty}}" />
					</span>

				</span>
			</span>
			<span class="price">
				<span class="dollar">$</span><span class="amount">{{item_total}}</span>

				<span class="remove" data-id="{{cart_id}}">X</span>
				
			</span>
		</li>
		{{/items}}
	</ul>

	<div class="col discount-code">
		{{^wholesale}}
		<label>Discount Code:</label>
		<input type="text" name="discount" id="discount-code" value="{{discount_code}}" />
		<button><span>&raquo;</span></button>
		<div class="details">
			{{discount_details}}
		</div>
		{{/wholesale}}
		{{#wholesale}}
		&nbsp;
		{{/wholesale}}
	</div>
	
	<ul class="col checkout-post">

	{{#discount}}
		<li class="discount">
			<span class="price-label">
				Discount
			</span>
			<span class="price">
				&mdash;&nbsp; <i>{{discount}}</i>
			</span>			
			<span class="border"></span>
		</li>
	{{/discount}}


	{{#shipping}}
		<li class="shipping">
			<span class="price-label">
				Shipping
			</span>
			<span class="price">
				+&nbsp; <i id="shipping_display">{{shipping}}</i>
			</span>			
			<span class="border"></span>
			<input type="hidden" name="shipping_total" value="{{shipping}}" />
		</li>
	{{/shipping}}

	
	<li class="tax {{^tax}}hidden{{/tax}}">
		<input type="hidden" name="tax" value="{{tax}}" />
		<span class="price-label">
			Sales Tax
		</span>
		<span class="price">
			+&nbsp; <i>{{tax}}</i>
		</span>
		<span class="border"></span>
	</li>

	


	{{#total}}
		<li class="total">
			<input type="hidden" name="total" value="{{total}}" />
			<span class="price-label">
				Total
			</span>
			<span class="price">
				<span>$</span><i id="total_display">{{total}}</i>
			</span>
		</li>
	{{/total}}

	</ul>

	<div class="clear"></div>




	</div>

	
	<div class="medium-16 columns checkout-data">



	{{#user}}



	<form class="user-data {{^info_match}}nomatch{{/info_match}}">

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
<br />
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

			</div>
		</div>
		<div class="row">
<!--
				<div class="inline info-match">
					<label for="match" class="inline"><input type="checkbox" name="info_match" {{#info_match}}checked="checked"{{/info_match}} id="match" /> &nbsp;Same address for shipping & billing information</label>
				</div>
-->
		</div>

<br />

		<div class="row">
			<div class="medium-6 columns">	
				<label>Credit Card Number <small>(no spaces)</small></label>
				<input type="text" class="card-number" maxlength="20" name="cc_n" />
			</div>	

			<div class="medium-3 columns">		
				<label>Exp <small>(MM/YYYY)</small></label>
				<input type="text" maxlength="7" class="card-exp" name="cc_e" />
			</div>
	
			<div class="medium-3 columns">		
				<label>Security Code</label>
				<input type="text" maxlength="4" class="card-cvc" name="cc_cvv" />
			</div>
		</div>
		<input type="hidden" name="token" />




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
				<div class="medium-6 columns">				
					<label>Phone</label>
					<input type="text" name="shipping_phone" value="{{shipping_phone}}" />
				</div>
				<div class="medium-6 columns">
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

	<div class="checkout-post">


		<div class="fine-print">
		{{^wholesale}}
		We ship orders once a week, but if you need it sooner than that, choose rush shipping and we'll send it out tomorrow (today if we get it before noon CST).
		{{/wholesale}}
		{{#wholesale}}
		* Minimum $250 required for wholesale orders.
		{{/wholesale}}
		</div>


		{{^wholesale}}
		<input type="checkbox" id="shipping_rush" /><label id="shipping_rush_label" for="shipping_rush">Rush shipping &nbsp; (+ $6)</label>
		{{/wholesale}}


		
		<button class="btn checkout {{#wholesale}}disabled{{/wholesale}}"><span></span>Check out</button>
	

	</div>

</div>
</div>


	{{/empty}}

{{/cart}}