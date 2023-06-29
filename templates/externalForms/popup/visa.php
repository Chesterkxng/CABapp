<!-- adding popup-->

<script type="text/javascript">
  function addingSuccessAlert()
  {
    swal({
      title: "Visa Message!",
      text: "Visa added successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=extPage";
   } else {
    window.location.href = "index.php?action=extPage";
   }
  }
    )
  }
</script>




<script type="text/javascript">
  function addingErrorAlert()
  {
    swal({
      title: "visa Message!",
      text: "Unknown error!",
      icon: "error",
    } );

  }
</script>