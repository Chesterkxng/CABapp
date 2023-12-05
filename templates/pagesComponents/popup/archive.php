<script type="text/javascript">
  function addingSuccessAlert() {
    swal({
      title: "Archive Message!",
      text: "document added successfully!",
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=archiveAddingForm";
      } else {
        window.location.href = "index.php?action=archiveAddingForm";
      }
    }
    )
  }
</script>




<script type="text/javascript">
  function addingErrorAlert() {
    swal({
      title: "Archive Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>