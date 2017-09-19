<?php
    var_dump($_POST);
?>
<div id="cart" class="container">
  <div class="row">
    <div class="col">
      <h1 class="pageTitle">Order Review</h1>
      <h4>Your selections are:</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
      <table class="table table-sm table-striped table-bordered">
        <thead>
          <tr>
            <th>Qty</th>
            <th>Meal</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?=$test[0]?>
        </tbody>
      </table>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-header">
          Your Selections
        </div>
        <div class="card-body">
          <h5>Your 6 meal package</h5>
          <table class="table table-sm table-bordered table-striped">
            <colgroup>
              <col width="20%">
              <col width="60%">
              <col width="20%">
            </colgroup>
            <thead>
              <tr>
                <th>Qty</th>
                <th>Description</th>
                <th>Cost</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>6 meal package</td>
                <td>$50.<sup>00</sup>
              </tr>
              <tr>
                <td>-</td>
                <td>Delivery</td>
                <td>$10.<sup>00</sup>
              </tr>
                <tr>
                  <td colspan="3">&nbsp;</td>
                </tr>
              <tr>
                <td>Total</td>
                <td colspan="2" class="currency">$60.<sup>00</sup></td>
              </tr>
            </tbody>
          </table>
          <a href="/cart" class="btn btn-primary btn-lg btn-block">Place order</a>
        </div>
      </div>
    </div>
  </div>
  <hr />
  <div class="row">
    <div class="col-8">
      <form [formGroup]="cartForm">
        <fieldset>
        <legend><h4>Contact and Payment Information</h4></legend>
          <div class="row">
            <div class="col">
              <div class="form-row">
                <div class="col">
                  <label for="exampleFormControlInput1">Name</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="full name">
                </div>
                <div class="col">
                  <label for="exampleFormControlInput1">Email address</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="col">
                  <label for="exampleFormControlInput1">Phone Numner</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="phone number">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
                <hr />
              <div id="address" class="form-row">
                <div class="col ">
                  <label for="exampleFormControlInput1">Delivery Address</label>
                  <input class="form-control" id="street_number" name="street_number" required placeholder="Street number" />
                </div>
                 <div class="col d-flex align-items-end">
                  <input class="form-control" id="route" name="route" required placeholder="Street name"/>
                 </div>
                 <div class="col d-flex align-items-end">
                  <input class="form-control" id="shippingAptNumber" name="shippingAptNumber" placeholder="Apt number"/>
                 </div>
              </div>
              <div class="form-row">
                 <div class="col">
                  <input class="form-control" id="locality" name="locality" required placeholder="City" />
                 </div>
                 <div class="col">
                  <input class="form-control" id="administrative_area_level_1" name="administrative_area_level_1" required placeholder="State" />
                 </div>
                 <div class="col">
                  <input class="form-control" id="postal_code" name="postal_code" required placeholder="Zip code"/>
                 </div>
              </div>
                <hr />
              <div class="form-row">
                <div class="col">
                  <label>Credit Card Information</label>
                  <input value="" class="form-control" id="sq-card-number" name="cardNumber" type="text" placeholder="Credit Card Number" required="required"/>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <input id="sq-expiration-date" class="form-control" name="sq-expiration-date" type="text" placeholder="MM/YY" required="required" />
                </div>
                <div class="col">
                  <input value="" class="form-control" id="sq-cvv" name="cardCvv" type="text" placeholder="CVV..." required="required"/>
                </div>
                <div class="col">
                  <input type="text" id="sq-postal-code" name="sq-postal-code" class="form-control" placeholder="Zip Code" required="required" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <a href="/cart" class="btn btn-primary btn-lg btn-block">Place Order Now</a>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
