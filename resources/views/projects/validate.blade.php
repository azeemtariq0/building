<script>
  
  $(document).ready(function() {
   var select2label;
     $("#first_form").validate({
          rules: {
            project_name: {
                required: true,
                noSpace:true
            },
            union_name: {
                required: true
            },
            union_accountant: {
                required: true
            }
        },
        messages: {
            project_name: {
                required: "this field is required"
            },
            union_name: {
                required: "Enter recipient name",
                minlength: "Name should be at least {0} characters long" // <-- removed underscore
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
       
        submitHandler: function (form) { // for demo
             $('#first_form').submit();  // for demo
        }
 });


  });



    $.validator.addMethod("noSpace", function(value, element) {
      return value.trim() !== ""; // Check if the value contains non-space characters.
    }, "This field cannot be blank or contain only spaces.");
    
</script>