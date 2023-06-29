<!-- adding popup-->

<script type="text/javascript">
  function addingSuccessAlert()
  {
    swal({
      title: "Passport Message!",
      text: "Passport added successfully!",
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
      title: "Passport Message!",
      text: "Unknown error!",
      icon: "error",
    } );

  }
</script>