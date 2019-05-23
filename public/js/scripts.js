
$(function () {
    //Code to add and configure datatable to HTML table
    $('#example1').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': false,
      'info': false,
      'autoWidth': false
    })

    //Code to hide and show NBTE type based on board selection in the create.blade.php page
    const board = document.getElementById('board');
    if(board != null){
      if(board.value == "2"){
        $("#nbte").show();
      }else{
        $("#nbte").hide();
      }

      board.addEventListener("change", ()=>{
        if(board.value == "2"){
          $("#nbte").show();
        }else{
          $("#nbte").hide();
        }
	   });
    }
})

