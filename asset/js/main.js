

document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    hideLoadingOverlay();
  }, 2000);
});

function hideLoadingOverlay() {
  var loadingOverlay = document.getElementById("loading-overlay");
  var content = document.getElementById("content");

  loadingOverlay.style.display = "none";
  content.style.display = "block";
}


function formBrief() {
  var formBrief = document.querySelector(".brief-add");
  var formCompetence = document.querySelector(".competence-add");
  var step1 = document.querySelector(".step1");
  var step2 = document.querySelector(".step2");
  formBrief.classList.add("d-none");
  formCompetence.classList.remove("d-none");
  step1.classList.remove("actives");
  step1.classList.add("completed");
  step2.classList.add("actives");
}

function formCompetenceprevious() {
  var formBrief = document.querySelector(".brief-add");
  var formCompetence = document.querySelector(".competence-add");
  var inputPrevious = document.getElementById('date_fin');
  var step1 = document.querySelector(".step1");
  var step2 = document.querySelector(".step2");
  formCompetence.classList.add("d-none");
  formBrief.classList.remove("d-none");
  step1.classList.remove("completed");
  step1.classList.add("actives");
  step2.classList.remove("actives");
  inputPrevious.focus();
}

function formCompetence() {
  var formCompetence = document.querySelector(".competence-add");
  var formNiveau = document.querySelector(".niveau-add");

  var inputListWeb = document.getElementById('web-list');
  var inputListMobile = document.getElementById('mobile-list');

  var affecterNiveau = document.getElementById('niveauAffecter');

  var step2 = document.querySelector(".step2");
  var step3 = document.querySelector(".step3");
  
  formCompetence.classList.add("d-none");
  formNiveau.classList.remove("d-none");
  step2.classList.remove("actives");
  step2.classList.add("completed");
  step3.classList.add("actives");

  var webValues = Array.from(inputListWeb.selectedOptions).map(option => option.value);
  var mobileValues = Array.from(inputListMobile.selectedOptions).map(option => option.value);webValues
  var i = 0;
  affecterNiveau.innerHTML = '';

  if (webValues.length > 0) {
    webValues.forEach(function(value) {
      if (!affecterNiveau.innerHTML.includes(value)) {
        var content = '<div class="form-group comp">' +
          '<label for="web-list">' + value + '<span class="oblig"> *</span></label>' +
          '<select name="niveau' + (i++) +'" class="form-control" required>' +
          '<option>Imiter</option>' +
          '<option>Adapter</option>' +
          '<option>Transversales</option>' +
          '</select>' +
          '</div>';
  
        affecterNiveau.innerHTML += content;
      }
    });
  } else if (mobileValues.length > 0) {
    mobileValues.forEach(function(value) {
      if (!affecterNiveau.innerHTML.includes(value)) {
        var content = '<div class="form-group comp">' +
          '<label for="mobile-list">' + value + '<span class="oblig"> *</span></label>' +
          '<select name="niveau' + (i++) +'" class="form-control" required>' +
          '<option>Imiter</option>' +
          '<option>Adapter</option>' +
          '<option>Transversales</option>' +
          '</select>' +
          '</div>';
  
        affecterNiveau.innerHTML += content;
      }
    });
  }
 
}


function formNiveaueprevious() {
  var formCompetence = document.querySelector(".competence-add");
  var formniveau = document.querySelector(".niveau-add");
  var step2 = document.querySelector(".step2");
  var step3 = document.querySelector(".step3");
  formniveau.classList.add("d-none");
  formCompetence.classList.remove("d-none");
  step2.classList.remove("completed");
  step2.classList.add("actives");
  step3.classList.remove("actives");
}

function formNiveau() {
  var formNiveau = document.querySelector(".niveau-add");
  var formGroup = document.querySelector(".group-add");
  var step3 = document.querySelector(".step3");
  var step4 = document.querySelector(".step4");
  formNiveau.classList.add("d-none");
  formGroup.classList.remove("d-none");
  step3.classList.remove("actives");
  step3.classList.add("completed");
  step4.classList.add("actives");
}

function formGroupprevious() {
  var formNiveau = document.querySelector(".niveau-add");
  var formGroup = document.querySelector(".group-add");
  var step3 = document.querySelector(".step3");
  var step4 = document.querySelector(".step4");
  formGroup.classList.add("d-none");
  formNiveau.classList.remove("d-none");
  step3.classList.remove("completed");
  step3.classList.add("actives");
  step4.classList.remove("actives");
}

