<script type="text/javascript">
  function addingSuccessAlert() {
    swal({
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
      icon: "error",
    });

  }
</script>