define(["stereo/smoke-amd", "stereo/stereo"], function(smoke, stereo) {

	var o = {



		format_currency: function(num) {
	    return num.toFixed(2);
		},


		total: function(){

			var cart_count = $("li.cart-item").length;
			var shipping_total;
			var billing_country = $("input[name='billing_country']").val();

			if (
				billing_country.toLowerCase() == 'us'
			){
				if (cart_count < 4){
					shipping_total = 6;
				}else{
					shipping_total = 8;
				}

			}else{
				if (cart_count > 4){
					shipping_total = 25;
				}else{
					shipping_total = 18;
				}				
			}


			var total = o.format_currency( parseFloat($("input[name='subtotal']").val()) + shipping_total );
			shipping_total = o.format_currency( shipping_total );

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
				smoke.confirm('Are you sure you want to remove this item?',function(e){
					if (e){
						stereo.json_req('/ajax/cart-remove/', { cart_id: cart_id }, function(r){
							window.location = '/cart/';
						});	
					}
				}, { ok: "Yes", cancel: "No" });				
			});



			$(".discount-code button").click(function(){
				stereo.json_req('/ajax/discount-update/', { order_id: $("input[name='order-id']").val(), discount_code: $("#discount-code").val() }, function(r){
					window.location = '/cart/';
				});
			});



			$("#match").click(function(){
				$(".user-data").toggleClass("nomatch");
			});




			o.total();
			$("input[name='billing_country']").blur(function(){
				o.total();				
			});



			$("button.checkout").click(function(){
				$("button.checkout").addClass('loading');
				var order_id = $("input[name='order-id']").val();
				var total = $("input[name='total']").val();


				
				var exp = $(".card-exp").val();
						exp = exp.split('/');


/*
				    number: $('.card-number').val(),
				    cvc: $('.card-cvc').val(),
				    name: $('input[name="billing_name"]').val(),
				    exp_month: exp[0],
				    exp_year: exp[1]
*/



// fixit check that all required (and .also-required) fields are filled out
				var validated = true;
				
				$(".required").each(function(e){
					if (!$(this).val()){
						validated = false;
					}
				});

				if (!$("#match").is(':checked')){
					$(".also-required").each(function(e){
						if (!$(this).val()){
							validated = false;
						}
					});
				}
				

				if (validated){
					stereo.json_req('/ajax/cart-validate/', { order_id: order_id, form: $("form").serialize(), total: total }, function(r){
	
						$("button.checkout").removeClass('loading');
	
						if (r.success){
	
							smoke.confirm('Your card will be charged $'+total+'. Is that ok?',function(e){
								if (e){
//												$(".dialog-buttons").addClass("loading");
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
//														$(".dialog-buttons").removeClass("loading");
	
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
				}else{
					smoke.alert("All fields are required");
					$("button.checkout").removeClass("loading");
				}








			});











		}
	};

  return o;
});