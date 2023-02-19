

function getTranslatorServices(id) {
    fetch(`?c=translators&a=getTranslatorServices&id=${id}`)
        .then(response => response.json())
        .then(services => {
            const serviceList = document.querySelector(`#translatorService-${id}`);
            serviceList.innerHTML = '';
            services.forEach(service => {
                const listItem = document.createElement('li');
                listItem.innerText = service;
                serviceList.appendChild(listItem);

            });

        })
        .catch(error => console.error(error));
}

function getTranslatorLanguages(id) {
    fetch(`?c=translators&a=getTranslatorLanguages&id=${id}`)
        .then(response => response.json())
        .then(languages => {
            // console.log(languages[0][0][0]);
            const languageList = document.querySelector(`#translatorLanguage-${id}`);
            languageList.innerHTML = '';
            languages.forEach(language => {
                const listItem = document.createElement('li');
                listItem.innerText = language[0][0] + " " + language[0][1];
                languageList.appendChild(listItem);
            });
        })
        .catch(error => console.error(error));
}



//--------------------------------------------------------------------------------

let becomeATranslator = document.getElementById("displayBecomeTranslator");
let editTransaltor = document.getElementById("displayEditTranslator");
let editLanguages = document.getElementById("displayEditLanguages");

let arrayList = [];


let translatorName;
let translatorEmail;
let translatorTelephone;
let isTranslator = false;
let translatorId;

let feedbackBecomeTranslator = document.getElementById("becomeTranslatorFeedback");

//find out if user is translator
//if yes, get their data
async function getTranslator () {
    console.log("geTranslator start");
    await fetch(`?c=user&a=getTranslator`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log('getTranslator data');
            if (data == false) {
                console.log("is not a translator, if false branch");
                //show the become a translator section
                editTransaltor.classList.add("hidden");
                becomeATranslator.classList.remove("hidden");
                editLanguages.classList.add("hidden");
            } else {
                console.log("not false, user is a translator");
                translatorEmail = data['email'];
                translatorTelephone = data['telephone'];
                translatorName = data['name'];
                translatorId = data['id'];
                isTranslator = true;

                editTransaltor.classList.remove("hidden");
                becomeATranslator.classList.add("hidden");
                editLanguages.classList.remove("hidden");


                document.getElementById("nameEdit").innerText = translatorName;
                document.getElementById("telephoneEdit").innerText = translatorTelephone;
                document.getElementById("emailEdit").innerText = translatorEmail;


                // displayServices();
                displayData(translatorId, '?c=translators&a=getServices&id=', 'displayServices');

                // displayLanguages();
                displayData(translatorId, '?c=translators&a=getlanguages&id=', 'displayLanguages');

            }
            console.log("ater if getTranslator");

        })
        .catch(error => console.error(error));
}

getTranslator();



async function assignTranslator() {
    console.log("assignTranslator start");
    await fetch(`?c=user&a=assignTranslatorToUser&id=${translatorId}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log('assignTranslator data');

            if (data == true) {
                console.log("successfully assigned translator to user")
            } else {
                console.log("assignment unsuccessful");
            }
            console.log("after if assign");

        })
        .catch(error => console.error(error));
}

// await assignTranslator();




async function displayData(id, url, elementId) {
    console.log(`displayData start for ${elementId}`);
    await fetch(`${url}${id}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log(`displayData ${elementId} data`);

            let ul = document.getElementById(elementId);
            ul.innerHTML = '';

            console.log(data.length);
            for (let i = 0; i < data.length; i++) {
                const listItem = document.createElement('li');
                let itemText = '';
                let itemId = null;
                if (elementId === 'displayServices') {
                    itemId = data[i]['id'];
                    itemText = data[i]['service'];
                } else if (elementId === 'displayLanguages') {
                    itemId = data[i][2];
                    itemText = `${data[i][0]} ${data[i][1]} ${data[i][2]}`;
                }
                listItem.innerText = itemText + "  ";
                ul.appendChild(listItem);

                const button = document.createElement("button");
                button.innerText = "Remove";
                button.classList.add("btn");
                button.classList.add("btn-outline-primary");
                button.classList.add("btn-sm");
                button.addEventListener("click", function() {
                    if (elementId === 'displayServices') {
                        deleteService(itemId, listItem);
                    } else if (elementId === 'displayLanguages') {
                        deleteLanguage(itemId, listItem);
                    }
                });
                listItem.appendChild(button);
            }

            document.getElementById(`loading${elementId.charAt(0).toUpperCase() + elementId.slice(1)}`).classList.add("hidden")

            console.log(`end displayData for ${elementId}`);
        })
        .catch(error => console.error(error));
}




