function display() {
    let checkRadio = document.querySelector('input[name="test"]:checked');

    if(checkRadio != null) {
        document.getElementById("img_mon").src = "shop/img/" + checkRadio.value + ".png";
    }
    else {
        document.getElementById("img_mon").src = "";
    }
}