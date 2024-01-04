<script>
  $(document).ready(function() {
  var select2label;
    $("#unit_form").validate({
      rules: {
        unit_cat_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
        monthly_amount:{
          required: true,
          noSpace: true // Use the custom rule
        }
      },
      messages: {
        unit_cat_name: {
          required: "Unit category name field is required."
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
        $('#unit_form').submit();
      }
    });
  });
</script>