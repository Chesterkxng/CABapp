<script type="text/javascript">
  function updateProfileSuccessAlert() {
    swal({
      title: "Personnel Message!",
      text: "Profile Infos modified successfully!",
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=DashboardPage";
      } else {
        window.location.href = "index.php?action=DashboardPage";
      }
    }
    )
  }
</script>



<script type="text/javascript">
  function addingErrorAlert() {
    swal({
      title: "Personnel Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>