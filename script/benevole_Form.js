function validateform1(event) {
  event.preventDefault()
  const name = document.getElementById("name").value;
  if (name.length < 4 || name.length > 30) {
    alert("Votre nom doit contenir entre 4 et 30 caractères");
    return false;
  }

  const firstName = document.getElementById("firstName").value;
  if (firstName.length < 4 || firstName.length > 30) {
    alert("Votre prénom doit contenir entre 4 et 30 caractères");
    return false;
  }

  const age = document.getElementById("age").value;
  if (age < 18 || age > 45) {
    alert("Vous devez avoir entre 18 et 45 ans");
    return false;
  }

  const gender = document.getElementById("sexe").value;
  if (gender === "") {
    alert("Vous devez choisir un genre");
    return false;
  }
  

  // Masquer la form 1 et afficher la form 2
  document.getElementById("form1").style.display = "none";
  document.getElementById("form2").style.display = "block";
}

function validateform2(event) {
  event.preventDefault()
  var checkboxes = document.getElementsByName("dispo-horaire[]");
  var checked = false;
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      checked = true;
      break;
    }
  }
  if (!checked) {
    alert("Veuillez sélectionner au moins une préférence d'horaire!");
    return false;
  }

  var checkboxes2 = document.getElementsByName("dispo[]");
  var checked2 = false;
  for (var i = 0; i < checkboxes2.length; i++) {
    if (checkboxes2[i].checked) {
      checked2 = true;
      break;
    }
  }
  if (!checked2) {
    alert("Veuillez sélectionner au moins une disponibilité!");
    return false;
  }

  // Masquer la form 2 et afficher la form 3
  document.getElementById("form2").style.display = "none";
  document.getElementById("form3").style.display = "block";
}

function validateform3(event){
  event.preventDefault();
  const express = document.getElementById("message").value;
  if ( express.length < 30 || express.length > 500){
    alert("Votre message doit être compris entre 30 et 500 caractères");
    return false; 
  }  
}

function previousform() {
  if (document.getElementById("form3").style.display === "block") {
    // Si l'utilisateur est à la form 3, revenez à la form 2
    document.getElementById("form3").style.display = "none";
    document.getElementById("form2").style.display = "block";
  } else if (document.getElementById("form2").style.display === "block") {
    // Si l'utilisateur est à la form 2, revenez à la form 1
    document.getElementById("form2").style.display = "none";
    document.getElementById("form1").style.display = "block";
  }

  
}
