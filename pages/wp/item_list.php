{{#item_list}}
<ul class="item-list">
	{{#item}}
	<li>
		<a href="/item/{{id}}/{{url_title}}/"><img src="{{thumbnail_url}}" /></a>
		<span class="data">
			<a href="/item/{{id}}/{{url_title}}/">{{title}}</a>
			<span class="price">
				<small>$</small>{{price_dollars}} <? // <span>{{price_cents}}</span> ?>
			</span>
			{{#subtitle}}<span class="subtitle">{{subtitle}}</span>{{/subtitle}}
		</span>
	</li>
	{{/item}}
</ul>
{{/item_list}}