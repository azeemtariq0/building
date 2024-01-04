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
          required: "Reciept Type field is required."
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
        $('#reciept_form').submit();
      }
    });
  });
</script>