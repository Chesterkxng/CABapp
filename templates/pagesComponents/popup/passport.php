<!-- Update Popup -->
<script type="text/javascript">
  function updateSuccessAlert() {
    swal({
      title: "Passport Message!",
      text: "Passport Infos modified successfully!",
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=passportsList";
      } else {
        window.location.href = "index.php?action=passportsList";
      }
    }
    )
  }
</script>


<script type="text/javascript">
  function updateErrorAlert() {
    swal({
      title: "Passport Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>



<!-- adding popup-->

<script type="text/javascript">
  function addingSuccessAlert() {
    swal({
      title: "Passport Message!",
      text: "Passport added successfully!",
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=passportsList";
      } else {
        window.location.href = "index.php?action=passportsList";
      }
    }
    )
  }
</script>




<script type="text/javascript">
  function addingErrorAlert() {
    swal({
      title: "Passport Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>

<!-- end of adding popup-->

<!-- deleting popup-->

<script type="text/javascript">
  function deletingSuccessAlert() {
    swal({
      title: "Passport Message!",
      text: "Passport deleted successfully!",
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=passportsList";
      } else {
        window.location.href = "index.php?action=passportsList";
      }
    }
    )
  }
</script>



<script type="text/javascript">
  function deletingConfirmAlert() {
    swal({
      title: "Passport Message!",
      text: "are you sure ?",
      icon: "warning",
      buttons: true
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=deletePassport&passport_id=<?= $passport_id ?>";
      } else {
        window.location.href = "index.php?action=passportsList";
      }
    }
    )
  }
</script>


<script type="text/javascript">
  function deletingErrorAlert() {
    swal({
      title: "Passport Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>