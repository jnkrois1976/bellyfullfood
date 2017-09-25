var APP = APP || {},
    DATA = DATA || {},
    MODEL = MODEL || {};

DATA.order = {
    currentSelections: []
}

MODEL.elems = {
    mealQty: document.getElementsByClassName('mealQty'),
    addToCartBtn: document.getElementById('addToCartBtn'),
    addToCartForm: document.getElementById('addToCartForm'),
    selections: document.getElementById('selections'),
    pickupDate: document.getElementsByClassName('pickUpDay'),
    monthNav: document.getElementsByClassName('monthNav'),
    calendar: document.getElementById('pickUpDate'),
    pickUpDateStatic: document.getElementById('pickUpDate'),
    rawDate: document.getElementById('rawDate'),
    errorMessage: document.getElementById('errorMessage')
}

APP.events = {
    calculateMealsQty: function(event){
        var mealQtyElems = MODEL.elems.mealQty, qtyElemValue = 0, target = event.target, mealSelected;
        DATA.order.currentSelections.forEach(function(item, index, array){
            if(item == target.dataset.mealid){
                mealSelected = true;
            }
        })
        if(parseInt(target.value) > 0 && !mealSelected){
            var newRow = document.createElement('tr'),
                newMealCell = document.createElement('td'),
                newQtyCell = document.createElement('td'),
                newMeal = document.createTextNode(target.dataset.mealname),
                newQty = document.createTextNode(target.value);
            newRow.setAttribute('id', target.dataset.mealid)
            newMealCell.appendChild(newMeal);
            newQtyCell.appendChild(newQty);
            newRow.appendChild(newMealCell);
            newRow.appendChild(newQtyCell);
            DATA.order.currentSelections.push(target.dataset.mealid);
            MODEL.elems.selections.appendChild(newRow);
        }else{
            var targetRow = document.getElementById(target.dataset.mealid);
            if(target.value == 0){
                targetRow.remove();
            }else{
                targetRow.children[1].textContent=target.value;
            }
        }
        for(var i = 0; i < mealQtyElems.length; i++){
            qtyElemValue += parseInt(mealQtyElems[i].value);
            if(qtyElemValue >= 6){
                MODEL.elems.addToCartBtn.removeAttribute('disabled');
            }else if(qtyElemValue < 6){
                MODEL.elems.addToCartBtn.setAttribute('disabled', '');
            }
        }
    },
    mealQtyListener: function(){
        var mealQtyElems = MODEL.elems.mealQty, qtyElem;
        for(var i = 0; i < mealQtyElems.length; i++){
            qtyElem = mealQtyElems[i];
            qtyElem.addEventListener('change', this.calculateMealsQty, false);
        }
    },
    definePickupDate: function(event){
        var pickupDateElems = MODEL.elems.pickupDate,
        dayElem = '',
        selectedElem = event.target,
        selectedElemDate = selectedElem.dataset.fulldate,
        getformattedDate = AJAX.calls.fortmatDate(selectedElemDate);
        for(var i = 0; i < pickupDateElems.length; i++){
            dayElem = pickupDateElems[i];
            dayElem.classList.remove('selected');
        }
        selectedElem.classList.add('selected');
        $("#rawDate").val(selectedElemDate);
    },
    pickupDate: function(){
        if(document.querySelector('#pickUpDate')){
            document.querySelector('#pickUpDate').addEventListener('click', function(event){
                if(event.target.classList.contains('pickUpDay')){
                    APP.events.definePickupDate(event);
                }
            }, true);
        }
    },
    generateAjaxCalendar: function(event){
        event.preventDefault();
        var extractDate = event.target.pathname,
            breakDate = extractDate.split('/');
        AJAX.calls.generateCalendar(breakDate[4], breakDate[3]);
    },
    monthNavEvents: function(){
        if(document.querySelector('#pickUpDate')){
            document.querySelector('#pickUpDate').addEventListener('click', function(event) {
                if ( event.target.classList.contains('monthNav') ) {
                    APP.events.generateAjaxCalendar(event);
                }
            }, true);
        }
    },
    addToCart: function(event){
        event.preventDefault();
        var dateSet = MODEL.elems.rawDate.value;
        if(dateSet.length == 0){
            MODEL.elems.errorMessage.textContent='Please select a delivery date';
            MODEL.elems.errorMessage.classList.remove('d-none');
            return false;
        }else{
            MODEL.elems.addToCartForm.submit();
        }
    },
    addToCartEvent: function(event){
        if(MODEL.elems.addToCartBtn){
            MODEL.elems.addToCartBtn.addEventListener('click', this.addToCart, false);
        }
    }
}

APP.events.mealQtyListener();
APP.events.pickupDate();
APP.events.monthNavEvents();
APP.events.addToCartEvent();
