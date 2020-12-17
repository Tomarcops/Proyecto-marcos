function validate(){
        let valid = true;
        if ($("#nombrecompleto").val().trim() ==""){
            alert("La ubicación de la casilla no puede quedar en vacío");
            valid = false;
        }


         if ($("#sexo").val().trim() ==""){
            alert("La ubicación de la casilla no puede quedar en vacío");
            valid = false;
        }
        return (valid);
    }