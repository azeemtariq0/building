<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    -->               

                   <script>
  $(document).ready(function() {
  
    var select2label;
    $("#block_form").validate({
      rules: {
        project_id: {
          required: true,
          noSpace: true // Use the custom rule
        },
        block_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
      },
      messages: {
        project_id: {
          required: "Project name field is required."
        },
        block_name: {
          required: "Block name field is required."
        },
        
      },
       errorPlacement: function(label, element) {
      if (element.hasClass('web-select2')) {
        label.insertAfter(element.next('.select2-container')).addClass('mt-2 text-danger');
        select2label = label
      } else {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      }
      },
      highlight: function(element) {
        $(element).parent().addClass('is-invalid')
        $(element).addClass('form-control-danger')
      },
      success: function(label, element) {
        $(element).parent().removeClass('is-invalid')
        $(element).removeClass('form-control-danger')
        label.remove();
      },
        submitHandler: function(form) {
          // Handle the form submission if it's valid
          $('#block_form').submit();
      }
    });

  });


</script>

