// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='deposer-projet-form']").validate({

    errorClass: "dpError",
    errorElement: "span",
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      // 
       titre: {
        required: true,
        minlength: 5,
        maxlength: 40
      },
      delai: {
        required: true,
        maxlength: 20
      },
      nom: {
        required: true,
        minlength: 3,
        maxlength: 20
      },
      prenom: {
        required: true,
        minlength: 3,
        maxlength: 20
      },
      description: {
        required: true,
        minlength: 50,
        maxlength: 1500
      },
      mobile:{
        required: true
      }

    },
    // Specify validation error messages
    messages: {
  
      titre: {
        required: "Le titre ne peut pas être vide",
        minlength: "Veuillez entrer au moins 5 caractères",
        maxlength: "Veuillez ne pas dépaser 40 caractères"
      },
      delai: {
        required: "Le délai ne peut pas être vide",
        maxlength: "Veuillez ne pas dépaser 20 caractères"
      },
      nom: {
        required: "Le nom ne peut pas être vide",
        minlength: "Veuillez entrer au moins 3 caractères",
        maxlength: "Veuillez ne pas dépaser 20 caractères"
      },
      prenom: {
        required: "Le prenom ne peut pas être vide",
        minlength: "Veuillez entrer au moins 3 caractères",
        maxlength: "Veuillez ne pas dépaser 20 caractères"
      },
      description: {
        required: "La description ne peut pas être vide",
        minlength: "Veuillez entrer au moins 50 caractères",
        maxlength: "Veuillez ne pas dépaser 15000 caractères"
      },
      email: {
        required: "Le mail ne peut pas être vide",
        maxlength: "Veuillez ne pas dépaser 255 caractères"
      },
      mobile: {
        required: "La téléphone ne peut pas être vide",
      },
      
    },
    highlight: function(element, errorClass) {
        $(element).removeClass(errorClass);
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

  jQuery.extend(jQuery.validator.messages, {
    required: "Le champ ne peut pas être vide",
    remote: "votre message",
    email: "votre message",
    url: "votre message",
    date: "votre message",
    dateISO: "votre message",
    number: "votre message",
    digits: "votre message",
    creditcard: "votre message",
    equalTo: "votre message",
    accept: "votre message",
    maxlength: jQuery.validator.format("Ce champ dépase {0} caractéres."),
    rangelength: jQuery.validator.format("votre message  entre {0} et {1} caractéres."),
    range: jQuery.validator.format("votre message  entre {0} et {1}."),
    max: jQuery.validator.format("votre message  inférieur ou égal à {0}."),
    min: jQuery.validator.format("votre message  supérieur ou égal à {0}.")
  });
});