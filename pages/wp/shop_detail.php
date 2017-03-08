{{#item_detail}}

<div class="col col-left item-detail-gallery">

	{{#preview_image}}<a href="{{preview_image}}" rel="gallery"><img src="{{preview_image}}" class="key" /></a>{{/preview_image}}


	<div class="gallery">
		{{#gallery}}
		<a href="{{url_large}}" rel="gallery"><img src="{{url_small}}" /></a>
		{{/gallery}}
	</div>


</div>

<div class="col col-right item-detail">

	<div class="header">
		<h2>{{title}}</h2>
		<input type="hidden" name="item_id" value="{{id}}" />
		<div class="price" data-base="{{price_base}}">
			<small>$</small>{{price_dollars}} <? // <span>{{price_cents}}</span> ?>
		</div>
		{{#subtitle}}<div class="subtitle">{{subtitle}}</div>{{/subtitle}}
		{{#price_shipping}}<div class="shipping-add">+ ${{price_shipping}} shipping</div>{{/price_shipping}}

	</div>

	<div class="attributes">

		<div class="login-form">
			<div class="inner">
				<div class="loader"></div>
				<h3>Log in to add this item</h3>
				<h4>* We'll create an account for you if you don't already have one.</h4>
				<div class="l">
					<label>Email Address</label>
					<input type="text" id="login-email" />
				</div>
				<div class="r">
					<label>Password</label>
					<input type="password" id="login-pw" />				
				</div>
				<button id="login" class="btn">Log in</button>
			</div>
		</div>

		<div class="col left">

			{{#sold_out}}
			<div class="sold-out">SOLD OUT</div>
			{{/sold_out}}
			
			{{^sold_out}}
			<button id="cart-add" class="btn cart"><span>+</span>Add to cart</button>
			{{/sold_out}}
			
			<div class="added">Added to cart. <br /><a href="/cart/">Checkout now</a></div>

		</div>
		
		<div class="col right">
			<form>
			{{#attributes}}
			<div class="attribute">
				<label>{{label}}</label>
				<select name="attr-{{id}}">
					<option value='blank'>[choose...]</option>
					{{#options}}
					<option value="{{value}}" data-price="{{price}}" {{#default}}selected{{/default}} {{#sold_out}}disabled{{/sold_out}}>{{title}}{{#sold_out}} (sold out){{/sold_out}}</option>
					{{/options}}
				</select>
				<span>{{description}}</span>
			</div>
			{{/attributes}}
			</form>
		</div>
		<div class="clear"></div>
	</div>
	
	<div class="description">
		{{description}}
	</div>

</div>

<div class="clear"></div>

{{/item_detail}}