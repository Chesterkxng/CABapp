<!-- Update Popup -->
<script type="text/javascript">
  function updateSuccessAlert() {
    swal({
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=BEArchives";
      } else {
        window.location.href = "index.php?action=BEArchives";
      }
    })
  }
</script>


<script type="text/javascript">
  function updateErrorAlert() {
    swal({
      icon: "error",
    });

  }
</script>



<!-- adding popup-->

<script type="text/javascript">
  function addingSuccessAlert() {
    swal({
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=BEArchives";
      } else {
        window.location.href = "index.php?action=BEArchives";
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

<!-- end of adding popup-->

<!-- deleting popup-->

<script type="text/javascript">
  function deletingSuccessAlert() {
    swal({
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=BEArchives";
      } else {
        window.location.href = "index.php?action=BEArchives";
      }
    })
  }
</script>



<script type="text/javascript">
  function deletingConfirmAlert() {
    swal({
      text: "are you sure ?",
      icon: "warning",
      buttons: true,
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=deleteBE&be_id=<?= $be_id ?>";
      } else {
        window.location.href = "index.php?action=BEArchives";
      }
    })
  }
</script>


<script type="text/javascript">
  function deletingErrorAlert() {
    swal({
      icon: "error",
    });

  }
</script>