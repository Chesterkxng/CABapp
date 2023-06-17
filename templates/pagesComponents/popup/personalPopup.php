
<!-- Update Popup -->
<script type="text/javascript">
  function updateSuccessAlert()
  {
    swal({
      title: "Personnel Message!",
      text: "Personal Infos modified successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=personnelList";
   } else {
    window.location.href = "index.php?action=personnelList";
   }
  }
    )
  }
</script>


<script type="text/javascript">
  function updateProfileSuccessAlert()
  {
    swal({
      title: "Personnel Message!",
      text: "Profile Infos modified successfully!",
      icon: "success",
    } ).then(okay => {
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
  function updateErrorAlert()
  {
    swal({
      title: "Personnel Message!",
      text: "Unknown error!",
      icon: "error",
    } );

  }
</script>


<script type="text/javascript">
  function updateError2Alert()
  {
    swal({
      title: "Personnel Message!",
      text: "The selected user is registered, you can't modify his informations from there !",
      icon: "error",
    } );

  }
</script>


<!-- adding popup-->

<!-- Update Popup -->
<script type="text/javascript">
  function addingSuccessAlert()
  {
    swal({
      title: "Personnel Message!",
      text: "Personnel added successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=personnelList";
   } else {
    window.location.href = "index.php?action=personnelList";
   }
  }
    )
  }
</script>


<script type="text/javascript">
  function addingErrorAlert()
  {
    swal({
      title: "Personnel Message!",
      text: "Unknown error!",
      icon: "error",
    } );

  }
</script>

<!-- delete Popup-->

<script type="text/javascript">
  function deletingConfirmAlert()
  {
    swal({
      title: "Personnel Message!",
      text: "are you sure ?",
      icon: "warning",
      buttons: true
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=deletePersonal&personal_id=<?= $_GET['personal_id'] ?>";
   } else {
    window.location.href = "index.php?action=personnelList";
   }
  }
    )
  }
</script>


<script type="text/javascript">
  function deleteError2Alert()
  {
    swal({
      title: "Personnel Message!",
      text: "The selected user is registered, you can't delete his profile there !",
      icon: "error",
    } );

  }
</script>


<script type="text/javascript">
  function deletingSuccessAlert()
  {
    swal({
      title: "Personnel Message!",
      text: "deleted successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=personnelList";
   } else {
    window.location.href = "index.php?action=personnelList";
   }
  }
    )
  }
</script>

<script type="text/javascript">
  function deletingErrorAlert()
  {
    swal({
      title: "Personnel Message!",
      text: "Unknown error!",
      icon: "error",
    } );

  }
</script>