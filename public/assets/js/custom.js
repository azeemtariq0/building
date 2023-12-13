/** ********************************************** **
	Your Custom Javascript File
	Put here all your custom functions
*************************************************** **/



/** Remove Panel
	Function called by app.js on panel Close (remove)
 ************************************************** **/
	function _closePanel(panel_id) {
		/** 
			EXAMPLE - LOCAL STORAGE PANEL REMOVE|UNREMOVE

			// SET PANEL HIDDEN
			localStorage.setItem(panel_id, 'closed');
			
			// SET PANEL VISIBLE
			localStorage.removeItem(panel_id);
		**/	
	}


/* 	$('#category').on('change', function() {
  console.log( this.value );
}); */

    function rowDetele(event) {
         event.preventDefault(); // prevent form submit
             swal({
             title: "Are you sure?",
             text: "Do You Want to Delete This Record!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
          .then((willDelete) => {
               if (willDelete) {
                  $('#delete-form').submit()
               }
            });
    }

