<script>
    var rules = {
        receipt_name: {
          required: true,
          noSpace: true // Use the custom rule
        }
      }
      ;
    var messages = {
        receipt_name: {
          required: "Reciept Type field is required."
        }
        
      };

function save(){
    $("#overlay").fadeIn(300);　
    validor(rules,messages,'#reciept_form');
}

</script>