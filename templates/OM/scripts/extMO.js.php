<script type="text/javascript"> 
    function  generateExtMO(){
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

        console.log(localStorage); 

        window.open('templates/OM/assets/OMext/OMext.html');

    }

  
</script>
