let languages, services;

async function getLanguages() {
    let response = await fetch('?c=translators&a=getUniqueUsedLanguages');
    languages = await response.json();
    // console.log(languages);
}

async function getServices() {
    let response = await fetch('?c=translators&a=getUniqueUsedServices');
    services = await response.json();
    // console.log(services);
}

async function createList() {
    await getLanguages();
    await getServices();
    let ulLanguages = document.getElementById("assignedLanguages");
    let ulServices = document.getElementById("assignedServices");

    for (const languagesKey in languages) {
        let newLi = document.createElement("li");
        newLi.innerText = languages[languagesKey];
        newLi.style.opacity = "0"; // set initial opacity to 0
        newLi.classList.add("styleSquare");

        ulLanguages.appendChild(newLi);

        setTimeout(() => {
            newLi.style.transition = "opacity 1s"; // set transition property
            newLi.style.opacity = "1"; // set opacity to 1
        }, languagesKey * 200);
    }

    for (const servicesKey in services) {
        let newLi = document.createElement("li");
        newLi.innerText = services[servicesKey];
        newLi.style.opacity = "0"; // set initial opacity to 0
        newLi.classList.add("styleSquare");
        newLi.classList.add("leftLi");
        ulServices.appendChild(newLi);

        setTimeout(() => {
            newLi.style.transition = "opacity 1s"; // set transition property
            newLi.style.opacity = "1"; // set opacity to 1
        }, servicesKey * 200);
    }
}


function fadeIn(element, duration) {
    let op = 0.1;  // initial opacity
    let interval = setInterval(function () {
        if (op >= 1){
            clearInterval(interval);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, duration / 50);
}

createList();