<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
                   <script>
  $(document).ready(function() {
    $.validator.addMethod("noSpace", function(value, element) {
      return value.trim() !== ""; // Check if the value contains non-space characters.
    }, "This field cannot be blank or contain only spaces.");
    
    $("#first_form").validate({
      rules: {
        project_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
        union_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
        union_accountant:{
            required: true,
          noSpace: true // Use the custom rule
        }
      },
      messages: {
        project_name: {
          required: "Project name field is required."
        },
        union_name: {
          required: "Union name field is required."
        },
        union_accountant: {
          required: "Union accountant field is required."
        },
        
      },
      submitHandler: function(form) {
        // Handle the form submission if it's valid
        $('#first_form').submit();
      }
    });
  });
</script>