<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
                   <script>
  $(document).ready(function() {
    $.validator.addMethod("noSpace", function(value, element) {
      return value.trim() !== ""; // Check if the value contains non-space characters.
    }, "This field cannot be blank or contain only spaces.");
    
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
      submitHandler: function(form) {
        // Handle the form submission if it's valid
        $('#block_form').submit();
      }
    });
  });
</script>