{{#cart}}


	{{#empty}}
<div class="empty">
	You don't have any items in your shopping cart.
</div>
	{{/empty}}




	{{^empty}}
	
<div class="checkout-order col col-left">
<input type="hidden" name="order-id" value="{{order_id}}" />

	<ul>
		{{#items}}
		<li class="cart-item">
			<span class="data">
				{{#thumbnail_url}}<a href="/item/{{url_title}}/"><img src="{{thumbnail_url}}" /></a>{{/thumbnail_url}}
				<span class="details">
					<h2><a href="/item/{{url_title}}/">{{title}}</a></h2>
					{{#attributes}}
					<span class="attribute">{{attribute}}:
						<span class="option">{{option}}</span>
					</span>
					{{/attributes}}
				</span>
			</span>
			<span class="price">
				<span>$</span>{{item_total}}

				<span class="remove" data-id="{{cart_id}}">X</span>
				
			</span>
		</li>
		{{/items}}
	</ul>

	<div class="col discount-code">
		<label>Discount Code</label>
		<input type="text" name="discount" id="discount-code" value="{{discount_code}}" />
		<button><span>&raquo;</span></button>
		<div class="details">
			{{discount_details}}
		</div>
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

	{{#credit}}
		<li class="discount">
			<span class="price-label">
				Credit
			</span>
			<span class="price">
				&mdash;&nbsp; <i>{{credit}}</i>
			</span>			
			<span class="border"></span>
		</li>
	{{/credit}}


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
			<input type="hidden" name="subtotal" value="{{total}}" />
			<span class="price-label">
				Total
			</span>
			<span class="price">
				<span>$</span> <i id="total_display">{{total}}</i>
			</span>
		</li>
	{{/total}}

	</ul>

	<div class="clear"></div>

</div>




<div class="checkout-data col col-right">

	{{#user}}
	<form class="user-data {{^info_match}}nomatch{{/info_match}}">
	<input type="hidden" name="credit" value="{{credit}}" />

		<h2 class="m">Billing/shipping Information</h2>
		<h2 class="nm">Billing Information</h2>

		<div class="col half">	
			<label>Full Name</label>
			<input type="text" name="billing_name" class="required" value="{{billing_name}}" />
		</div>
		<div class="col half">
			<label>Street Address</label>
			<input type="text" name="billing_address" class="required" value="{{billing_address}}" />
		</div>

		<div class="col third">		
			<label>City</label>
			<input type="text" name="billing_city" class="required" value="{{billing_city}}" />
		</div>

		<div class="col fourth">				
			<label>State</label>
			<input type="text" name="billing_state" class="required" class="state-check" data-state="{{billing_state}}" value="{{billing_state}}" />
		</div>
			
		<div class="col quarter">		
			<label>Country</label>
			<input type="text" name="billing_country" class="required" maxlength="2" value="{{billing_country}}" />
		</div>
	
		<div class="col quarter">		
			<label>Zip/Postal Code</label>
			<input type="text" name="billing_zip" class="required" value="{{billing_zip}}" />
		</div>

		<div class="clear"></div>


		<div class="inline">
			<input type="checkbox" name="info_match" {{#info_match}}checked="checked"{{/info_match}} id="match" /> <label for="match" class="inline">Use the same address for shipping and billing information</label>
		</div>


		<label>Credit Card Type</label>
		<select name="cc_t" id="card_type">
			<option value="Visa">Visa</option>
			<option value="MasterCard">MasterCard</option>
			<option value="Discover">Discover</option>
			<option value="Amex">Amex</option>
		</select>

		<div class="col half">	
			<label>Credit Card Number <small>(no spaces)</small></label>
			<input type="text" class="card-number required" maxlength="20" name="cc_n" />
		</div>		

		<div class="col quarter">		
			<label>Exp <small>(MM/YYYY)</small></label>
			<input type="text" maxlength="7" class="card-exp required" name="cc_e" />
		</div>

		<div class="col quarter">		
			<label>Security Code</label>
			<input type="text" maxlength="4" class="card-cvc required" name="cc_cvv" />
		</div>
		<div class="clear"></div>

		<input type="hidden" name="token" />


		<div class="nm">
			<h2>Shipping Information</h2>

			<div class="col half">	
				<label>Full Name</label>
				<input type="text" name="shipping_name" class="also-required" value="{{shipping_name}}" />
			</div>
			<div class="col half">
				<label>Street Address</label>
				<input type="text" name="shipping_address" class="also-required" value="{{shipping_address}}" />
			</div>
	
			<div class="col third">		
				<label>City</label>
				<input type="text" name="shipping_city" class="also-required" value="{{shipping_city}}" />
			</div>
	
			<div class="col fourth">				
				<label>State</label>
				<input type="text" name="shipping_state" class="also-required" value="{{shipping_state}}" />
			</div>
				
			<div class="col quarter">		
				<label>Country</label>
				<input type="text" name="shipping_country" class="also-required" maxlength="2" value="{{shipping_country}}" />
			</div>
		
			<div class="col quarter">		
				<label>Zip/Postal Code</label>
				<input type="text" name="shipping_zip" class="also-required" value="{{shipping_zip}}" />
			</div>
	
			<div class="clear"></div>

		</div>

	</form>
	{{/user}}

	<div class="checkout-post">
		
<? //		<input type="checkbox" id="shipping_rush" /> <label id="shipping_rush_label" for="shipping_rush">Rush shipping &nbsp;<small>(+ $6)</small></label> ?>
		
		<button class="btn checkout"><span></span>Check out</button>
	
		<div class="fine-print">
<? //		We ship orders once a week, but if you need it sooner than that, choose rush shipping and we'll send it out tomorrow (today if we get it before noon CST). ?>
		</div>
	</div>

</div>


<div class="clear"></div>

	{{/empty}}

{{/cart}}