// async function displayServices() {
//     console.log("displayServices start");
//     await fetch(`?c=translators&a=getServices&id=${translatorId}`)
//         .then(response => response.json())
//         .then(data => {
//             console.log(data);
//             console.log('displayServices data');
//
//             let ul = document.getElementById("displayServices");
//
//             //list offered services and the option to delete the service
//             console.log(data.length);
//             for (let i = 0; i < data.length; i++) {
//                 let serviceId = data[i]['id'];
//                 const listItem = document.createElement('li');
//                 listItem.innerText = data[i]['service'] + "  ";
//                 ul.appendChild(listItem);
//
//                 const button = document.createElement("button");
//                 button.innerText = "Remove";
//                 button.classList.add("btn");
//                 button.classList.add("btn-outline-primary");
//                 button.classList.add("btn-sm");
//                 button.addEventListener("click", function() {
//                     deleteService(serviceId, listItem); // call the deleteService function with the service ID
//                 });
//                 listItem.appendChild(button);
//             }
//
//             document.getElementById("loadingServices").classList.add("hidden")
//             //add service
//
//
//             console.log("after if displayServices");
//
//         })
//         .catch(error => console.error(error));
// }
//
// async function displayLanguages() {
//     console.log("displayLanguages start");
//     await fetch(`?c=translators&a=getlanguages&id=${translatorId}`)
//         .then(response => response.json())
//         .then(data => {
//             console.log(data);
//             console.log('displayLanguages data');
//
//
//             let ul = document.getElementById("displayLanguages");
//
//             //list offered services and the option to delete the service
//             console.log(data.length);
//             for (let i = 0; i < data.length; i++) {
//                 let language = data[i][0];
//                 let languageLevel = data[i][1];
//                 let rowId = data[i][2]; //pk, row id
//                 const listItem = document.createElement('li');
//                 listItem.innerText = language + " " + languageLevel + " " + rowId + " ";
//                 ul.appendChild(listItem);
//
//                 const button = document.createElement("button");
//                 button.innerText = "Remove";
//                 button.classList.add("btn");
//                 button.classList.add("btn-outline-primary");
//                 button.classList.add("btn-sm");
//                 button.addEventListener("click", function() {
//                     deleteLanguage(rowId, listItem); // call the deleteService function with the service ID
//                 });
//                 listItem.appendChild(button);
//             }
//
//             document.getElementById("loadingLanguages").classList.add("hidden")
//             //add service
//
//
//             console.log("end displayLanguages");
//
//         })
//         .catch(error => console.error(error));
// }


async function deleteLanguage(rowId, listItem) {
    // console.log("languageId "  + languageId);

    console.log("deleteLanguage start");
    console.log(rowId)
    console.log("row to delete id up");
    console.log(listItem)
    console.log(translatorId)
    // await fetch(`?c=translators&a=getServices&id=${translatorId}`)
    await fetch(`?c=TranslatorLanguages&a=deleteLanguage&idLang=${rowId}&idTran=${translatorId}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log('deleteLanguage data');

            if (data == true) {
                console.log("successfully deleted language")
                listItem.remove(); // remove the list item from the DOM

            } else {
                console.log("deletion unsuccessful");
            }
            console.log("after if deleteLanguage");


        })
        .catch(error => console.error(error));
}

async function addLanguage(event) {
    event.preventDefault();
    let language = document.getElementById("formLanguageSelector");
    let languageId = language.value;
    console.log("languageId "  + languageId);
    let level = document.getElementById("formLevelSelector");
    let levelId = level.value;
    let string = "optionLanguage-" + languageId;
    let languageName = document.getElementById(string).innerText;
    string = "optionLevel-" + levelId;
    let levelName = document.getElementById(string).innerText;

    console.log("addLanguage start");
    await fetch(`?c=TranslatorLanguages&a=addLanguage&idTran=${translatorId}&idLang=${languageId}&idLevel=${levelId}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log('addService data');

            if (data[0] == true) {
                //get row id
                let rowId = data[1];
                console.log("successfully added Language to user")
                let ul = document.getElementById("displayLanguages");

                const listItem = document.createElement('li');
                listItem.innerText = languageName + " " + levelName + " " + rowId + " ";
                ul.appendChild(listItem);

                const button = document.createElement("button");
                button.innerText = "Remove";
                button.classList.add("btn");
                button.classList.add("btn-outline-primary");
                button.classList.add("btn-sm");
                button.addEventListener("click", function() {
                    deleteLanguage(rowId, listItem); // call the deleteService function with the service ID
                });
                console.log("languageId "  + languageId);

                listItem.appendChild(button);

            } else {
                console.log("addition of language unsuccessful");
            }
            console.log("after if add language");

        })
        .catch(error => console.error(error));

}


