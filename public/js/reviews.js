let feedback = document.getElementById("formFeedback");


function getDate() {
    let today = new Date();
    let year = today.getFullYear();
    let month = today.getMonth() + 1;
    let day = today.getDate();

// Add leading zero to single digit month and day values
    if (month < 10) {
        month = '0' + month;
    }
    if (day < 10) {
        day = '0' + day;
    }

    let formattedDate = `${year}-${month}-${day}`;
    return formattedDate;
}



$(function() {
    // Handle form submission
    console.log("pred prevent");

    $('#add-review-form').on('submit', function(e) {
        e.preventDefault();

        console.log(this)
        console.log("za prevent");
        // Send an AJAX request to the controller
         fetch('?c=reviews&a=addReview', {
            method: 'POST',
            body: new FormData(this)
         })

            .then(response => response.json())
            .then(data => {
                console.log(data);

                feedback.innerText = "Review submitted"
                // let cards = document.getElementById("cards").innerText;
                // let title = document.getElementById("reviewTitle").innerText;
                // let text = document.getElementById("reviewText").innerText;
                // let percentage = document.getElementById("percentage").innerText;
                // let translator = document.getElementById("translatorName").nodeValue;


                let cardsDiv = document.getElementById("cards");

                let newCard = document.createElement("div");
                newCard.classList.add("card", "my-3");

                let cardBody = document.createElement("div");
                cardBody.classList.add("card-body");

                let title = document.createElement("h5");
                title.classList.add("card-title", "text-center");
                title.innerHTML = document.getElementById("reviewTitle").value;

                let text = document.createElement("p");
                text.classList.add("card-text");
                text.innerHTML = document.getElementById("reviewText").value;

                let date = document.createElement("p");
                text.classList.add("card-text");
                date.innerText = getDate();

                let author = document.createElement("p");
                text.classList.add("card-text");
                date.innerText = "You";


                let percentage = document.createElement("p");
                percentage.classList.add("card-text");
                percentage.innerHTML = document.getElementById("percentage").value;

                let translator = document.createElement("p");
                translator.classList.add("card-text");
                translator.innerHTML = document.getElementById("translatorName").value;

                cardBody.appendChild(title);
                cardBody.appendChild(text);
                cardBody.appendChild(date);
                cardBody.appendChild(author);
                cardBody.appendChild(percentage);
                cardBody.appendChild(translator);

                newCard.appendChild(cardBody);
                cardsDiv.appendChild(newCard);




                //
// // create new card element
//                 let card = document.createElement("div");
//                 card.classList.add("card", "my-3");
//
// // create card body element
//                 let cardBody = document.createElement("div");
//                 cardBody.classList.add("card-body");
//
// // create title element and add title text
//                 let titleEl = document.createElement("h5");
//                 titleEl.classList.add("card-title", "text-center");
//                 titleEl.textContent = title;
//
// // create text element and add text content
//                 let textEl = document.createElement("p");
//                 textEl.classList.add("card-text");
//                 textEl.textContent = text;
//
// // create percentage element and add percentage text
//                 let percentageEl = document.createElement("p");
//                 percentageEl.classList.add("card-text");
//                 percentageEl.textContent = percentage;
//
// // create translator element and add translator text
//                 let translatorEl = document.createElement("p");
//                 translatorEl.classList.add("card-text");
//                 translatorEl.textContent = translator;
//
// // add all elements to the card body
//                 cardBody.appendChild(titleEl);
//                 cardBody.appendChild(textEl);
//                 cardBody.appendChild(percentageEl);
//                 cardBody.appendChild(translatorEl);
//
// // add card body to the card element
//                 card.appendChild(cardBody);
//
// // add card element to the cards div
// //                 let cards = document.getElementById("cards");
//                 cards.appendChild(card);

                //
                // let card = document.createElement("div");
                // card.classList.add("card", "my-3");
                //
                // let cardBody = document.createElement("div");
                // cardBody.classList.add("card-body");
                //
                // let cardTitle = document.createElement("h5");
                // cardTitle.classList.add("card-title", "text-center");
                // cardTitle.textContent = title;
                //
                // let cardText = document.createElement("p");
                // cardText.classList.add("card-text");
                // cardText.textContent = text;
                //
                // let cardPercentage = document.createElement("p");
                // cardPercentage.classList.add("card-text");
                // cardPercentage.textContent = percentage;
                //
                // let cardTranslator = document.createElement("p");
                // cardTranslator.classList.add("card-text");
                // cardTranslator.textContent = translator;
                //
                // cardBody.appendChild(cardTitle);
                // cardBody.appendChild(cardText);
                // cardBody.appendChild(cardPercentage);
                // cardBody.appendChild(cardTranslator);
                //
                // card.appendChild(cardBody);
                // cards.appendChild(card);



            })
            .catch(error => {
                console.log(error);
                feedback.innerText = "Review could not be submitted"
            });
    });
});


function validate() {
    let title = document.getElementById('reviewTitle');
    let text = document.getElementById('reviewText');
    let percentage = document.getElementById('percentage');
    let translatorName = document.getElementById('translatorName');

    if (title.value.text === "" || text.value.text === "" || percentage.value.text === "", translatorName.value.text === "") {
        feedback.innerText = "Fill out all fields";
        return false;
    } else if (title.value.length < 5 || title.value.length >100) {
        feedback.innerText = "Title should be 5-100 characters long";
        return false;
    } else if (text.value.length < 20 || text.value.length >500) {
        feedback.innerText = "Text should be 20-500 characters long";
        return false;
    } else if (translatorName.value.length < 2 || translatorName.value.length >100) {
        feedback.innerText = "Titlw should be 5-100 characters long";
        return false;
    }



}