define(["stereo/stereo", "stereo/smoke-amd", "lib/jquery.fancybox-1.3.4.pack.mod"], function(stereo, smoke, fancybox) {

	var o = {

		update_price: function(){

			if (!$(".price").data('wholesale')){
				
				var base = parseFloat( $(".price").data('base') );			
				var total = base;
	
				$(".attribute select").each(function(){
					var price_add = parseFloat( $(this).children('option:selected').data('price') );				
					if (isNaN(price_add)){
						price_add = 0;
					}
					total = total + price_add;
				});
	
				total = total.toFixed(2);
				total = total.split('.');
				
				$(".price").html("$"+total[0]); // +"<span>"+total[1]+"</span>"

			}
		},

		login: function(){
			$(".login-form .inner").removeClass("error");
			stereo.json_req('/ajax/login-remote/', {
					email: $("#login-email").val(),
					password: $("#login-pw").val()
				}, function(s){
				if (s.password){
					$(".login-form .inner").removeClass("loading");
					$(".login-form .inner").addClass("error");
					$("input[name='password']").val('');
					$("input[name='password']").focus();
				}else{
					$(".attributes").removeClass("prompt");
					$(".login-form .inner").removeClass("loading");
					o.cart_add();
				}						
			});			
		},
		
		cart_add: function(){
			var go = true;
			$(".attribute select").each(function(){
				if ($(this).val() == 'blank'){
					go = false;
				}
			});

			if (!go){
				smoke.signal('Please select an option.');
			}
			
			else{

				$(".cart").html("Adding...");
	
				stereo.json_req('/ajax/cart-add/', {
						item_id: $("input[name='item_id']").val(),
						attributes: $("form").serialize()
					}, function(r){
	
					if (r.login){
	
						$(".detail-login").addClass("prompt");
						$("#login-email").focus();
						
						$("#login-pw").live('keydown',function(e){
							if (e.keyCode == '13'){
								o.login();
							}
						});
						
						$("#login").click(function(){
							o.login();
						});
	
					}
	
					else if (r.success){
//						$(".attributes").addClass("success");
						window.location.href = '/cart/';
					}
	
					else{
						alert(r.out);
					}
				});	
				
			}
		
		},



		init: function(){

			o.update_price();


			
			$("a[rel=gallery]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'scrolling'		:	'no',
				'showNavArrows'	:	false
			});




			$(".attribute select").change(function(){
				o.update_price();
			});


			$("#login").live('click', function(){
				$(".login-form .inner").addClass("loading");
			});


			$("#cart-add").click(function(){
				o.cart_add();
			});


			$("a[rel=gallery-bb]").click(function(e){
				e.preventDefault();				
/* 				$("#key").attr('href',$(this).attr('href')); */
				$(".key").attr('src',$(this).data('src'));
			});

		}
	};

  return o;
});