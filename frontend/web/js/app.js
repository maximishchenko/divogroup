
document.addEventListener("DOMContentLoaded", function () {
    var phoneInputs = document.querySelectorAll('input[data-tel-input]');
  
    var getInputNumbersValue = function (input) {
      // Return stripped input value — just numbers
      return input.value.replace(/\D/g, '');
    }
  
    var onPhonePaste = function (e) {
      var input = e.target,
        inputNumbersValue = getInputNumbersValue(input);
      var pasted = e.clipboardData || window.clipboardData;
      if (pasted) {
        var pastedText = pasted.getData('Text');
        if (/\D/g.test(pastedText)) {
          // Attempt to paste non-numeric symbol — remove all non-numeric symbols,
          // formatting will be in onPhoneInput handler
          input.value = inputNumbersValue;
          return;
        }
      }
    }
  
    var onPhoneInput = function (e) {
      var input = e.target,
        inputNumbersValue = getInputNumbersValue(input),
        selectionStart = input.selectionStart,
        formattedInputValue = "";
  
      if (!inputNumbersValue) {
        return input.value = "";
      }
  
      if (input.value.length != selectionStart) {
        // Editing in the middle of input, not last symbol
        if (e.data && /\D/g.test(e.data)) {
          // Attempt to input non-numeric symbol
          input.value = inputNumbersValue;
        }
        return;
      }
  
      if (["7", "8", "9"].indexOf(inputNumbersValue[0]) > -1) {
        if (inputNumbersValue[0] == "9") inputNumbersValue = "7" + inputNumbersValue;
        var firstSymbols = (inputNumbersValue[0] == "8") ? "8" : "+7";
        formattedInputValue = input.value = firstSymbols + " ";
        if (inputNumbersValue.length > 1) {
          formattedInputValue += '(' + inputNumbersValue.substring(1, 4);
        }
        if (inputNumbersValue.length >= 5) {
          formattedInputValue += ') ' + inputNumbersValue.substring(4, 7);
        }
        if (inputNumbersValue.length >= 8) {
          formattedInputValue += '-' + inputNumbersValue.substring(7, 9);
        }
        if (inputNumbersValue.length >= 10) {
          formattedInputValue += '-' + inputNumbersValue.substring(9, 11);
        }
      } else {
        formattedInputValue = '+' + inputNumbersValue.substring(0, 16);
      }
      input.value = formattedInputValue;
    }
    var onPhoneKeyDown = function (e) {
      // Clear input after remove last symbol
      var inputValue = e.target.value.replace(/\D/g, '');
      if (e.keyCode == 8 && inputValue.length == 1) {
        e.target.value = "";
      }
    }
    for (var phoneInput of phoneInputs) {
      phoneInput.addEventListener('keydown', onPhoneKeyDown);
      phoneInput.addEventListener('input', onPhoneInput, false);
      phoneInput.addEventListener('paste', onPhonePaste, false);
    }
})

    
$('#hero_form').on('beforeSubmit', function (e) {
  var form = $(this);
  var formData = form.serialize();
  $.ajax({
    url: form.attr('action'),
    type: form.attr('method'),
    dataType: "JSON",
    data: new FormData(this),
    processData: false,
    contentType: false,
    beforeSend: function () {
      // $('#hero_form').hide();
      // $('#######').show();
    },
    complete: function () {
        $('#hero_form').find('input').val('');
        alert("Заебцы");
        // $('.help-block').html('');
        // document.getElementById('review_rating_popup').reset();
        // document.getElementById('preview').innerHTML = "";
    },
    error: function () {
    }
  });
}).on('submit', function (e) {
  e.preventDefault();
});


$('#feedback_form').on('beforeSubmit', function (e) {
  var form = $(this);
  var formData = form.serialize();
  $.ajax({
    url: form.attr('action'),
    type: form.attr('method'),
    dataType: "JSON",
    data: new FormData(this),
    processData: false,
    contentType: false,
    beforeSend: function () {
      // $('#hero_form').hide();
      // $('#######').show();
    },
    complete: function () {
        $('#feedback_form').find('input').val('');
        $('#feedback_form').find('textarea').val('');
        alert("Заебцы");
        // $('.help-block').html('');
        // document.getElementById('review_rating_popup').reset();
        // document.getElementById('preview').innerHTML = "";
    },
    error: function () {
    }
  });
}).on('submit', function (e) {
  e.preventDefault();
});


$('#feedback_form_modal').on('beforeSubmit', function (e) {
  var form = $(this);
  var formData = form.serialize();
  $.ajax({
    url: form.attr('action'),
    type: form.attr('method'),
    dataType: "JSON",
    data: new FormData(this),
    processData: false,
    contentType: false,
    beforeSend: function () {
          
      const el = document.querySelector('#contact_modal');
      el.classList.remove("is-open");
      // $('#hero_form').hide();
      // $('#######').show();
    },
    complete: function () {
      // graph-modal is-open
        // $()
        $('#feedback_form_modal').find('input').val('');
        $('#feedback_form_modal').find('textarea').val('');
        alert("Заебцы");
        // $('.help-block').html('');
        // document.getElementById('review_rating_popup').reset();
        // document.getElementById('preview').innerHTML = "";
    },
    error: function () {
    }
  });
}).on('submit', function (e) {
  e.preventDefault();
});


$(".feedback-form__checkbox").click(function() {
  if (($(this).prop("checked"))) {
      $("#callback_submit_btn").removeAttr("disabled");
  } else {
      $("#callback_submit_btn").attr("disabled", "disabled");
  }
})
$(".feedback-form__checkbox_modal").click(function() {
  if (($(this).prop("checked"))) {
      $("#callback_submit_btn_modal").removeAttr("disabled");
  } else {
      $("#callback_submit_btn_modal").attr("disabled", "disabled");
  }
})