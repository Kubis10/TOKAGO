function zakup(cena, nazwa) {
    var stan = document.getElementById("stan").innerText;
    if (stan >= cena) {
        Swal.fire({
            title: 'Jesteś pewien że chcesz to kupić?',
            text: "Nie będzie możliwośći zwrotu!",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Anuluj',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tak, kup!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Kupione!',
                    'Skin został dodany do twojego eq.',
                    'success'
                ).then((result) => {
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "addSkin.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send(`item_id=${nazwa}&money=${cena}`);
                    window.location.reload(true);
                })
            }
        })
    }
    else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nie masz wystarczająco pieniędzy!',
        })
    }
}
function vip_m() {
    var stan = document.getElementById("stan").innerText;
    Swal.fire({
        icon: 'question',
        title: 'Czy chcesz kupić lub przedłużyć vipa o miesiąc?',
        showCancelButton: true,
        cancelButtonText: 'Anuluj',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak!'
    }).then((result) => {
            if (result.isConfirmed) {
                if (stan >= 20) {
                    Swal.fire('Zakupiono na kolejny miesiąc!', '', 'success').then((result) => {
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "addVip.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send(`ile=${"miesiac"}&money=${"10"}`);
                    window.location.reload(true);
                    })
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Nie masz wystarczająco pieniędzy!',
                    })
                }
            }
    })
}
function vip_r() {
    var stan = document.getElementById("stan").innerText;
    Swal.fire({
        icon: 'question',
        title: 'Czy chcesz kupić lub przedłużyć vipa o rok?',
        showCancelButton: true,
        cancelButtonText: 'Anuluj',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak!'
    }).then((result) => {
        if (result.isConfirmed) {
            if (stan >= 200) {
                Swal.fire('Zakupiono na kolejny rok!', '', 'success').then((result) => {
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "addVip.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send(`ile=${"rok"}&money=${"180"}`);
                    window.location.reload(true);
                })
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nie masz wystarczająco pieniędzy!',
                })
            }
        }
    })
}