var APP = APP || {},
    DATA = DATA || {},
    MODEL = MODEL || {};

DATA.order = {
    currentSelections: []
}

MODEL.elems = {
    mealQty: document.getElementsByClassName('mealQty'),
    placeOrderBtn: document.getElementById('placeOrder'),
    selections: document.getElementById('selections')
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
                MODEL.elems.placeOrderBtn.removeAttribute('disabled');
            }else if(qtyElemValue < 6){
                MODEL.elems.placeOrderBtn.setAttribute('disabled', '');
            }
        }
    },
    mealQtyListener: function(){
        var mealQtyElems = MODEL.elems.mealQty, qtyElem;
        for(var i = 0; i < mealQtyElems.length; i++){
            qtyElem = mealQtyElems[i];
            qtyElem.addEventListener('change', this.calculateMealsQty, false);
        }
    }
}

APP.events.mealQtyListener();
