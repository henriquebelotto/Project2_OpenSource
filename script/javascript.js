//  Student Name: Henrique Radicchi Belotto
//  Student Number: N01245990 
// Javascript code created to Webdesign project

function validateForm(){

// creating all the variable to collect information from the form
	var customerName = document.getElementById("nameInput").value;

	var customerEmail = document.getElementById("emailInput").value;

	var customerPhone = document.getElementById("phoneInput").value;

	var emailMethod = document.getElementById("emailChk").checked;

	var phoneMethod = document.getElementById("phoneChk").checked;
	var contactMethod; // this variable will be use to set the string output

	var maleChecked = document.getElementById("male").checked;
	var femaleChecked = document.getElementById("female").checked;
	var otherChecked = document.getElementById("other").checked;
	var gender; // this variable will be use to set the string output

	var subject = document.getElementById("subjectInput").value;

	var message = document.getElementById("messageInput").value;

	var newsletterChecked = document.getElementById("newsletterChkBox").checked;
	var newsletter; //this variable will be use to set the string output

	var countrySelected = document.getElementById("countryIndex").value;

// validating the customer name. It can't be empty and must contain only characters
	if(customerName == "" || customerName == null || customerName.length == 0) {
					alert("Please, leave your name before submitting the form.");
					// change the border to alert the user of the error
					document.getElementById("nameInput").style.border="2px red solid";
					return false;
	} else{
		// verify if the name contains only letters
		var regName = /^[a-zA-Z]/;
			if (regName.test(customerName) == false){
				// change the border to alert the user of the error
				document.getElementById("nameInput").style.border="2px red solid";
				alert("Please, enter a valid name");
				return false;
			}
	}

// validating the customer email. It can't be empty and must contain an special form a@b.com
	if(customerEmail == "" || customerEmail == null || customerEmail.length == 0) {
					// change the border to alert the user of the error
					document.getElementById("emailInput").style.border="2px red solid";
					alert("Please enter email before submitting the form.");
					return false;
	
	}else{
		// verify if the email has a proper email-format
		var regEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
			
			if(regEmail.test(customerEmail)==false) {
				// change the border to alert the user of the error
				document.getElementById("emailInput").style.border="2px red solid";
				alert("Enter a valid email address (a@b.com)");
				return false;
		}
	}

	// validating the customer phone number. It can't be empty and must contain only numbers
	if (isNaN(customerPhone)) {
		alert("Please, leave your phone Number before submitting the form.");
		// change the border to alert the user of the error
		document.getElementById("phoneInput").style.border="2px red solid";
		return false;
	} else{
		// verify format of the phone number
		var regPhone = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
			if (regPhone.test(customerPhone) == false){
				// change the border to alert the user of the error
				document.getElementById("phoneInput").style.border="2px red solid";
				alert("Please, enter a valid phone number");
				return false;
			}

	}


// checking if at least one contact method was selected
	if (emailMethod == false && phoneMethod == false) {
		alert("Please, select at least one method to contact you")
		// change the border to alert the user of the error
		document.getElementById("contactMethod").style.border="2px red solid";
		return false;

// according to user selection, the string output will be different
// User selected email as preferred method
	} else if (emailMethod == true && phoneMethod == false){
		contactMethod = "email "+ customerEmail;

// User selected phone as preferred method
	} else if (phoneMethod == true && emailMethod == false){
		contactMethod = "phone " + customerPhone;

// User selected both email and phone as preferred methods
	} else if(phoneMethod == true && emailMethod == true){
		contactMethod = "email " + customerEmail + " or phone " + customerPhone;
	}


// checking if a gender was selected
	if (maleChecked == false && femaleChecked == false && otherChecked == false){
		alert("Please, select your gender")
		// change the border to alert the user of the error
		document.getElementById("gender").style.border="2px red solid";
		return false;
	}

// User selected male as gender
	if (maleChecked == true){
		gender = "male"

// User selected male as gender
	} else if (femaleChecked == true){
		gender = "female"
	} else if (otherChecked == true){
		gender = "other"
	}


// checking there was any subject and message written
	if(subject == "" || subject == null || subject.length == 0) {
		alert("Please, write the subject of your contact");
		// change the border to alert the user of the error
		document.getElementById("subjectInput").style.border="2px red solid";
		return false;
	} 

	if(message == "" || message == null || message.length == 0) {
		alert("Please, remember to write your message before submitting the form.");
		// change the border to alert the user of the error
		document.getElementById("messageInput").style.border="2px red solid";
		return false;
	}

// checking if a newsletter option was selected. It will change the string output of this webpage
	if(newsletterChecked == true){
		newsletter = "Thank you for subscribing to our webpage!"
	} else{
		newsletter = "Unfortunately, you haven't subscribed to our webpage. Maybe in the future, right?"
	}

	
	var output = "Thank you " + customerName + " (" + gender +")" + " from " + countrySelected + " for submitting your message! \n" +
		"Soon somebody will contact your by (" + contactMethod + ") according to your choice. \n" +
		"Your submitted message was: \n" + "subject: " + subject + " \n" + "Message: " + message + "\n" + newsletter;

	alert(output);



}