function formGroup() {
  var formValidation = document.querySelector(".validation-add");
  var formGroup = document.querySelector(".group-add");
  var step4 = document.querySelector(".step4");
  var step5 = document.querySelector(".step5");
  formGroup.classList.add("d-none");
  formValidation.classList.remove("d-none");
  step4.classList.add("completed");
  step4.classList.remove("actives");
  step5.classList.add("actives");
}

function formValidationrevious() {
  var formValidation = document.querySelector(".validation-add");
  var formGroup = document.querySelector(".group-add");
  var step4 = document.querySelector(".step4");
  var step5 = document.querySelector(".step5");
  formValidation.classList.add("d-none");
  formGroup.classList.remove("d-none");
  step4.classList.remove("completed");
  step4.classList.add("actives");
  step5.classList.remove("actives");
}


function toggleSelect(type) {
    const webListContainer = document.getElementById('web-list-container');
    const mobileListContainer = document.getElementById('mobile-list-container');

    if (type === 'web') {
        webListContainer.classList.remove('d-none');
        mobileListContainer.classList.add('d-none');
    } else if (type === 'mobile') {
        mobileListContainer.classList.remove('d-none');
        webListContainer.classList.add('d-none');
    }
}


function calculerGroup() {
  var NombreApprenant = document.getElementById('apprenant').value;
  var NombreGroup = document.getElementById('group').value;
  var affecterGroup = document.getElementById('groupAffecter');

  var apprenantValidAllModule = ['ihsan fraihi', 'imane slimani', 'yacin amro'];
  var apprenantValidMeduim = ['anas seroukh', 'issrae ben ali'];
  var apprenantInvalidMore = ['ahmed alami', 'amine sdiki', 'karim souihli'];

  var allApprenants = apprenantValidAllModule.concat(apprenantValidMeduim, apprenantInvalidMore);

  var randomGroup = affecterRandom(allApprenants);

  var apprenantPerGroup = Math.floor(NombreApprenant / NombreGroup);
  var restApprenant = NombreApprenant % NombreGroup;

  affecterGroup.innerHTML = '';

  var index = 0;
  for (var i = 0; i < NombreGroup; i++) {
      var currentMembres = apprenantPerGroup + (restApprenant > 0 ? 1 : 0);
      restApprenant--;

      var groupMembers = randomGroup.slice(index, index + currentMembres);
      index += currentMembres;

      var groupHTML = '<div class="form-group comp">' +
          '<label for="group-list">Groupe ' + (i + 1) + '<span class="oblig"> *</span></label>' +
          '<select name="group' + (i + 1) + '[]" class="form-control apprenants" required multiple="multiple">' +
          '<option selected>' + groupMembers.join('</option><option selected>') + '</option>' +
          '</select>' +
          '</div>';

      affecterGroup.innerHTML += groupHTML;
  }

  $('.apprenants').select2({
      tags: true,
      tokenSeparators: [',', ' '],
      multiple: true
  });
}

function affecterRandom(array) {
  for (var i = array.length - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var temp = array[i];
      array[i] = array[j];
      array[j] = temp;
  }
  return array;
}


function toggleSelectAffectation(type) {
  const pergroup = document.querySelector('.groupCalculer');
  var affecterGroup = document.getElementById('groupAffecter');

  if (type === 'group') {
    pergroup.classList.remove('d-none');
  }else{
    pergroup.classList.add('d-none');
    affecterGroup.innerHTML = "";
  }
}
document.addEventListener("DOMContentLoaded", function() {
  let seconds = 7 * 24 * 60 * 60;

  function updateCounter() {
    const days = Math.floor(seconds / (3600 * 24));
    const hours = Math.floor((seconds % (3600 * 24)) / 3600);
    const minutes = Math.floor((seconds % 3600) / 60);
    const restTime = seconds % 60;

    document.getElementById('days').innerText = days;
    document.getElementById('hours').innerText = ('0' + hours).slice(-2);
    document.getElementById('mins').innerText = ('0' + minutes).slice(-2);
    document.getElementById('seconds').innerText = ('0' + restTime).slice(-2);

    if (seconds > 0) {
      seconds--;
      setTimeout(updateCounter, 1000);
    }
  }

  updateCounter();
});


AOS.init();



