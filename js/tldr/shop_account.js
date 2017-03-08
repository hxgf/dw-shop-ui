define(["stereo/smoke-amd", "stereo/stereo"], function(smoke, stereo) {

	var o = {
		init: function(){

			$("#match").click(function(){
				$(".user-data").toggleClass("nomatch");
			});

			$("button.account").click(function(){
				stereo.json_req('/ajax/account-update/', { form: $("form").serialize() }, function(r){
					smoke.signal("Your account settings have been updated.");
				});				
			});

		}
	};

  return o;
});