// USING JQUERY TO CLOSE ELEMENTS


$(document).ready(function(e){

				// Hiding the division when the page is loaded
				$("#aboutCountryCardDiv").slideToggle("fast");
				$("#whatToDoDiv").slideToggle("fast");
				$("#howToGetThereDiv").slideToggle("fast");

				// displaying the div when the button is clicked
				$("#btnAboutCountryDiv").click(function(e){
					$("#aboutCountryCardDiv").slideToggle("slow");
				});

				// displaying the div when the button is clicked
				$("#btnWhatToDoDiv").click(function(e){
					$("#whatToDoDiv").slideToggle("slow");
				});

				// displaying the div when the button is clicked
				$("#btnHowToGetThereDiv").click(function(e){
					$("#howToGetThereDiv").slideToggle("slow");
				});


				// btnWhatToDoDiv

				// create a function that hide the div, but can't be like this
				// $("#btnAboutCountryDiv").click(function(e){
				// 	$("#aboutCountryCardDiv").hide("slow");
				// });

				$("#btnShow").click(function(e){
					$("#firstSection").show("slow");
					$("#secondSection").slideToggle("slow");
				});

			});


// USING SCROLL JQUERY TO FIX THE POSITION WHEN CLICK THE ELEMENT
// DUE TO THE OFFSET DUE TO THE HEADER


// This script is used by the Go To About button
$(function() {
  var topoffset = 110; //variable for menu height

  //Use smooth scrolling when clicking on navigation
  $('#btnGoToAbout').click(function() {
    if (location.pathname.replace(/^\//,'') === 
      this.pathname.replace(/^\//,'') && 
      location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top-topoffset
        }, 500);
        return false;
      } //target.length
    } //click function
  }); //smooth scrolling

});

// This script is used by the What to Do button
$(function() {
  var topoffset = 110; //variable for menu height

  //Use smooth scrolling when clicking on navigation
  $('#btnGoToWhatToDo').click(function() {
    if (location.pathname.replace(/^\//,'') === 
      this.pathname.replace(/^\//,'') && 
      location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top-topoffset
        }, 500);
        return false;
      } //target.length
    } //click function
  }); //smooth scrolling

});


// This script is used by the How to get there button
$(function() {
  var topoffset = 110; //variable for menu height

  //Use smooth scrolling when clicking on navigation
  $('#btnHowToGetThere').click(function() {
    if (location.pathname.replace(/^\//,'') === 
      this.pathname.replace(/^\//,'') && 
      location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top-topoffset
        }, 500);
        return false;
      } //target.length
    } //click function
  }); //smooth scrolling

});


// Starting the script to use the tooltip
$(function() {

	// starting the tooltip
	$('[data-toggle="tooltip"]').tooltip();
		
	// starting popover
	$('[data-toggle="popover"]').popover();

});