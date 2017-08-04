$(function() {

    // let owner = $('#owner');
    let cardNumber = $('#card_number');
    // let cardNumberField = $('#card-number-field');
    let cvc = $("#cvc");
    let expire = $("#card_expire");
    // let mastercard = $("#mastercard");
    // let confirmButton = $('#confirm-purchase');
    // let visa = $("#visa");
    // let amex = $("#amex");

    // Use the payform library to format and validate
    // the payment fields.

    cardNumber.payment('formatCardNumber');
    cvc.payment('formatCardCVC');
    expire.payment('formatCardExpiry');

    cardNumber.keyup(function() {

        // console.log($.payment.validateCardNumber(cardNumber.val()));
        console.log($.payment.cardType(cardNumber.val()));

        if ($.payment.cardType(cardNumber.val()) == 'visa') {

        } else if ($.payment.cardType(cardNumber.val()) == 'amex') {

        } else if ($.payment.cardType(cardNumber.val()) == 'mastercard') {

        }
    });

    // confirmButton.click(function(e) {

    //     e.preventDefault();

    //     var isCardValid = $.payform.validateCardNumber(cardNumber.val());
    //     var isCvvValid = $.payform.validateCardCVC(CVV.val());

    //     if(owner.val().length < 5){
    //         alert("Wrong owner name");
    //     } else if (!isCardValid) {
    //         alert("Wrong card number");
    //     } else if (!isCvvValid) {
    //         alert("Wrong CVV");
    //     } else {
    //         // Everything is correct. Add your form submission code here.
    //         alert("Everything is correct");
    //     }
    // });
});
