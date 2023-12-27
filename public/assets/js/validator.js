const passValidation = () => {
    const inputPass = document.getElementById("password");
    let value = inputPass.value;
    const valMess = document.getElementById("valMess");

    if(value.length == 8){
        valMess.innerText = ""
    }else if(value.length <= 8){
        valMess.innerText = "Password harus terdiri minimal 8 karakter"
    }
}