async function addService(event) {
    event.preventDefault();
    let service = document.getElementById("formServiceSelector");
    let serviceId = service.value;
    let string = "option-" + serviceId;
    let serviceName = document.getElementById(string).innerText;

    console.log("addService start");
    await fetch(`?c=TranslatorServices&a=addService&idTran=${translatorId}&idServ=${serviceId}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log('addService data');

            if (data == true) {
                console.log("successfully added Service to user")
                let ul = document.getElementById("displayServices");

                const listItem = document.createElement('li');
                listItem.innerText = serviceName;
                ul.appendChild(listItem);

                const button = document.createElement("button");
                button.innerText = "Remove";
                button.classList.add("btn");
                button.classList.add("btn-outline-primary");
                button.classList.add("btn-sm");
                button.addEventListener("click", function() {
                    deleteService(serviceId, listItem); // call the deleteService function with the service ID
                });
                listItem.appendChild(button);

            } else {
                console.log("addition unsuccessful");
            }
            console.log("after if addService");

        })
        .catch(error => console.error(error));

}

async function deleteService(serviceId, listItem) {
    console.log("deleteServ start");
    console.log(serviceId)
    console.log(listItem)
    console.log(translatorId)
    // await fetch(`?c=translators&a=getServices&id=${translatorId}`)
    await fetch(`?c=translatorServices&a=deleteService&idServ=${serviceId}&idTran=${translatorId}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log('deleteServ data');

            if (data == true) {
                console.log("successfully deleted service")
                listItem.remove(); // remove the list item from the DOM

            } else {
                console.log("deletion unsuccessful");
            }
            console.log("after if delte");


        })
        .catch(error => console.error(error));
}

//first form listener
$(function() {
    // Handle form submission
    console.log("pred prevent");

    $('#formBecomeTranslator').on('submit', function(e) {
        e.preventDefault();

        console.log("za prevent");
        console.log(this);
        if (validateBecomeForm("becomeTranslatorFeedback")) {


            // Send an AJAX request to the controller
            fetch('?c=translators&a=registerTranslator', {
                method: 'POST',
                body: new FormData(this)
            })

                .then(response => response.json())
                .then(data => {
                    //translator created
                    console.log(data);
                    console.log("data from registerTranslator up");
                    console.log(data['id']);
                    translatorId = data['id'];

                    //asign transaltor!!
                    assignTranslator();

                    //refresh visibility
                    getTranslator();


                    //assign transaltor to user

                    // refreshElementVisibility();


                })

                .catch(error => {
                    console.log(error);
                });
        } else {
            // feedbackBecomeTranslator.innerText = "Can not register as a translator"

        }
    });
});

//second form listener
$(function() {
    // Handle editing
    console.log("pred prevent form become");

    $('#editInformation').on('submit', function(e) {
        e.preventDefault();

        console.log("za prevent form become");
        console.log(this);
        // Send an AJAX request to the controller


        if (validateBecomeForm("editTranslatorFeedback")) {
            fetch('?c=translators&a=editTranslator', {
                method: 'POST',
                body: new FormData(this)
            })

                .then(response => response.json())
                .then(data => {
                    //transaltor edited
                    console.log(data);
                    if (data == true) {
                        console.log("translator successfully edited");
                    } else {
                        console.log("translator could not be edited");
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    });
});


//VALIDATIONS
function validateBecomeForm(formFeedback) {
    let feedback = document.getElementById(formFeedback);
    let name = document.getElementById(formFeedback === 'editTranslatorFeedback' ? 'nameEdit' : 'name');
    let email = document.getElementById(formFeedback === 'editTranslatorFeedback' ? 'emailEdit' : 'email');
    let telephone = document.getElementById(formFeedback === 'editTranslatorFeedback' ? 'telephoneEdit' : 'telephone');

    console.log(feedback + " feedback")

    feedback.classList.add("fail");

    // Check if any field is empty
    if (name.value === "" || email.value === "" || telephone.value === "") {
        feedback.innerText = "All fields must be filled";
        return false;
    }

    // Check name only contains letters, spaces, and hyphens
    let nameRegex = /^[a-zA-Z\s-]+$/; // regex for letters, spaces, and hyphens
    if (!nameRegex.test(name.value)) {
        feedback.innerText = "Name can only contain letters, spaces, and hyphens";
        return false;
    }

    // Check name length is between 10 and 50 characters
    if (name.value.length < 5 || name.value.length > 50) {
        feedback.innerText = "Name must be between 5 and 50 characters";
        return false;
    }

    // Check telephone is a valid phone number
    let phoneRegex = /^\d{10}$/; // regex for 10-digit phone number
    if (!phoneRegex.test(telephone.value)) {
        feedback.innerText = "Invalid telephone number";
        return false;
    }

    // Check email is a valid email address
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // regex for email address
    if (!emailRegex.test(email.value)) {
        feedback.innerText = "Invalid email address";
        return false;
    }

    feedback.classList.remove("fail");
    feedback.classList.add("success");
    feedback.innerText = "Successfully sent data to the server";

    // All validation checks passed
    return true;
}



//TODO:
// somehow disable the option to choose a language or service that is already assigned
// create an array of assigned services/languages and then validate if the service/language could be assigned?
