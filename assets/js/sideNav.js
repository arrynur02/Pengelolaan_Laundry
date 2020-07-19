$(function() {
	let sidenav = $('#is_nav- li a');

	sidenav.on('click',function() {
		let thiS = $(this);

		let href = thiS.attr("target_href");
		$.ajax({

			url :href,
			cache:false,
			beforeSend:function() {

				loader_show();

			},success:function(istrue) {
				sidenav.addClass("active")

				loader_hide();

				$('#this-content-').empty().append(istrue);
			}
		});
		return false;
	});
	
});