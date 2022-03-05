jQuery(document).ready(function() {
	(function(api) {
		if (api.Section == undefined) {
			return;
		}
		api.sectionConstructor['back-to-the-90s-free-section'] = api.Section.extend({

			attachEvents: function () {
				jQuery('.back-to-the-90s-free-alert-close').click(function() {
					jQuery('.back-to-the-90s-free-alert').fadeOut();
					var data = {
						'action': 'back_to_the_90s_free_premium_dismiss'
					};

					jQuery.post(ajaxurl, data, null);					
				});
			},

			isContextuallyActive: function() {
				return true;
			}
		});
	})(wp.customize);
});