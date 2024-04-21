<!-- Update Popup -->
<script type="text/javascript">
  function updateSuccessAlert() {
    swal({
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=todosList";
      } else {
        window.location.href = "index.php?action=todosList";
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
        window.location.href = "index.php?action=todosList";
      } else {
        window.location.href = "index.php?action=todosList";
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

<!-- end of adding popup-->

<!-- deleting popup-->

<script type="text/javascript">
  function deletingSuccessAlert() {
    swal({
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=todosList";
      } else {
        window.location.href = "index.php?action=todosList";
      }
    }
    )
  }
</script>
<script type="text/javascript">
  function deletingSuccessAlert2() {
    swal({
      icon: "success",
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=todoHistoric";
      } else {
        window.location.href = "index.php?action=todoHistoric";
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
        window.location.href = "index.php?action=deleteTodo&todo_id=<?= $todo_id ?>";
      } else {
        window.location.href = "index.php?action=todosList";
      }
    }
    )
  }
</script>
<script type="text/javascript">
  function deletingConfirmAlert2() {
    swal({
      text: "are you sure ?",
      icon: "warning",
      buttons: true
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=deleteTodo2&todo_id=<?= $todo_id ?>";
      } else {
        window.location.href = "index.php?action=todoHistoric";
      }
    }
    )
  }
</script>


<script type="text/javascript">
  function deletingErrorAlert() {
    swal({
      icon: "error",
    });

  }
</script>

<script type="text/javascript">
  function markAsDoneAlert() {
    swal({
      text: "are you sure ?",
      icon: "info",
      buttons: true
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=markAsDone&todo_id=<?= $todo_id ?>";
      } else {
        window.location.href = "index.php?action=todosList";
      }
    }
    )
  }
</script>

<script type="text/javascript">
  function markAsTraitedAlert() {
    swal({
      text: "are you sure ?",
      icon: "success",
      buttons: true
    }).then(okay => {
      if (okay) {
        window.location.href = "index.php?action=markAsTraited&todo_id=<?= $todo_id ?>";
      } else {
        window.location.href = "index.php?action=todosList";
      }
    }
    )
  }
</script>