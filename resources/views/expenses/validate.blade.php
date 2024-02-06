<script>
    var rules = {
        "exp_category_id": {
             required: true,
             digits: true
         }
      }
      ;
    var messages = {};

function save(){
    $("#overlay").fadeIn(300);　
    validor(rules,messages,'#expense_form');
}
</script>