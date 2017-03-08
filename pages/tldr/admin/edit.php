<div class="subnav">
	<ul>
		<li {{#all}}class="current"{{/all}}><a href="/admin/inventory/">all items</a></li>
	</ul>
</div>




{{#item_data}}

<form action="/admin/edit/{{id}}/update/" class="edit-form" method="post">


	<div class="col col-left">
		
		<input name="item-id" id="item-id" value="{{id}}" type="hidden" />
		
		<label>Title</label>
		<input type="text" name="title" value="{{title}}" id="item_title" class="title" data-id="inventory" />

		<label>Short Title</label>
		<input type="text" name="short_title" value="{{short_title}}" />
		
		<label>URL Title</label>
		<input type="text" name="url_title" id="item_url_title" class="urltitle" value="{{url_title}}" />
		
		<a href="/item/{{url_title}}/" target="newbrowserwindow">view in store --></a><br /><br />


		<div class="bb">		
			<label>Store Visibility</label>
			<select name="display_status" class="form-ddown">
				<option value="">hidden</option>
				<option value="active" {{#active}}selected="selected"{{/active}}>visible</option>
			</select>
		</div>

		<div class="bb">		
			<label>Item Type</label>
			<select name="type_id" class="form-ddown">
				{{#item_types}}
				<option value="{{id}}" {{#current}}selected="selected"{{/current}}>{{title}}</option>
				{{/item_types}}
			</select>
		</div>



		<label>Collection</label>
		<select name="collections[]" class="form-ddown multiple" multiple="multiple">
			{{#item_collections}}
			<option value="{{id}}" {{#current}}selected="selected"{{/current}}>{{title}}</option>
			{{/item_collections}}
		</select>
		
		<label>Flag Text <small>NEW!, Limited Edition, etc</small></label>
		<input type="text" name="flag_text" value="{{flag_text}}" />
		
		<label>Description</label>
		<textarea name="description">{{description_clean}}</textarea>
		
		
		<div class="bb">
			<label>Retail Price</label>
			<input type="text" name="price_base" value="{{price_base}}" />
		</div>

		<div class="bb">
			<label>Wholesale</label>
			<input type="text" name="price_wholesale" value="{{price_wholesale}}" />
		</div>
			
		<div class="bb">
			<label>Qty</label>
			<input type="text" name="quantity_total" value="{{quantity_total}}" />
		</div>

<br /><br />
<? /*

		<label>Discount Code</label>
		<input type="text" name="discount_code" value="{{discount_code}}" />
		
		<label>Discount Percentage</label>
		<input type="text" name="discount_amount" class="bb" value="{{discount_amount}}" />
*/ ?>

		<button>Save Changes</button> &nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/admin/edit/{{id}}/delete/" class="delete">delete</a> &nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" class="clone">clone attributes</a>	

	</div>





	<div class="col col-right">

		<input type="hidden" name="thumbnail_url" id="thumbnail" value="{{thumbnail_url}}" />

		<div class="preview-default" {{#thumbnail_url}}style="background-image: url('{{thumbnail_url}}');"{{/thumbnail_url}}></div>
	
		<div id="file-upload"></div>		

		
		<div id="gallery-grid">
			{{#gallery}}
			<div class="gallery-preview" id="gallery-preview-{{seq}}" {{#url}}style="background-image: url('{{url}}');"{{/url}}><div id="gallery-upload-{{seq}}"></div>
				<a href="/admin/gallery-delete/{{seq}}/" data-id="{{seq}}" class="gallery-delete"></a>
			</div>
			<input type="hidden" name="gallery[]" id="gallery-input-{{seq}}" value="{{url}}" />
			{{/gallery}}
			<div class="clear"></div>
		</div>


		<div class="attributes">

			<label>Attributes <small><a href="#" class="addattr">+ add</a></small></label>

		{{#attributes}}
			<div class="attribute">
				<div class="f-left">
					<label>Title</label>
					<input type="text" name="attribute[{{attribute_id}}]" value="{{attribute_title}}" />
				</div>
				<div class="f-left checktop">
					<? /*
					<input type="checkbox" name="required[{{attribute_id}}]" id="required-{{attribute_id}}" {{#required}}checked="checked"{{/required}} />&nbsp;<label class="checkbox" for="required-{{attribute_id}}">Required</label>
					*/ ?>
				</div>
				<div class="clear"></div>
				
				<label>Options <small><a href="{{attribute_id}}" class="addoption">+ add</a></small></label>

				<ul class="options-list list-std" {{^options}}style="display:none;"{{/options}}>
					<li class="legend">
						<span class="li-1"><label>Name</label></span>
						<span class="li-2"><label>Addl. Price</label></span>
						<span class="li-3"><label>QTY</label></span>
						<span class="clear"></span>
					</li>
					{{#options}}
					<li id="{{option_id}}">
						<span class="li-1">
							<input type="text" name="options[{{attribute_id}}][]" class="bb" value="{{title}}" />
						</span>
						<span class="li-2">
							<input type="text" name="options_price[{{attribute_id}}][]" class="bb" value="{{price}}" />
						</span>
						<span class="li-3">
							<input type="text" name="options_qty[{{attribute_id}}][]" class="bb" value="{{qty}}" />
						</span>
						<span class="clear"></span>
					</li>
					{{/options}}
				</ul>
				
			</div>
		{{/attributes}}

			
		</div>



	</div>

	<div class="clear"></div>

</form>


{{/item_data}}