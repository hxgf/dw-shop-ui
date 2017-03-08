<div class="subnav">
	<ul>
		<li><a id="add-wholesale" href="/admin/wholesale/edit/">+ Add file</a></li>
		<li><a id="pwd-wholesale" href="/admin/wholesale/pw/">Change password</a></li>
	</ul>
</div>


{{^edit}}


	{{#pwd}}
	<form action="/admin/wholesale/pw-change/" class="blog-edit" method="post" enctype="multipart/form-data">

		<label>Password</label>
		<input type="text" name="pw" value="{{pw}}" />

		<button>Save</button>
	</form>

	{{/pwd}}


	{{^pwd}}
	<ul class="edit-list">
	{{#downloads_list}}
		<li><a href="/admin/wholesale/edit/{{id}}/">{{title}}</a></li>
	{{/downloads_list}}
	</ul>
	{{/pwd}}

{{/edit}}




{{#edit}}

	<form action="/admin/wholesale/update/{{id}}/" class="blog-edit" method="post" enctype="multipart/form-data">

		<label>Title</label>
		<input type="text" name="title" value="{{title}}" />

		<label>Description</label>
		<textarea name="description">{{description}}</textarea>

		<label>New File</label>
		<input type="file" name="file_upload" />	<br /><br /><br /><br />

		<button>Save</button> &nbsp;&nbsp;
		<a href="/admin/wholesale/delete/{{id}}/" class="delete">delete</a>

	</form>

{{/edit}}