<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
                   <script>
  $(document).ready(function() {
    $.validator.addMethod("noSpace", function(value, element) {
      return value.trim() !== ""; // Check if the value contains non-space characters.
    }, "This field cannot be blank or contain only spaces.");
    
    $("#unit_owners").validate({
      rules: {
        owner_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
        owner_cnic: {
          required: true,
          noSpace: true // Use the custom rule
        },
        unit_id:{
          required: true,
          noSpace: true // Use the custom rule


        },
        mobile_no:{
          required: true,
          noSpace: true // Use the custom rule


        },
        ptcl_no:{
          required: true,
          noSpace: true // Use the custom rule


        },
        owner_email:{
          required: true,
          noSpace: true // Use the custom rule


        },
        owner_since:{
          required: true,
          noSpace: true // Use the custom rule


        }
      },
      messages: {
        owner_name: {
          required: "Owner name field is required."
        },
        owner_cnic: {
          required: "Owner cnic  field is required."
        },
        mobile_no:{
          required: "Mobile number is required"
        },
        ptcl_no:{
          required: "Ptcl number is required"
        },
        owner_email:{
          required: "Owner Email is required"
        },
        owner_since:{
          required: "Owner since is required"
        }
      },
      submitHandler: function(form) {
        // Handle the form submission if it's valid
        $('#unit_owners').submit();
      }
    });
  });
</script>