<!-- Sign Up Script-->

<script type="text/javascript">
  function createSuccessAlert()
  {
    swal({
      title: "Access control",
      text: "User account created successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=userAddingForm";
   } else {
    window.location.href = "index.php?action=userAddingForm";
   }
  }
    )
  }
</script>

<script type="text/javascript">
  function usernameAlreadyExistAlert()
  {
    swal({
      title: "Signup Message!",
      text: "Username  is already taken !",
      icon: "error",
    } );

  }
</script>

<script type="text/javascript">
  function mismatchPasswordAlert()
  {
    swal({
      title: "signup Message!",
      text: "Passwords didn't match",
      icon: "error",
    } );

  }
</script>

<script type="text/javascript">
  function unknownErrorAlert()
  {
    swal({
      title: "signup Message!",
      text: "Unknown error",
      icon: "error",
    } );

  }
</script>

<!--  end Sign Up Script-->

<!--  Profile Completion Script-->

<script type="text/javascript">
  function profileCompletionSuccessAlert()
  {
    swal({
      title: "Profile Completion Message!",
      text: "User profile completed successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=signInPage";
   } else {
    window.location.href = "index.php?action=signInPage";
   }
  }
    )
  }
</script>

<script type="text/javascript">
  function updateSuccessAlert()
  {
    swal({
      title: "Profile  Message!",
      text: "User profile updated successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=usersList";
   } else {
    window.location.href = "index.php?action=usersList";
   }
  }
    )
  }
</script>

<script type="text/javascript">
  function updateErrorAlert()
  {
    swal({
      title: "Profile Message!",
      text: "Unknown Error!",
      icon: "error",
    } )
  }
</script>


<script type="text/javascript">
  function profileCompletionErrorAlert()
  {
    swal({
      title: "Profile Completion Message!",
      text: "Unknown Error!",
      icon: "error",
    } )
  }
</script>

<!--   end Profile Completion Script-->




<!-- Sign In Script-->

<script type="text/javascript">
  function loginSuccesAlert()
  {
    swal({
      title: "Login Message!",
      text: "username and password match!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=DashboardPage";
   } else {
    window.location.href = "index.php?action=DashboardPage"
   }
  }
    )
  }
</script>


<script type="text/javascript">
  function incorrectPasswordAlert()
  {
    swal({
      title: "Login Message!",
      text: "password incorrect !",
      icon: "error",
    } );

  }
</script>

<script type="text/javascript">
  function userNotFoundAlert()
  {
    swal({
      title: "Login Message!",
      text: "username not found!",
      icon: "error",
    } );

  }
</script>
<!--  end Sign In Script-->

<!--  forgotten Password Script-->

<script type="text/javascript">
  function resetSuccessAlert()
  {
    swal({
      title: "Reset Message!",
      text: "password have been reset successfully!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=signInPage";
   } else {
    window.location.href = "index.php?action=signInPage";
   }
  }
    )
  }
</script>

<script type="text/javascript">
  function redirectProfileAlert()
  {
    swal({
      title: "Login Message!",
      text: "username and password match!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=signUpProfilePage";
   } else {
    window.location.href = "index.php?action=signUpProfilePage";
   }
  }
    )
  }
</script>



<script type="text/javascript">
  function redirectQAAlert()
  {
    swal({
      title: "Reset Message!",
      text: "Validate your security question!",
      icon: "success",
    } ).then(okay => {
   if (okay) {
    window.location.href = "index.php?action=securityQAPage";
   } else {
    window.location.href = "index.php?action=securityQAPage";
   }
  }
    )
  }
</script>

<script type="text/javascript">
  function userNotFoundAlert()
  {
    swal({
      title: "Reset Message!",
      text: "username not found!",
      icon: "error",
    } );

  }
</script>


<script type="text/javascript">
  function mismatchPasswordAlert()
  {
    swal({
      title: "Reset Message!",
      text: "Passwords didn't match",
      icon: "error",
    } );

  }
</script>

<script type="text/javascript">
  function unknownErrorAlert()
  {
    swal({
      title: "Reset Message!",
      text: "Unknown error",
      icon: "error",
    } );

  }
</script>


<script type="text/javascript">
  function answerErrorAlert()
  {
    swal({
      title: "Reset Message!",
      text: "Incorrect Answer",
      icon: "error",
    } );

  }
</script>



