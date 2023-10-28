<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
                   <script>
  $(document).ready(function() {
    $.validator.addMethod("noSpace", function(value, element) {
      return value.trim() !== ""; // Check if the value contains non-space characters.
    }, "This field cannot be blank or contain only spaces.");
    
    $("#expense_form").validate({
      rules: {
        exp_name: {
          required: true,
          noSpace: true // Use the custom rule
        }
      },
      messages: {
        exp_name: {
          required: "expense category name field is required."
        }
        
      },
      submitHandler: function(form) {
        // Handle the form submission if it's valid
        $('#expense_form').submit();
      }
    });
  });
</script>