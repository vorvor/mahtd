(function($) {
Drupal.behaviors.motor = {
  attach: function (context, settings) {

  	$('#edit-field-model-one-und').change(function() {

  		$.ajax
			({ 
				url: '/ajax/get-model-description/' + $('option:selected', this).val(),
				type: 'get',
				success: function(result)
				{
					CKEDITOR.instances['edit-field-body-und-0-value'].setData(result);
				}
			});
  	})
  }}
})(jQuery);