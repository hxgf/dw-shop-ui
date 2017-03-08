define(["stereo/smoke-amd", "stereo/stereo", "https://js.stripe.com/v1/"], function(smoke, stereo, stripe) {

	var o = {



		format_currency: function(num) {
	    return num.toFixed(2);
		},


		throttle: function(f, delay){
    var timer = null;
    return function(){
      var context = this, args = arguments;
      clearTimeout(timer);
      timer = window.setTimeout(function(){
            f.apply(context, args);
        },
        delay || 300);
	    };
		},


		discount: function(){
			stereo.json_req('/ajax/discount-update/', { order_id: $("input[name='order-id']").val(), discount_code: $("#discount-code").val() }, function(r){
				window.location = '/cart/';
			});			
		},


		total: function(){
			if ($("#shipping_rush").attr('checked')){
				var shipping_total = o.format_currency( parseFloat($("input[name='shipping_total']").val()) + 6 );
				var total = o.format_currency( parseFloat($("input[name='total']").val()) + 6 );
			}else{
				var shipping_total = o.format_currency( parseFloat($("input[name='shipping_total']").val()) - 6 );
				var total = o.format_currency( parseFloat($("input[name='total']").val()) - 6 );
			}

			$("#shipping_display").text(shipping_total);
			$("#total_display").text(total);
			
			$("input[name='shipping_total']").val(shipping_total);
			$("input[name='total']").val(total);
			
		},

		init: function(){

			// on state value change, check for tax
/* fixit tax stuff
			$(".state-check").change(function(){

				if ($(this).val().toUpperCase() == 'OK'){

					// sales tax visible
					// sales tax add to tal

				}
				
				
				if ($(this).val().toUpperCase() == 'OK'){

					// sales tax visible
					// sales tax add to tal

				}

			// if state was not previously OK, but changed to OK, show sales tax and add amount to total
				// if state was previously OK, but changed to not OK, remove sales tax and subtract amount from total



			});
*/


			$(".remove").click(function(){
				var cart_id = $(this).data('id');
				smoke.confirm('Are you sure?',function(e){
					if (e){
						stereo.json_req('/ajax/cart-remove/', { cart_id: cart_id }, function(r){
							window.location = '/cart/';
						});	
					}
				}, { ok: "Yes", cancel: "No" });				
			});



			$(".discount-code button").click(function(){
				o.discount();
			});
			

			$(".discount-code input").keyup(function(e){
				if (e.keyCode == '13'){
					o.discount();
				}
			});



/*
			$("#match").click(function(){
				$(".user-data").toggleClass("nomatch");
			});
*/










// derp these are both the same whatev

// 			$(".qty input").keyup(o.throttle(function(){

			$(".qty input").blur(function(){

				var nv = $(this).val();
				var ov = $(this).data('ov');
				var id = $(this).data('id');

				if (nv != ov){
					stereo.json_req('/ajax/cart-qty/', { cart_id: id, qty: nv }, function(r){
						window.location = '/cart/';
					});
				}
			});

			$(".qty input").keyup(function(e){
				if (e.keyCode == '13'){
					var nv = $(this).val();
					var ov = $(this).data('ov');
					var id = $(this).data('id');
	
					if (nv != ov){
						stereo.json_req('/ajax/cart-qty/', { cart_id: id, qty: nv }, function(r){
							window.location = '/cart/';
						});
					}
				}
			});


			// wholesale don't let anyone order if it's less than 250
			if ($(".checkout-order").hasClass("wholesale")){
				if ($("input[name='total']").val() > 250){
					$("button.checkout").removeClass("disabled");
				}
			}







			$("#shipping_rush").change(function(){

				o.total();

			});




			$("button.checkout").click(function(){
				if ($(this).hasClass("disabled")){

	        smoke.alert("Minimum $250 required for wholesale orders.");
					
				}else{

					$("button.checkout").addClass('loading');
					var order_id = $("input[name='order-id']").val();
					var total = $("input[name='total']").val();
	
	
					// pk_1oFOnezZ5lpI9MTci2vgdvOxHFSGH
					Stripe.setPublishableKey('pk_1oFOnezZ5lpI9MTci2vgdvOxHFSGH');
					
					var exp = $(".card-exp").val();
							exp = exp.split('/');
					
					Stripe.createToken({
					    number: $('.card-number').val(),
					    cvc: $('.card-cvc').val(),
					    name: $('input[name="billing_name"]').val(),
					    exp_month: exp[0],
					    exp_year: exp[1]
					}, function(status, response) {
					    if (response.error) {
					        smoke.alert(response.error.message);
									$("button.checkout").removeClass('loading');
					    } else {
	
						    $("input[name='token']").val(response['id']);
	
								stereo.json_req('/ajax/cart-validate/', { order_id: order_id, form: $("form").serialize(), total: total }, function(r){
	
									$("button.checkout").removeClass('loading');
	
									if (r.success){
				
										smoke.confirm('Your card will be charged $'+total+'. Is that ok?',function(e){
											if (e){
	/* 											$(".dialog-buttons").addClass("loading"); */
												$("button.checkout").addClass('loading');
	
												var shipping_rush = false;
												if ($("#shipping_rush").attr('checked')){
													shipping_rush = true;
												}
	
												stereo.json_req('/ajax/cart-checkout/', { order_id: order_id, form: $("form").serialize(), total: total, discount_code:$("input[name='discount']").val(), shipping_rush: shipping_rush }, function(r){
													if (r.success){
														window.location = '/account/thanks/';									
													}else{
				//										console.log(r.error);
	/* 													$(".dialog-buttons").removeClass("loading"); */
	
														$("button.checkout").removeClass('loading');
														smoke.alert(r.error);
													}
												});	
											}
										}, {ok:"Yes", cancel:"No"});
				
									}else{
										// send validation errors whatever
				//						smoke.alert(r.error);
				
										$("button.checkout").removeClass('loading');
										$(r.error).each(function(){
											$("input[name='"+this+"']").addClass('error');
										});
				
										$("input.error").live('blur',function(){
											$(this).removeClass('error');
										});
				
									}
								});
	
	
					    }
					});
	


					
				}


			});











		}
	};

  return o;
});