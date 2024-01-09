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
        },
        unit_size_id:{
          required: true,
          noSpace: true
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
        $('#units_form' ).submit();
      }
    });


  $("#resident").validate({
      rules: {
        resident_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
        resident_cnic: {
          required: true,
        },
        resident_mobile:{
          required: true,
          noSpace: true // Use the custom rule
        },
        email:{
          required: true,
          noSpace: true
        }
      },
      messages: {
        resident_mobile: {
          required: "Resident Mobile field is required."
        }, 
        resident_name: {
          required: "Resident Name field is required."
        },resident_cnic: {
          required: "Resident CNIC / NICOP / Passport is required."
        }, 
        email: {
          required: "Email field is required."
        }
        
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
      }
    });


  $("#unit_owner_form").validate({
      rules: {
        owner_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
        owner_cnic: {
          required: true,
        },
        mobile_no: {
          required: true,
        },
        owner_since:{
          required: true,
          noSpace: true // Use the custom rule
        },
        current_tenant:{
          required: true,
          noSpace: true
        }
      },
      messages: {
        owner_name: {
          required: "Owner Name field is required."
        }, 
        owner_mobile: {
          required: "Owner Mobile field is required."
        }, 
        owner_since: {
          required: "Owner Since field is required."
        }, 
        current_tenant: {
          required: "Current Resident is required."
        },
        owner_cnic: {
          required: "Owner CNIC / NICOP / Passport is required."
        }
        
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
      }
    });



  });
</script>