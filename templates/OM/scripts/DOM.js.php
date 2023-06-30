<script type="text/javascript"> 
    function  generateDOM(){
        localStorage.clear();
        var grade = document.getElementById("grade").value;
        var name = document.getElementById("name").value;
        var PN = document.getElementById("PN").value;
        var country = document.getElementById("country").value;
        var city = document.getElementById("city").value;
        var object = document.getElementById("object").value;
        var departuredate = document.getElementById("departuredate").value;
        var returndate = document.getElementById("returndate").value;

        localStorage.setItem('grade', grade.toUpperCase()); 
        localStorage.setItem('name', name.toUpperCase()); 
        localStorage.setItem('PN', PN.toUpperCase()); 
        localStorage.setItem('country', country.toUpperCase()); 
        localStorage.setItem('city', city.toUpperCase()); 
        localStorage.setItem('object', object.toUpperCase());
        localStorage.setItem('departuredate', departuredate.toUpperCase()); 
        localStorage.setItem('returndate', returndate.toUpperCase()); 

        if (grade !="" && name !="" && PN != "" && country != "" &&city !="" 
        && object !=""  && departuredate != "" && returndate !=""){

            window.open('templates/OM/assets/DOM/DOM.html');
            document.getElementById('btn_save').innerHTML = 
            '<label class="control-label col-sm-3" for=""></label>'+
                '<div class="col-sm-5">'+
                    '<button onclick="document.getElementById(\'Moform\').submit()"  class="btn btn-info btn-lg btn-block"><strong>SAVE</strong></button>'+
                 '</div>';
        } else {
            swal({
            title: "Missions Orders Message!",
            text: "Fill all the tabs!",
            icon: "error",
            } );
        }

        

    }

  
</script>
