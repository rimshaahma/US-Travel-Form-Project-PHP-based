// wait for the  DOM to fully load
document.addEventListener("DOMContentLoaded",function()

{
    // get the form elemt and the submit button
    const form=document.querySelector("form");
    const submitButton = document.querySelector(".btn.submit");

    // add an event listener for the form submission
    form.addEventListener("submit",function(event){
        // prevent the default form submission 
        event.preventDefault();
        // clear any previous error messages
        clearErrors();
        // validate the form inputs
        const isValid =validateForm();
        // if the form is valid,submit it
        if(isValid){
            form.submit();
        //    proceed to submit  the  form to the server 

        }
    });
    // function to validate  the form
    function validateForm(){
        let isValid=true;
        // get all the input field and textarea
        const name=document.getElementById("name");
        const age=document .getElementById("age");
        const gender=document.getElementById('gender');
        const email=document.getElementById("email");
        const phone = document.getElementById("phone");
        const other = document.getElementById("desc");

        // validate name fields
        if(name.ariaValueMax.trim()=="")
        {
            isValid=false;
            showError(name,"Name is required.");
        }
        // validate age  fields
        if(age.ariaValueMax.trim()===|| isNaN(age.value)){
            isValid=false;
            showError(age,"Please enter a valid age");
        }
        // validate gender  fields
        if(gender.value.trim()===""){
            isValid=false;
            showError(gender,"Gender is required.");
        }
        // validate  email field
        if(email.value.trim()===""){
            isValid=false;
            showError(email,"Please  enter  a valid email");
        }
        // validate  phone field
if(phone.value.trim()===""){
    isValid=false;
    showError(phone,"phone number is required");
}
// Validate other field (textarea)
if (other.value.trim() === "") {
    isValid = false;
    showError(other, "Additional information is required.");
}
return isValid;
    }
   // Function to validate email format
   function validateEmail(email) {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return regex.test(email);
}
// function to show error message next to the input field
function showError(input,message){
    const errorDiv=document.createElement("div");
    errorDiv.classList.add("error-message");
    errorDiv.textContent=message;
    input.classList.add("error");
    input.parentElemnt.appendChild(errorDiv);
}
// function to clear previous error messages
function clearErrors(){
    const errorMessages=document.querySelectorAll(".error-message")
    errorMessages.forEach(message=>message.remove());

    const errorFields=document.querySelectorAll(".error");
    errorFields.forEach(field=>field.classList.remove("error"));
}
});