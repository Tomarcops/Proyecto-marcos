function validate(){
        let valid = true;
        if ($("#periodo").val().trim() ==""){
            alert("La ubicación de eleccion no puede quedar en vacío");
            valid = false;
        }
       
        if ($("#fecha").val().trim() ==""){
            alert("La ubicación de eleccion no puede quedar en vacío");
            valid = false;
        }
       
        
        if ($("#fechaapertura").val().trim() ==""){
            alert("La ubicación de eleccion no puede quedar en vacío");
            valid = false;
        }
       
  
        if ($("#horaapertura").val().trim() ==""){
            alert("La ubicación de eleccion no puede quedar en vacío");
            valid = false;
        }
        
        if ($("#fechacierre").val().trim() ==""){
            alert("La ubicación de eleccion no puede quedar en vacío");
            valid = false;
        }
       
        if ($("#horacierre").val().trim() ==""){
            alert("La ubicación de eleccion no puede quedar en vacío");
            valid = false;
        }
        
        if ($("#observacione").val().trim() ==""){
            alert("La ubicación de eleccion no puede quedar en vacío");
            valid = false;
        }
        return (valid);
    }

