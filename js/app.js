function validateform() {
    // Storing Field Values In Variables
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var dob = document.getElementById("dob").value;
    var tel1 = document.getElementById("tel").value;
    var tel2 = document.getElementById("tel1").value;
    var time = document.getElementById("time").value;
    // Regular Expression For Email
    var name = /^[a-zA-Z'- ]$/;
    var tel=/^[0-9(10)]$/;
    // Conditions
    if (fname != '' && tel1!= ''&&tel2!= ''&& time != '' && lname != '' && dob != '') {
    if (fname.match(name) && lname.match(name)) {
  
    if (tel1.match(tel) && tel2.match(tel) ) {
    return true;
    } else {
    alert("No letters");
    return false;
    }
    } 
     else {
    alert("No numbers");
    return false;
    }
}else{
    alert("check ");
}
    }