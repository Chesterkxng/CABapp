<script type="text/javascript"> 
    function  generateOM(){
        localStorage.clear();
        var grade = document.getElementById("grade").value;
        var name = document.getElementById("name").value;
        var PN = document.getElementById("PN").value;     
        var city = document.getElementById("city").value;
        var object = document.getElementById("object").value;
        var means = document.getElementById("means").value;
        var departuredate = document.getElementById("departuredate").value;
        var returndate = document.getElementById("returndate").value;

        selectElement = document.querySelector('#companion');
        companions = selectElement.options[selectElement.selectedIndex].value; 

        switch(companions){
                case "SEUL":
                    var companion = 'SEUL';
                    localStorage.setItem('companion', companion.toUpperCase()); 
                    break; 
            
                case "UN (01) MILITAIRE": 
                    var name1 = document.getElementById("name1").value;
                    var mat1 = document.getElementById("mat1").value;
                    if (name1 != ""  && mat1 != ""){
                        var companion =  name1 + " MLE : "+ mat1; 
                        localStorage.setItem('companion', companion.toUpperCase());
                    }
                     break;
                case "DEUX (02) MILITAIRES": 
                    var name1 = document.getElementById("name1").value;
                    var mat1 = document.getElementById("mat1").value;
                    var name2 = document.getElementById("name2").value;
                    var mat2 = document.getElementById("mat2").value;
                    if (name1 != ""  && mat1 != "" && name2 != "" && mat2 !=""){
                        var companion1 = name1 + " MLE : "+ mat1;
                        var companion2 = name2 + " MLE : "+ mat2;
                        localStorage.setItem('companion1', companion1.toUpperCase());
                        localStorage.setItem('companion2', companion2.toUpperCase());
                    }
                    break;
                case "TROIS (03) MILITAIRES": 
                    var name1 = document.getElementById("name1").value;
                    var mat1 = document.getElementById("mat1").value;
                    var name2 = document.getElementById("name2").value;
                    var mat2 = document.getElementById("mat2").value;
                    var name3 = document.getElementById("name3").value;
                    var mat3 = document.getElementById("mat3").value;
                    if (name1 != ""  && mat1 != "" && name2 != "" && mat2 !="" 
                    && name3 !="" && mat3){
                        var companion1 = name1 + " MLE : "+ mat1;
                        var companion2 = name2 + " MLE : "+ mat2;
                        var companion3 = name3 + " MLE : "+ mat3;
                        localStorage.setItem('companion1', companion1.toUpperCase());
                        localStorage.setItem('companion2', companion2.toUpperCase());
                        localStorage.setItem('companion3', companion3.toUpperCase());
                    }
                    break;

            }
        localStorage.setItem('companions',companions);
        localStorage.setItem('grade', grade.toUpperCase()); 
        localStorage.setItem('name', name.toUpperCase()); 
        localStorage.setItem('PN', PN.toUpperCase()); 
        localStorage.setItem('city', city.toUpperCase()); 
        localStorage.setItem('object', object.toUpperCase());
        localStorage.setItem('means', means.toUpperCase());
        localStorage.setItem('departuredate', departuredate.toUpperCase()); 
        localStorage.setItem('returndate', returndate.toUpperCase()); 

        console.log(localStorage); 

        if (grade !="" && name !="" && PN != "" && city !="" 
        && object !="" && means !="" && departuredate != "" && returndate !=""){


        switch(companions){
                case "SEUL":
                    if (companion){
                    window.open('templates/OM/assets/OMint/OMint_alone.html'); 
                    document.getElementById('btn_save').innerHTML = 
                    '<label class="control-label col-sm-3" for=""></label>'+
                        '<div class="col-sm-5">'+
                            '<button onclick="document.getElementById(\'Moform\').submit()"  class="btn btn-info btn-lg btn-block"><strong>SAVE</strong></button>'+
                        '</div>';
                    } 
                    break; 
            
                case "UN (01) MILITAIRE": 
                    if (companion){
                    window.open('templates/OM/assets/OMint/OMint_one.html');
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
                     break;
                case "DEUX (02) MILITAIRES": 
                    if (companion1 && companion2){
                    window.open('templates/OM/assets/OMint/OMint_two.html');
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
                    break;
                case "TROIS (03) MILITAIRES": 
                    if (companion1 && companion2 && companion3){
                    window.open('templates/OM/assets/OMint/OMint_three.html');
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
                    break;

            }
        

    } else {
        swal({
        title: "Missions Orders Message!",
        text: "Fill all the tabs!",
        icon: "error",
        } );
    }
}

  
</script>
