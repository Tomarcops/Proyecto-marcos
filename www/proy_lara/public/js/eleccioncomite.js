function validate(){
        let valid = true;
        if ($("#eleccion_id").val().trim() ==""){
            alert("La ubicación de la casilla no puede quedar en vacío");
            valid = false;
        }


         if ($("#funcionario_id").val().trim() ==""){
            alert("La ubicación de la casilla no puede quedar en vacío");
            valid = false;
        }


         if ($("#rol_id").val().trim() ==""){
            alert("La ubicación de la casilla no puede quedar en vacío");
            valid = false;
        }
        return (valid);
    }