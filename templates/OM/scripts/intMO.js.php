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
                    var companion = document.getElementById("name1").value + " MLE : "+ document.getElementById("mat1").value; 
                    localStorage.setItem('companion', companion.toUpperCase());
                     break;
                case "DEUX (02) MILITAIRES": 
                    var companion1 = document.getElementById("name1").value + " MLE : "+ document.getElementById("mat1").value;
                    var companion2 = document.getElementById("name2").value + " MLE : "+ document.getElementById("mat2").value;
                    localStorage.setItem('companion1', companion1.toUpperCase());
                    localStorage.setItem('companion2', companion2.toUpperCase());
                    break;
                case "TROIS (03) MILITAIRES": 
                    var companion1 = document.getElementById("name1").value + " MLE : "+ document.getElementById("mat1").value;
                    var companion2 = document.getElementById("name2").value + " MLE : "+ document.getElementById("mat2").value;
                    var companion3 = document.getElementById("name3").value + " MLE : "+ document.getElementById("mat3").value;
                    localStorage.setItem('companion1', companion1.toUpperCase());
                    localStorage.setItem('companion2', companion2.toUpperCase());
                    localStorage.setItem('companion3', companion3.toUpperCase());
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


        switch(companions){
                case "SEUL":
                    window.open('templates/OM/assets/OMint/OMint_alone.html'); 
                    break; 
            
                case "UN (01) MILITAIRE": 
                    window.open('templates/OM/assets/OMint/OMint_one.html');
                     break;
                case "DEUX (02) MILITAIRES": 
                    window.open('templates/OM/assets/OMint/OMint_two.html');
                    break;
                case "TROIS (03) MILITAIRES": 
                    window.open('templates/OM/assets/OMint/OMint_three.html');
                    break;

            }
        

    }

  
</script>
