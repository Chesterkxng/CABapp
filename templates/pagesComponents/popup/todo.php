<!-- Update Popup -->
<script type="text/javascript">
  function updateSuccessAlert() {
    swal({
      title: "Todo Message!",
      text: "Todo Infos modified successfully!",
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
      title: "Todo Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>



<!-- adding popup-->

<script type="text/javascript">
  function addingSuccessAlert() {
    swal({
      title: "Todo Message!",
      text: "Todo added successfully!",
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
      title: "Todo Message!",
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
      title: "Todo Message!",
      text: "Todo deleted successfully!",
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
      title: "Todo Message!",
      text: "Todo deleted successfully!",
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
      title: "Todo Message!",
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
      title: "Todo Message!",
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
      title: "Todo Message!",
      text: "Unknown error!",
      icon: "error",
    });

  }
</script>

<script type="text/javascript">
  function markAsDoneAlert() {
    swal({
      title: "Todo Message!",
      text: "are you sure ?",
      icon: "success",
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
      title: "Todo Message!",
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