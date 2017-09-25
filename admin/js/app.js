var APP = APP || {};
APP.elems = {
    //inputElems: document.getElementsByClassName('')
};
APP.events = {
    editInputEvent: function(event){
        event.target.removeAttribute('readonly');
    },
    disableInput: function(event){
        event.target.setAttribute('readonly', '');
    },
    enableSubmit: function(event){
        event.target.form.elements['submit'].removeAttribute('disabled');
    }
};
