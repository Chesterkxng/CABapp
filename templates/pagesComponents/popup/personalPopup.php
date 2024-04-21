<script type="text/javascript">
  function updateProfileSuccessAlert() {
    swal({
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=DashboardPage";
      } else {
        window.location.href = "index.php?action=DashboardPage";
      }
    })
  }
</script>



<script type="text/javascript">
  function addingErrorAlert() {
    swal({
      icon: "error",
    });

  }
</script>