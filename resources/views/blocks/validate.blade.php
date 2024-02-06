<script>
    var rules = {
        project_id: {
          required: true,
          noSpace: true // Use the custom rule
        },
        block_name: {
          required: true,
          noSpace: true // Use the custom rule
        },
      };
    var messages = {
        project_id: {
          required: "Project name field is required."
        },
        block_name: {
          required: "Block name field is required."
        },
        
      };

function save(){
    $("#overlay").fadeIn(300);　
    validor(rules,messages,'#block_form');
}

</script>