
<li filter-name="{{ $filter['name'] }}"
	filter-type="{{ $filter['type'] }}"
	class="{{ Request::get($filter['name']) ? 'active' : '' }}">
    <a href="" parameter="{{ $filter['name'] }}" >{{ $filter['label'] }}</a>
  </li>


@push('js-stack')
    <script>
		jQuery(document).ready(function($) {
			"use strict";
			$("li[filter-name={{ $filter['name'] }}] a").click(function(e) {
				e.preventDefault();

				var parameter = $(this).attr('parameter');

		    	// behaviour for ajax table
				var ajax_table = $("#dataTableBuilder").DataTable();
				var current_url = "{{ url($base['route']) }}";

				if (URI(current_url).hasQuery(parameter)) {
					var new_url = URI(current_url).removeQuery(parameter, true);
				} else {
					var new_url = URI(current_url).addQuery(parameter, true);
				}

				new_url = normalizeAmpersand(new_url.toString());

				// replace the datatables ajax url with new_url and reload it
				ajax_table.ajax.url(new_url).load();

				// mark this filter as active in the navbar-filters
				if (URI(new_url).hasQuery('{{ $filter['name'] }}', true)) {
					$("li[filter-name={{ $filter['name'] }}]").removeClass('active').addClass('active');
				}
				else
				{
					$("li[filter-name={{ $filter['name'] }}]").trigger("filter:clear");
				}
			});

			// clear filter event (used here and by the Remove all filters button)
			$("li[filter-name={{ $filter['name'] }}]").on('filter:clear', function(e) {
				// console.log('dropdown filter cleared');
				$("li[filter-name={{ $filter['name'] }}]").removeClass('active');
			});
		});
	</script>
@endpush