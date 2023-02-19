

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


let translatorName;
let translatorEmail;
let translatorTelephone;
let isTranslator = false;
let translatorId;


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


                displayServices();
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




async function displayServices() {
    console.log("displayServices start");
    await fetch(`?c=translators&a=getServices&id=${translatorId}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log('displayServices data');

            let ul = document.getElementById("displayServices");

            //list offered services and the option to delete the service
            console.log(data.length);
            for (let i = 0; i < data.length; i++) {
                let serviceId = data[i]['id'];
                const listItem = document.createElement('li');
                listItem.innerText = data[i]['service'];
                ul.appendChild(listItem);

                const button = document.createElement("button");
                button.innerText = "Remove";
                button.addEventListener("click", function() {
                    deleteService(serviceId, listItem); // call the deleteService function with the service ID
                });
                listItem.appendChild(button);
            }

            document.getElementById("loadingServices").classList.add("hidden")
            //add service


            console.log("after if displayServices");

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

//when submit button is pressed on the becomeTranslator form
//need id? or translator?
$(function() {
    // Handle form submission
    console.log("pred prevent");

    $('#formBecomeTranslator').on('submit', function(e) {
        e.preventDefault();

        console.log("za prevent");
        console.log(this);
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
    });
});


//TODO update translator info
$(function() {
    // Handle editing
    console.log("pred prevent form become");

    $('#editInformation').on('submit', function(e) {
        e.preventDefault();

        console.log("za prevent form become");
        console.log(this);
        // Send an AJAX request to the controller
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
    });
});

 function refreshElementVisibility() {
    console.log(this)
    console.log("visibility")
     fetch('?c=translators&a=isUserTranslator', {
        method: 'POST',
        body: {}
    })

        .then(response => response.json())
        .then(data => {
            //translator created
            console.log("got data");
            console.log(data);
            // console.log(data[0]);
            isTranslator = data['translator'];
            if (isTranslator) {
                //is transaltor - hode become a transaltor, show and fill editInformation
                document.getElementById("displayBecomeTranslator").classList.add("hidden");

                document.getElementById("nameEdit").innerText = data['translator']['name'];
                document.getElementById("emailEdit").innerText = data['translator']['email'];
                document.getElementById("telephoneEdit").innerText = data['translator']['telephone'];
            }
        })
         .catch(error => {
             console.log(error);
         });
}

//TODO edit languages and levels!!!!!