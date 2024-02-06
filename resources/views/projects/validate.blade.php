<script>
    var rules = {
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
        };
    var messages =  {
            project_name: {
                required: "this field is required"
            },
            union_name: {
                required: "Enter recipient name",
                minlength: "Name should be at least {0} characters long" // <-- removed underscore
            }
        };

function save(){
    $("#overlay").fadeIn(300);　
    validor(rules,messages,'#first_form');
}

</script>