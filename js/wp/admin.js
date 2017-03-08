define(["stereo/stereo","stereo/smoke-amd","lib/fileuploader","lib/jquery-ui-1.10.1.custom.min"], function(stereo, smoke, fileuploader, jqueryui) {

	var o = {
		init: function(){

// global form submission

// inline form submission



		if ($(".inventory-container").length){
			$(".inventory-container").sortable({
				stop: function(event,ui){

					var item_list = $(".inventory-container").sortable('toArray');

					stereo.json_req('/admin/inventory-order-update/', { item_list:item_list }, function(r){
			
					});

				}
			});
			$(".inventory-container").disableSelection();
		}


		if ($(".credits-list").length){
			$(".credits-list input").blur(function(){
				stereo.json_req('/admin/credit-update/', { user_id:$(this).data('id'), credit_balance:$(this).val() }, function(r){
				});			
			});
		}





	// add item
	$(".item-add").click(function(){
		stereo.json_req('/admin/item-add/', { }, function(r){
// fixit
//			window.location = '/cart/';
		});			
	});



	$("input.title").blur(function(){
		stereo.json_req('/admin/item-urltitle/', { title: $(this).val() }, function(r){
			$("input.urltitle").val(r.urltitle);
		});		
	});



	// order update
	$(".orders-ship").click(function(){

		var order_id = $(this).data('id');
		var tracking_number = $(this).siblings('input').val();

		stereo.json_req('/admin/order-ship/', { 
			order_id: order_id, 
			tracking_number: tracking_number 
			}, function(r){
// 				alert(r.out);
				window.location.reload();
		});

	});




/*
	$("#add-discount").click(function(e){
		e.preventDefault();
		$(".add-discount").addClass("visible");
	});
*/





	$("#item-add").click(function(e){
		e.preventDefault();


		smoke.prompt('New item title:',function(e){
			if (e){

				stereo.json_req('/admin/item-add/', { 
					title: e
					}, function(r){
						window.location = "/admin/edit/"+r.item_id+"/";
				});

			}else{}
		}, {ok:"Add item", cancel:"Cancel"});	

	});





// EDIT

	// file upload stuff

  function createUploader(){
      var uploader = new qq.FileUploader({
          element: document.getElementById('file-upload'),
          action: '/media/etc/fileuploader.php',
          debug: true,
	        template: '<div class="qq-uploader">' + 
						'<div class="qq-upload-drop-area"><span>drop file here to upload</span></div>' +
						'<div class="qq-upload-button">upload a new primary image</div>' +
						'<ul class="qq-upload-list"></ul>' + 
					'</div>',

	        fileTemplate: '<li>' +
            '<span class="qq-upload-file"></span>' +
            '<span class="qq-upload-spinner"></span>' +
            '<span class="qq-upload-size"></span>' +
            '<a class="qq-upload-cancel" href="#">Cancel</a>' +
            '<span class="qq-upload-failed-text">Failed</span>' +
          '</li>',

					onComplete: function(id, fileName, responseJSON){
						stereo.json_req('/admin/upload-post/', { 
							item_id: $("#item-id").val(),
							filename: fileName 
							}, 
							function(r){							
								$(".preview-default").css('background-image',"url('"+r.thumb+"')");
								$("input#thumbnail").val(r.thumb);
								$(".qq-upload-button").hide();
						});
					},

      });           
  }
  
  if ($("#file-upload").length){
		createUploader();	  
  }

/* FW */
  function _createUploader(gallery_id){
      var uploader = new qq.FileUploader({
          element: document.getElementById('gallery-upload-'+gallery_id),
          action: '/media/etc/fileuploader.php',
          debug: true,
	        template: '<div class="qq-uploader">' + 
						'<div class="qq-upload-drop-area"><span>drop file here to upload</span></div>' +
						'<div class="qq-upload-button"></div>' +
						'<ul class="qq-upload-list"></ul>' + 
					'</div>',

	        fileTemplate: '<li>' +
            '<span class="qq-upload-file"></span>' +
            '<span class="qq-upload-spinner"></span>' +
            '<span class="qq-upload-size"></span>' +
            '<a class="qq-upload-cancel" href="#">Cancel</a>' +
            '<span class="qq-upload-failed-text">Failed</span>' +
          '</li>',

					onComplete: function(id, fileName, responseJSON){
						stereo.json_req('/admin/upload-post-gallery/', { 
							item_id: $("#item-id").val(),
							gallery_order: gallery_id,
							filename: fileName 
							}, 
							function(r){							
								$("#gallery-preview-"+gallery_id).css('background-image',"url('"+r.thumb+"')");
								$("#gallery-input-"+gallery_id).val(r.thumb);
						});
					},

      });           
  }
  
  if ($("#gallery-upload-blog").length){
		_createUploader('blog');
  }
  
  if ($("#gallery-grid").length){
  	// FUCK ME IN THE FACE
		_createUploader('1');
		_createUploader('2');
		_createUploader('3');
		_createUploader('4');
		_createUploader('5');
		_createUploader('6');
		_createUploader('7');
		_createUploader('8');
		_createUploader('9');
		_createUploader('10');
		_createUploader('11');
		_createUploader('12');	

		$("#gallery-grid a.gallery-delete").live('click',function(e){
			e.preventDefault();
			e.stopPropagation();
			var thref = $(this).attr('href');
			var seq = $(this).data('id');
			var item_id = $("#item-id").val();

			smoke.confirm('Are you sure?',function(e){
				if (e){
/*
				stereo.json_req(thref, { 
					seq: seq,
					item_id: item_id
					}, function(r){

				});		
*/			

				$("#gallery-preview-"+seq).css('background-image',"none");
				$("#gallery-input-"+seq).val('');

				}else{}
			}, {ok:"Yes", cancel:"No"});	
		});
  }






	
	// add attribute
	
	var newid = 0;
	
	$("a.addattr").live('click',function(e){
		e.preventDefault();
		newid = newid + 1;
		$(".attributes").append(
				'<div class="attribute">'+
					'<div class="f-left">'+
						'<label>Name</label>'+
						'<input type="text" name="attribute['+newid+']" />'+
					'</div>'+
					'<div class="f-left checktop">'+
						'<input type="checkbox" name="required['+newid+']" id="required-'+newid+'" />&nbsp;'+
						'<label class="checkbox" for="required-'+newid+'">Required</label>'+
					'</div>'+
					'<div class="clear"></div>'+
					
					'<label>Options <small><a href="'+newid+'" class="addoption">+ add</a></small></label>'+
	
					'<ul id="options-'+newid+'" class="options-list list-std" style="display:none;">'+
						'<li class="legend">'+
							'<span class="li-1"><label>Name</label></span>'+
							'<span class="li-2"><label>Addl. Price</label></span>'+
							'<span class="li-3"><label>QTY</label></span>'+
							'<span class="clear"></span>'+
						'</li>'+
					'</ul>'+
					
				'</div>');
	
	});
	
	
	
	$("a.addoption").live('click',function(e){
		e.preventDefault();
		var nid = $(this).attr('href');
		
		var thelist = $(this).parent().parent().siblings('ul.options-list');
	
		thelist.append(
						'<li>'+
							'<span class="li-1">'+
								'<input type="text" name="options['+nid+'][]" class="bb" />'+
							'</span>'+
							'<span class="li-2">'+
								'<input type="text" name="options_price['+nid+'][]" class="bb" />'+
							'</span>'+
							'<span class="li-3">'+
								'<input type="text" name="options_qty['+nid+'][]" class="bb" />'+
							'</span>'+
							'<span class="clear"></span>'+
						'</li>');
		
		if (!thelist.is(':visible')){
			thelist.css('display','block');
		}
	
	
	});





	$(".delete").click(function(e){
		e.preventDefault();
		
		var thref = $(this).attr('href');

		smoke.confirm('Are you sure?',function(e){
			if (e){
				window.location = thref;
			}else{}
		}, {ok:"Yes", cancel:"No"});	

	});






/*

	$('a.delete_code').click(function(e){
		e.preventDefault();
		
		var delhref = $(this).attr('href');
		
		smoke.confirm('Delete this code?',function(e){
			if (e){

			$.post(delhref,{},function(data){
					window.location = '/admin/discounts/';
			});

			}else{}
		}, {ok:"yes", cancel:"no"});			
	
	});
*/







// text editor (blog)
	// fixit make this a portable component that can be open-sourced

		$("#notes-toolbar button").live('click',function(e){
			e.preventDefault();
		});
		$("#notes-input").blur(function(){
			$("#notes").val($(this).html());
		});
		
		
			var editor = document.getElementById('notes');
			var buttons_container = document.getElementById('notes-toolbar');					
			var buttons = $("#notes-toolbar button");
			for ( var i=0, l=buttons.length; i<l; i++ ) {
				buttons[i].addEventListener('click',function(e) {
					var tag = this.getAttribute('data-tag');
					switch(tag) {
					
						case 'createLink':				
		
							var link = prompt('Link address:');
							if(link) {
								document.execCommand('createLink', false, link);
							}
						break;
						
						case 'code':
							document.execCommand('formatBlock', false, '<pre>');				
						break;
						
						case 'blockquote':
							document.execCommand('formatBlock', false, '<blockquote>');				
						break;
										
						
						default:
							document.execCommand(tag, false, this.getAttribute('data-value'));
					}
					e.preventDefault();
				});
			}








		}
	};

  return o;
});