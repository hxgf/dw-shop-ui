<div class="subnav">
	<ul>
		<li><a id="add-blog" href="/admin/blog/edit/">+ New blog post</a></li>
	</ul>
</div>


{{^edit}}

	<ul class="edit-list">
	{{#blog_list}}
		<li><a href="/admin/blog/edit/{{id}}/">{{#title}}{{title}}{{/title}}{{^title}}[no title]{{/title}}</a></li>
	{{/blog_list}}
	</ul>

{{/edit}}




{{#edit}}

	<form action="/admin/blog/update/{{id}}/" class="blog-edit" method="post">

		<label>Title</label>
		<input type="text" name="title" value="{{title}}" />
		
		<label>Post Date <small>MM-DD-YYYY</small></label>
		<input type="text" name="date_added" value="{{date}}" />


<? /* FW */ ?>
<label>ADD IMAGE <small>click square to upload. * width: 640px</small></label>
<div id="gallery-grid-blog">
	<div class="preview-default" id="gallery-preview-blog" {{#img_url}}style="background-image: url('{{img_url}}');"{{/img_url}}>
		<div id="gallery-upload-blog"></div>
	</div>
	<input type="hidden" name="img_url" id="gallery-input-blog" value="{{img_url}}" />
</div>

<label>Image Link <small>* starts with http://</small></label>
<input type="text" name="img_link_url" value="{{img_link_url}}" />






<textarea id="notes" name="content" >{{content}}</textarea>

<div id="notes-toolbar">
	<button class="bold" data-tag="bold"><span class="alt"><b>bold</b></span> &nbsp;</button>
	<button class="italic" data-tag="italic"><span class="alt"><b>italic</b></span> &nbsp;</button>
	<button class="underline" data-tag="underline"><span class="alt"><b>underline</b></span> &nbsp;</button>
	<button class="strike break" data-tag="strikeThrough"><span class="alt"><b>strike through</b></span> &nbsp;</button>
	<button class="link" data-tag="createLink"><span class="alt"><b>link</b></span> &nbsp;</button>
	<button class="list break" data-tag="insertUnorderedList"><span class="alt"><b>list</b></span> &nbsp;</button>
	<button class="blockquote" data-tag="blockquote"><span class="alt"><b>insert quote</b></span> &nbsp;</button>
	<button class="code" data-tag="code"><span class="alt"><b>insert code block</b></span> &nbsp;</button>
<? //	<button class="image break" data-tag="image"><span class="alt"><b>insert image</b></span> &nbsp;</button> ?>	
	<? // <button class="html" data-tag="html"><span class="alt"><b>view html</b></span> &nbsp;</button> ?>
</div>
<div id="notes-input" class="textarea" contenteditable="true">{{content}}</div>






		<button>Save</button> &nbsp;&nbsp;
		<a href="/admin/blog/delete/{{id}}/" class="delete">delete</a>

	</form>

{{/edit}}