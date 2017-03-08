<div class="subnav">
	<ul>
		<li><a href="/admin/stockists/edit/">+ Add stockist</a></li>
	</ul>
</div>


{{^edit}}

	<ul class="edit-list">
	{{#stockist_list}}
		<li><a href="/admin/stockists/edit/{{id}}/">{{title}}</a></li>
	{{/stockist_list}}
	</ul>

{{/edit}}




{{#edit}}

	<form action="/admin/stockists/update/{{id}}/" method="post">

		<label>Title</label>
		<input type="text" name="title" value="{{title}}" />
		
		<label>Address 1</label>
		<input type="text" name="address_1" value="{{address_1}}" />
		
		<label>Address 2</label>
		<input type="text" name="address_2" value="{{address_2}}" />
		
		<label>Web site <small><i>* needs to start w/ http://</i></small></label>
		<input type="text" name="url" value="{{url}}" />
		
		<? // fixit upload ?>
		<input type="hidden" name="thumbnail_url" value="{{thumbnail_url}}" />

		<button>Save</button> &nbsp;&nbsp;
		<a href="/admin/stockists/delete/{{id}}/" class="delete">delete</a>

	</form>

{{/edit}}