<script>
    var rules = {
        exp_name: {
          required: true,
          noSpace: true // Use the custom rule
        }
      };
    var messages = {
        exp_name: {
          required: "Expense Category name field is required."
        }
        
      };

function save(){
    $("#overlay").fadeIn(300);　
    validor(rules,messages,'#expense_form');
}

</script>