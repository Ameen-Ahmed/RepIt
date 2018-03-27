var paid = false;
var confirmed = false;
var completed = false;
var expired = false;
var invalid = false;
var timeout = false;
var email_info = '';
var name_info = '';

function pending(invoice_id, name, email) {
  name_info = name;
  email_info = email;
    $.ajax({
         type: "POST",
         url: "private/invoice_status_check.php",
         data: {
           check : invoice_id
         },
         success:function(data) {
           if(data === 'new'){
             console.log("Awaiting Payment...");
             if(!(paid || confirmed || completed || expired || invalid)){
               timeout = setTimeout(function(){pending(invoice_id, name, email);}, 5000);
             }
           }
           else{
             clearTimeout(timeout);
             if(data === 'paid'){
               isPaid();
             }
             else if(data === 'confirmed'){
               isConfirmed();
             }
             else if(data === 'completed'){
               isCompleted();
             }
             else if(data === 'expired'){
               isExpired();
             }
             else if(data === 'invalid'){
               isInvalid();
             }
             else{
               other();
             }
           }
       },
       failure:function(){
         clearTimeout(timeout);
       }
    });
 }

function isPaid(){
  if(!paid){
    paid = true;
    console.log("We've been paid!");
    $.ajax({
         type: "POST",
         url: "private/functions.php",
         data: {
           mail_name : name_info,
           mail_email : email_info,
           message : 'Confirmation email: Payment of the invoice has been made.'
         },
         success:function(data){
           console.log(data);
         },
         failure:function(){
           console.log('Email Failed');
         }
    });
  }
}

function isConfirmed(){
  if(!paid){
    console.log("Payment is confirmed");
    confirmed = true;
  }
}

function isCompleted(){
  if(!paid){
    console.log("Payment is completed");
    completed = true;
  }
}

function isExpired(){
  if(!paid){
    console.log("Payment is expired");
    expired = true;
  }
}

function isInvalid(){
  if(!paid){
    console.log("We've been invalid");
    invalid = true;
  }
}

function other(){
  console.log("What's taking so long ");
}
