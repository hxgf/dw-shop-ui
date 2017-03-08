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
		<input type="text" name="title" value="{{title}}" class="title" data-id="inventory" />
		
		<label>URL Title</label>
		<input type="text" name="url_title" class="urltitle" value="{{url_title}}" />
		
		<? /*
		<label>Item Type</label>
		<select name="item_type" class="form-ddown">
			{{#item_types}}
			<option value="{{type_id}}" {{#current}}selected="selected"{{/current}}>{{type_title}}</option>
			{{/item_types}}
		</select>
		*/ ?>
		
		<label>Store Visibility</label>
		<select name="display_status" class="form-ddown">
			<option value="">hidden</option>
			<option value="active" {{#active}}selected="selected"{{/active}}>visible</option>
		</select>


		<label>Collection</label>
		<select name="collection_id" class="form-ddown">
			{{#item_collections}}
			<option value="{{id}}" {{#current}}selected="selected"{{/current}}>{{title}}</option>
			{{/item_collections}}
		</select>



		<label>Sex</label>
		<select name="org_sex" class="form-ddown">
			<option value="">Unisex</option>

			<option value="m" {{#sex_m}}selected="selected"{{/sex_m}}>Men's</option>
			<option value="w" {{#sex_w}}selected="selected"{{/sex_w}}>Women's</option>

		</select>
		
		
		<label>Subtitle</label>
		<input type="text" name="subtitle" value="{{subtitle}}" />
		
		<label>Description</label>
		<textarea name="description">{{description_clean}}</textarea>
		
		<label>Base Price</label>
		<input type="text" name="price_base" value="{{price_base}}" class="bb" />
		

		<label>Quantity</label>
		<input type="text" name="quantity_total" class="bb" value="{{quantity_total}}" />
<? /*
		<label>Discount Code</label>
		<input type="text" name="discount_code" value="{{discount_code}}" />
		
		<label>Discount Percentage</label>
		<input type="text" name="discount_amount" class="bb" value="{{discount_amount}}" />
		*/ ?>

		<button>Save Changes</button> &nbsp;&nbsp;
		<a href="/admin/edit/{{id}}/delete/" class="delete">delete</a>
		
	</div>





	<div class="col col-right">

		<input type="hidden" name="thumbnail_url" id="thumbnail" value="{{thumbnail_url}}" />

		<div class="preview-default" {{#thumbnail_url}}style="background-image: url('{{thumbnail_url}}');"{{/thumbnail_url}}></div>
	
		<div id="file-upload"></div>		
** max width 1024px; **
<br /><Br />
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