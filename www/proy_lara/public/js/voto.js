function validate(){
        let valid = true;
        if ($("#evidencia").val().trim() ==""){
            alert("La ubicación de la casilla no puede quedar en vacío");
            valid = false;
        }
        return (valid);
    }