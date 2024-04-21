<!-- Update Popup -->
<script type="text/javascript">
  function updateSuccessAlert() {
    swal({
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=eventsList";
      } else {
        window.location.href = "index.php?action=eventsList";
      }
    }
    )
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
        window.location.href = "index.php?action=eventsList";
      } else {
        window.location.href = "index.php?action=eventsList";
      }
    }
    )
  }
</script>




<script type="text/javascript">
  function addingErrorAlert() {
    swal({
      title: "Event Message!",
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
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=eventsList";
      } else {
        window.location.href = "index.php?action=eventsList";
      }
    }
    )
  }
</script>



<script type="text/javascript">
  function deletingConfirmAlert() {
    swal({
      text: "are you sure ?",
      icon: "warning",
      buttons: true
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=deleteEvent&event_id=<?= $event_id ?>";
      } else {
        window.location.href = "index.php?action=eventsList";
      }
    }
    )
  }
</script>


<script type="text/javascript">
  function deletingErrorAlert() {
    swal({
      title: "Event Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>