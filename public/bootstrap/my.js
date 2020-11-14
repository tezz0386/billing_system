	var rowCount = 1;

$('#add').click(function() {
rowCount++;
$('#my-table-body').append('<tr id="row'+rowCount+'"><td><input type="number" name="serial_no[]" readonly="" id="serial_no'+rowCount+'" class="SN" value="1"></td><td><input type="text" name="particular[]" id="particular'+rowCount+'" class="form-control particular"></td><td><input class="form-control product_price" type="number" data-type="product_price" id="product_price_'+rowCount+'" name="product_price[]" for="'+rowCount+'"/></td><td><input class="form-control quantity" type="number" class="quantity" id="quantity_'+rowCount+'" name="quantity[]" for="'+rowCount+'"/> </td><td><input class="form-control total_cost" type="text" id="total_cost_'+rowCount+'" name="total_cost[]"  for="'+rowCount+'" readonly/> </td><td><button type="button" name="remove" id="'+rowCount+'" class="btn btn-danger btn_remove cicle">x</button></td></tr>');
$("#serial_no"+rowCount+"").val(rowCount);
});
// Add a generic event listener for any change on quantity or price classed inputs
$("#orders").on('input', 'input.quantity,input.product_price', function() {
getTotalCost($(this).attr("for"));
});
$(document).on('click', '.btn_remove', function() {
var button_id = $(this).attr('id');
$('#row'+button_id+'').remove();
rowCount--;
});
// Using a new index rather than your global variable i
function getTotalCost(ind) {
var qty = $('#quantity_'+ind).val();
var price = $('#product_price_'+ind).val();
var totNumber = (qty * price);
var tot = totNumber.toFixed(2);
$('#total_cost_'+ind).val(tot);
calculateSubTotal();
}
function calculateSubTotal() {
var subtotal = 0;
$('.total_cost').each(function() {
subtotal += parseFloat($(this).val());
});
$('#subtotal').val(subtotal);
}
// for number to word converter
var a = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
var b = ['Hundred', 'Thousand', 'Lakh', 'Crore'];
var c_0 = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Ninteen'];
var d   = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

function convertNumToWord(number){
  var c, rm;
  c = 1;
  string = '';
  number == 0 && (string = 'Zero');
  while (number != 0) {
    switch (c) {
      case 1:
        rm = number % 100;
        pass(rm);
        number > 100 && number % 100 != 0 && display('And ');
        number = ~~(number / 100);
        break;
      case 2:
        rm = number % 10;
        if (rm != 0) {
          display(' ');
          display(b[0]);
          display(' ');
          pass(rm);
        }

        number = ~~(number / 10);
        break;
      case 3:
        rm = number % 100;
        if (rm != 0) {
          display(' ');
          display(b[1]);
          display(' ');
          pass(rm);
        }

        number = ~~(number / 100);
        break;
      case 4:
        rm = number % 100;
        if (rm != 0) {
          display(' ');
          display(b[2]);
          display(' ');
          pass(rm);
        }

        number = ~~(number / 100);
        break;
      case 5:
        rm = number % 100;
        if (rm != 0) {
          display(' ');
          display(b[3]);
          display(' ');
          pass(rm);
        }

        number = ~~(number / 100);
    }
    ++c;
  }
  return string;
}

function display(s){
  var t;
  t = string;
  string = s;
  string += t;
}

function pass(number){
  var q, rm;
  number < 10 && display(a[number]);
  number > 9 && number < 20 && display(c_0[number - 10]);
  if (number > 19) {
    rm = number % 10;
    if (rm == 0) {
      q = ~~(number / 10);
      display(d[q - 2]);
    }
     else {
      q = ~~(number / 10);
      display(a[rm]);
      display(' ');
      display(d[q - 2]);
    }
  }
}
