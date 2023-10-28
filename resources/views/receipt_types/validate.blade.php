<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
                   <script>
  $(document).ready(function() {
    $.validator.addMethod("noSpace", function(value, element) {
      return value.trim() !== ""; // Check if the value contains non-space characters.
    }, "This field cannot be blank or contain only spaces.");
    
    $("#reciept_form").validate({
      rules: {
        receipt_name: {
          required: true,
          noSpace: true // Use the custom rule
        }
      },
      messages: {
        receipt_name: {
          required: "Reciept name field is required."
        }
        
      },
      submitHandler: function(form) {
        // Handle the form submission if it's valid
        $('#reciept_form').submit();
      }
    });
  });
</script>