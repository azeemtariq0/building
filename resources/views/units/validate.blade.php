<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
                   <script>
  $(document).ready(function() {
    $.validator.addMethod("noSpace", function(value, element) {
      return value.trim() !== ""; // Check if the value contains non-space characters.
    }, "This field cannot be blank or contain only spaces.");
    
    $("#units_form").validate({
      rules: {
        unit_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
        block_id: {
          required: true,
        },
        unit_category_id: {
          required: true,
        },
        project_id: {
          required: true,
        },
        monthly_amount:{
          required: true,
          noSpace: true // Use the custom rule
        }
      },
      messages: {
        unit_name: {
          required: "Unit name field is required."
        }, 
        monthly_amount: {
          required: "Monthly amount field is required."
        }
        
      },
      submitHandler: function(form) {
        // Handle the form submission if it's valid
        $('#units_form' ).submit();
      }
    });
  });
</script>