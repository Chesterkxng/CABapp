<script type="text/javascript">
  function addingIntSuccessAlert()
  {
    swal({
      title: "Missions Orders Message!",
      text: "Mission Order added successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=intMOgenerator";
   } else {
    window.location.href = "index.php?action=intMOgenerator";
   }
  }
    )
  }
</script>

<script type="text/javascript">
  function addingExtSuccessAlert()
  {
    swal({
      title: "Missions Orders Message!",
      text: "Mission Order added successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=extMOgenerator";
   } else {
    window.location.href = "index.php?action=extMOgenerator";
   }
  }
    )
  }
</script>

<script type="text/javascript">
  function addingDOMSuccessAlert()
  {
    swal({
      title: "Missions Orders Message!",
      text: "Mission Order added successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=DOMgenerator";
   } else {
    window.location.href = "index.php?action=DOMgenerator";
   }
  }
    )
  }
</script>

<script type="text/javascript">
  function UploadingSuccessAlert()
  {
    swal({
      title: "Missions Orders Message!",
      text: "Mission Order uploaded successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=MOArchives";
   } else {
    window.location.href = "index.php?action=MOArchives";
   }
  }
    )
  }
</script>

<script type="text/javascript">
  function addingErrorAlert()
  {
    swal({
      title: "Missions Orders Message!",
      text: "Unknown error!",
      icon: "error",
    } );

  }
</script>