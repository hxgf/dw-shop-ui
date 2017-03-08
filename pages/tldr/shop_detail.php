{{#item_detail}}



<div class="row detail">
  <div class="medium-7 columns">
	  
		<div class="detail-header">
			<h2>{{title}}</h2>
			<input type="hidden" name="item_id" value="{{id}}" />
			{{#subtitle}}<div class="subtitle">{{subtitle}}</div>{{/subtitle}}
	
			<div class="price" data-base="{{price_base}}" {{#wholesale}}data-wholesale="true"{{/wholesale}}>
	
					{{#wholesale}}
					{{#wholesale_price}}${{wholesale_price}}{{/wholesale_price}}
					{{^wholesale_price}}<div class="unavailable">NOT AVAILABLE FOR WHOLESALE</div>{{/wholesale_price}}
					<div class="retail">Retail: ${{price_total}}</div>
					{{/wholesale}}
	
	
					{{^wholesale}}
					${{price_dollars}}
					{{/wholesale}}
			</div>
			{{#price_shipping}}<div class="shipping-add">+ ${{price_shipping}} shipping</div>{{/price_shipping}}
		</div>




	
		<div class="detail-description">
			{{description}}
		</div>


	  
  </div>
  <div class="medium-5 columns detail-images">
		{{#sold_out}}
		<span class="sold-out">SOLD OUT</span>
		{{/sold_out}}
		{{^sold_out}}
			{{#flag_text}}<span class="flag-text">{{flag_text}}</span>{{/flag_text}}
		{{/sold_out}}


	  	{{#preview_image}}<a href="{{original_image}}" rel="gallery" id="key"><img src="{{preview_image}}" class="key" /></a>{{/preview_image}}

		<ul class="small-block-grid-4">
			{{#gallery}}
			<li><a href="{{url_large}}" rel="gallery-bb" data-src="{{url_preview}}"><img src="{{url_small}}" /></a></li>
			{{/gallery}}
		</ul>

  </div>
</div>





<div class="row detail-footer">
  <div class="medium-7 columns">

		<div class="row checkout">
		  <div class="medium-6 small-6 columns">
	
				{{#sold_out}}
				<div class="sold-out-add">CURRENTLY <br />OUT OF STOCK</div>
				{{/sold_out}}
				
				{{#button_visible}}
				<button id="cart-add" class="cart">Add to Cart</button>
				{{/button_visible}}

		  </div>

		  <div class="medium-6 small-6 columns">
	
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
		</div>





		<div class="detail-login">
		
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
						<button class="btn" id="login">Log in</button>
					</div>
				</div>
		
		</div>



  </div>
</div>



















{{/item_detail}}