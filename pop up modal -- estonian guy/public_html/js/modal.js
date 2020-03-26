
document.addEventListener("DOMContentLoaded", function(event) { 
    const modal = UIkit.modal("#my-id")
    if(!Cookies.get('modal')){
        modal.show()
        Cookies.set('modal', true); // here you can pass third argument to set when cookie expires, example : Cookies.set('modal', true, { expires: 1 })
    }
});




