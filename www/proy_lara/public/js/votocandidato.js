function validate(){
        let valid = true;
        if ($("#votos").val().trim() ==""){
            alert("La ubicación de la casilla no puede quedar en vacío");
            valid = false;
        }
        return (valid);
    }