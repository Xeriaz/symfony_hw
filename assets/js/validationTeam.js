const axios = require('axios');

let teamTitle = document.getElementById('team');
let validationResult = document.getElementById('teamValidation-result');
const validateTeam = function () {
    validationResult.innerText = '...';
    axios.post(validationResult.dataset.path, {input: teamTitle.value})
        .then(function(response) {
            if (response.data.valid) {
                validationResult.innerText = ":)";
            } else {
                validationResult.innerText = ":(";
            }
        })
        .catch(function (error) {
            validationResult.innerText = error;
        });
};

teamTitle.onkeyup = validateTeam;
teamTitle.onchange = validateTeam;