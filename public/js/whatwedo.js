let languages, services;

async function getLanguages() {
    let response = await fetch('?c=translators&a=getUniqueUsedLanguages');
    languages = await response.json();
    console.log(languages);
}

async function getServices() {
    let response = await fetch('?c=translators&a=getUniqueUsedServices');
    services = await response.json();
    console.log(services);
}

async function createList() {
    await getLanguages();
    await getServices();
    let ulLanguages = document.getElementById("assignedLanguages");
    let ulServices = document.getElementById("assignedServices");


    for (const languagesKey in languages) {
        let newLi = document.createElement("li");
        newLi.innerText = languages[languagesKey];
        ulLanguages.appendChild(newLi);
        console.log(languages[languagesKey]);
    }

    for (const servicesKey in services) {
        let newLi = document.createElement("li");
        newLi.innerText = services[servicesKey];
        ulServices.appendChild(newLi);
        console.log(languages[servicesKey]);
    }
}

createList();




