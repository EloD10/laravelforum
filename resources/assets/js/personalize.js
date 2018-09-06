
import swal from 'sweetalert';

let elements = document.querySelectorAll('#form-confirmed')

elements.forEach(element => {
    element.addEventListener('submit', function(e) {

        // cancel form submit for a moment
        e.preventDefault();

        swal("Êtes vous sûr de faire ceci ?", {
            dangerMode: true,
            buttons: {
                undo: {
                    text: "Annuler !",
                    value: false,
                },
                confirm: true,
              },
        })
        .then((value) => { 
            if(value) {
                element.submit()
            }
        })

    })
});
