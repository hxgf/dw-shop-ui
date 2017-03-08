<!-- item-list -->
{{#item_list}}
<ul class="item-list small-block-grid-3 medium-block-grid-4 large-block-grid-5">
	{{#item}}
	<li>
		<div class="il-container">
			{{#sold_out}}<span class="sold-out">SOLD OUT</span>{{/sold_out}}
			{{^sold_out}}
				{{#flag_text}}<span class="flag-text">{{flag_text}}</span>{{/flag_text}}
			{{/sold_out}}
			<a href="/item/{{url_title}}/"><img src="{{thumbnail_url}}" class="thumb" /></a>
	
			<span class="data">
				<div class="data-content">
					<a href="/item/{{url_title}}/">{{short_title}}</a>
					<span class="price">
		
						{{#wholesale}}
						{{#wholesale_price}}<small>$</small>{{wholesale_price}}{{/wholesale_price}}
						{{^wholesale_price}}<div class="unavailable">NOT AVAILABLE<br /> FOR WHOLESALE</div>{{/wholesale_price}}
						<div class="retail">Retail: ${{price_total}}</div>
						{{/wholesale}}
		
						{{^wholesale}}
						${{price_dollars}} <? // <span>{{price_cents}}</span> ?>
						{{/wholesale}}
					</span>
					{{#subtitle}}<span class="subtitle">{{subtitle}}</span>{{/subtitle}}
				</span>
			</div>
			<a href="/item/{{url_title}}/"><img src="{{img}}/blank.gif" class="blank" /></a>
		</div>
	</li>
	{{/item}}
</ul>
{{/item_list}}

<? /*
{{#paginate}}
<div class="paginate">
	<div>
		{{#prev}}<a href="{{prev}}"><span>&#8592;</span> Previous</a>{{/prev}}
		{{#next}}<a href="{{next}}">Next <span>&#8594;</span></a>{{/next}}
	</div>
</div>
{{/paginate}}
*/ ?>