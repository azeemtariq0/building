<script>
    var rules = {
        unit_cat_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
        monthly_amount:{
          required: true,
          noSpace: true // Use the custom rule
        }
      };
    var messages =  {
        unit_cat_name: {
          required: "Unit category name field is required."
        }, 
        monthly_amount: {
          required: "Monthly amount field is required."
        }
        
      };

function save(){
    $("#overlay").fadeIn(300);　
    validor(rules,messages,'#unit_form');
}

</script>