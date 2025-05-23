<script>
    $('.searchbox-input').each(function () {
		var $container = $(this);
		$container.find('.option-list li').on("click", function () {
			var destinationText = $(this).find('.destination h6, h6').text();
			$container.find('.select-input input').val(destinationText);
			$container.find('.custom-select-wrap').removeClass('active');
		});
		$(document).on("click", function (event) {
			if (!$(event.target).closest($container).length) {
				$container.find('.custom-select-wrap').removeClass('active');
			}
		});
		$container.find('.custom-select-search-area input').on('input', function () {
			var searchText = $(this).val().toLowerCase();
			$container.find('.option-list li').each(function () {
				var destinationText = $(this).find('.destination h6').text().toLowerCase();
               
				if (destinationText.includes(searchText)) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		});
	});


</script>