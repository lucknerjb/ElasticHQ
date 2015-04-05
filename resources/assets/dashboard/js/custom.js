var Search = {
   index: '',
   type: '',
   fields: [],
   filters: []
};

$(document).ready(function() {
   // Select Cluster
   $(document).on('change', '#select-cluster', function(e) {
      var $elem = $(this);
      var clusterId = $elem.val();

      if (clusterId === '') {
         return;
      }

      $.ajax({
         type: 'POST',
         url: '/clusters/select_cluster',
         data: $('#select-cluster-form').serializeJSON(),
         success: function(response) {
            console.log(response);
         },
         error: function(response) {
            console.log(response);
         }
      });
   });

   $(document).on('change', '.explore-filter-index', function(e) {
      var $elem = $(this);
      var value = $elem.val();

      Search.index = value;

      // Get the types for this index
      $.ajax({
         type: 'POST',
         url: '/explore/get_index_types',
         data: {
            index: value,
            _token: $('#explore-form input[name="_token"]').val()
         },
         success: function(response) {
            $('.explore-filter-type').html(response);
         },
         error: function(response) {
            alert('Could not retrieve the types for this index');
            console.log(response);
         }
      });
   });

   $(document).on('change', '.explore-filter-type', function(e) {
      var $elem = $(this);
      var value = $elem.val();

      Search.type = value;

      // Get the fields for this index / type combo
      $.ajax({
         type: 'POST',
         url: '/explore/get_type_fields',
         data: {
            index: Search.index,
            type: value,
            _token: $('#explore-form input[name="_token"]').val()
         },
         success: function(response) {
            $('#filter-fields').html(response);
            Search.fields = $('#filter-fields .fields-json');
            $('.toggle-filter-fields').attr('disabled', false);
         },
         error: function(response) {
            alert('Could not retrieve the types for this index');
            console.log(response);
         }
      });
   });

   $(document).on('click', '.toggle-filter-fields', function(e) {
      e.preventDefault();
      $('#filter-fields').slideToggle();
   });

   $(document).on('click', '.search-btn', function(e) {
      e.preventDefault();

      $.ajax({
         type: 'POST',
         url: '/explore/query',
         data: $('#explore-form').serializeJSON(),
         success: function(response) {
            $('#results-container').html(response);
         },
         error: function(response) {
            alert('There was an error processing your request');
            console.log(response);
         }
      });
   });
});
