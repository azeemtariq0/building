
                   <script>
  $(document).ready(function() {
    $.validator.addMethod("noSpace", function(value, element) {
      return value.trim() !== ""; // Check if the value contains non-space characters.
    }, "This field cannot be blank or contain only spaces.");
    
    $("#expense_form").validate({
       rules: {
        "receipt_type_id": {
             required: true,
             minlength: 5,
             digits: true
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
       
      }
    });
  });
</script>

