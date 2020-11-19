@extends('layouts.app-1')
@section('content')
<div class="container">
  <span id="error"></span>
  <span id="sucess"></span>
  <form id="my-form" class="my-form" action="#" method="post">
    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
    <div class="card" style=""  id="print">
      <div class="card-header">
        

         <center><label style="font-size: 20px; font-weight: bold;">{{$shop_name}}</label></center>
        <center>{{$address}}</center>
        <label class="float-right" style="margin-right: 45px;">Contact No: {{$contact_no}}</label>


          <label style="margin-left: 10px;">Bill No: <input type="text" name="bill_no" id="bill_no" readonly="readonly" value="{{$bill_no}}" class="date"></label>
          <div class="row">
             <label style="margin-left: 21px;">@if($pan_no != '') Pan No: {{$pan_no}} @endif</label>
            <label style="margin-left: 43%;" id="my-label">Date: <input type="text" name="date" id="my_date" readonly="readonly"
              @if($date_type==1)
              value="{{$date_ne['y'].'-'.$date_ne['m'].'-'.$date_ne['d']}}"
              @endif
              @if($date_type==0)
              value="{{date('Y-m-d')}}"
              @endif
            readonly="readonly" class="date"></label>
          </div>


        
        <div class="row">
          <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="background-color: transparent;
                  outline: none;
                border: none;">Name: </span>
              </div>
              <input type="text" class="form-control my-input" aria-label="Username" aria-describedby="basic-addon1" name="byer_name" required="required" id="byer_name">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="background-color: transparent;
                  outline: none;
                border: none;">Address: </span>
              </div>
              <input type="text" class="form-control my-input" aria-label="Username" aria-describedby="basic-addon1" name="byer_address" required="required" id="byer_address">
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <center>
        <table class="my-table" id="orders">
          <thead>
            <tr style="border: 1px solid;">
              <th style="
                height: 25px;
                width: 46px;
              ">S.N</th>
              <th>Particular</th>
              <th style=" height: 25px;
                width: 75px;
              ">Qty</th>
              <th style="
                height: 25px;
                width: 100px;
              ">Rate(RS)</th>
              <th style="
                height: 25px;
                width: 150px;
              ">Total(RS)</th>
              <th style="border:none; width: 1px;" id="add_th"><button class="btn btn-primary" id="add" type="button">+
              </button></th>
            </tr>
          </thead>
          <tbody id="my-table-body">
            <tr>
              <td><input type="number" name="serial_no[]" readonly="" id="serial_no1" class="SN" value="1"></td>
              <td><input type="text" name="particular[]" id="particular1" class="form-control particular"></td>
              <td><input class="form-control quantity" type='number' id='quantity_1' name='quantity[]' for="1"/></td>
              <td><input class="form-control product_price" type='number' data-type="product_price" id='product_price_1' name='product_price[]' for="1"/></td> <!-- purchase_cost -->
              <td><input class="form-control total_cost" type='text' id='total_cost_1' name='total_cost[]' for='1' readonly/></td>
              <td>
              </tr>
            </tbody>
            <tr style="border:1px solid;">
              <td colspan="4" style="text-align: right;">Total</td>
              <td style="border:1px solid !important"><input class="form-control subtotal" type='text' id='subtotal' name='subtotal' readonly/></td>
            </tr>
            <tr style="border: 1px solid;">
              <td colspan="5" style="border:1px solid !important">
                <div class="row">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1" style="background-color: transparent;
                        outline: none;
                      border: none;">Amount in Latter: </span>
                    </div>
                    <input type="text" class="form-control my-input" aria-label="Username" aria-describedby="basic-addon1" name="sum_amount" required="required" id="sum_amount" readonly="readonly" style="margin-right: 13px;">
                  </div>
                </div>
              </td>
            </tr>
          </table>
          </center>
        </div>
        <div class="card-footer">
          <div class="row">
            <label class="float-right" style="margin-left: 70%;">Sellesr's Signature</label>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-xl-3"></div>
      <div class="col-lg-3 col-md-3 col-xl-3"></div>
      <div class="col-lg-3 col-md-3 col-xl-3">
        
      </div>
      <div class="col-lg-3 col-md-3 col-xl-3" style="margin-top: 10px;">
        <button id="my-button" class="btn btn-primary float-right" type="button">Print</button>
        <div class="form-check float-right" style="margin-right: 12px;
          background-color: #0062cc;
          padding: 7px;
          padding-left: 24px;
          }">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="" id="check">clear
          </label>
        </div>
      </div>
    </div>
  </form>
</div>
<style type="text/css">
</style>
@endsection
@section('script')
<script>
$(document).ready(function(){
$('#check').on('click', function(){
if($(this).prop('checked')==true){
convertedVal = convertNumToWord(parseInt($('#subtotal').val()));
$('#sum_amount').val(convertedVal);
}else{
$('#sum_amount').val("");
}
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$("#my-button").click(function () {
var error="";
if($('#byer_name').val()== '')
{
error="The name field is empty";
$('#error').html("<div class='alert alert-danger'>"+error+"</div>");
return false;
// alert("Name Field is empty");
}
if($('#byer_address').val()== '')
{
// alert("Address Field is empty");
error ="The address field is empty";
$('#error').html("<div class='alert alert-danger'>"+error+"</div>");
return false;
}
$('.particular').each(function(){
var count=1;
if($(this).val()==''){
error = "Enter Particular at "+count+"Row";
return false;
}
count = count+1;
});
$('.quantity').each(function(){
var count=1;
if($(this).val()==''){
error = "Enter Quantity at "+count+"Row";
$('#error').html("<div class='alert alert-danger'>"+error+"</div>");
return false;
}
count = count+1;
});
$('.product_price').each(function(){
var count=1;
if($(this).val()==''){
error = "Enter product price at "+count+"Row";
return false;
}
count = count+1;
});
if($('#sum_amount').val()=='')
{
error ="Please click on clear";
$('#error').html("<div class='alert alert-danger'>"+error+"</div>");
return false;
}
if(error==''){
var form_data=$('#my-form').serialize();
$.ajax({
url:"{{route('bill.post')}}",
method:"post",
data:form_data,
dataType:"json",
success :function(data) {
if(data=='200')
{
// alert('Sucessfully saved');
}
},
error: function(e) {
console.log(e.responseText);
}
});
}
else{
$('#error').html("<div class='alert alert-danger'>"+error+"</div>");
return false;
}
$('#add_th').remove();
$('.btn_remove').remove();
$('#my-label').css('margin-left', '63%');
$("#print").printThis({
debug: false,               // show the iframe for debugging
importCSS: true,            // import parent page css
importStyle: false,         // import style tags
printContainer: true,       // print outer container/$.selector
loadCSS: "{{asset('bootstrap/my.css')}}",                // path to additional css file - use an array [] for multiple
pageTitle: "",              // add title to print page
removeInline: false,        // remove inline styles from print elements
removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
printDelay: 333,            // variable print delay
header: null,               // prefix to html
footer: null,               // postfix to html
base: false,                // preserve the BASE tag or accept a string for the URL
formValues: true,           // preserve input/form values
canvas: false,              // copy canvas content
doctypeString: '...',       // enter a different doctype for older markup
removeScripts: false,       // remove script tags from print content
copyTagClasses: false,      // copy classes from the html & body tag
beforePrintEvent: null,     // function for printEvent in iframe
beforePrint: null,          // function called before iframe is filled
afterPrint: null            // function called before iframe is removed
});
setTimeout(() => window.location.reload(), 5000);
});
});
</script>
@endsection