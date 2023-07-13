<script type="text/javascript">
  function addingSuccessAlert() {
    swal({
      title: "Courier Message!",
      text: "Courier added successfully!",
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=courierAddingForm";
      } else {
        window.location.href = "index.php?action=courierAddingForm";
      }
    }
    )
  }
</script>




<script type="text/javascript">
  function addingErrorAlert() {
    swal({
      title: "Courier Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>