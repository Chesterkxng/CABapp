<!-- Update Popup -->
<script type="text/javascript">
  function updateSuccessAlert() {
    swal({
      title: "Visa Message!",
      text: "Visa Infos modified successfully!",
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=visasList";
      } else {
        window.location.href = "index.php?action=visasList";
      }
    }
    )
  }
</script>


<script type="text/javascript">
  function updateErrorAlert() {
    swal({
      title: "Visa Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>



<!-- adding popup-->

<script type="text/javascript">
  function addingSuccessAlert() {
    swal({
      title: "Visa Message!",
      text: "Visa added successfully!",
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=visasList";
      } else {
        window.location.href = "index.php?action=visasList";
      }
    }
    )
  }
</script>




<script type="text/javascript">
  function addingErrorAlert() {
    swal({
      title: "visa Message!",
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
      title: "visa Message!",
      text: "visa deleted successfully!",
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=visasList";
      } else {
        window.location.href = "index.php?action=visasList";
      }
    }
    )
  }
</script>



<script type="text/javascript">
  function deletingConfirmAlert() {
    swal({
      title: "visa Message!",
      text: "are you sure ?",
      icon: "warning",
      buttons: true
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=deleteVisa&visa_id=<?= $visa_id ?>";
      } else {
        window.location.href = "index.php?action=visasList";
      }
    }
    )
  }
</script>


<script type="text/javascript">
  function deletingErrorAlert() {
    swal({
      title: "Visa Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>