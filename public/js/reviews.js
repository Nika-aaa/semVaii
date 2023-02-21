let feedback = document.getElementById("formFeedback");


function getDate() {
    let today = new Date();
    let year = today.getFullYear();
    let month = today.getMonth() + 1;
    let day = today.getDate();

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
    console.log("pred prevent");

    $('#add-review-form').on('submit', function(e) {
        e.preventDefault();
            if (validateForm()) {
                console.log(this)
                console.log("za prevent");
                fetch('?c=reviews&a=addReview', {
                    method: 'POST',
                    body: new FormData(this)
                })

                    .then(response => response.json())
                    .then(data => {
                        console.log(data);

                        let translatorName = data['name'];
                        let percentageNum = data['percentage'];


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

                        let date = document.createElement("p");
                        date.classList.add("card-text", "border-bottom", "text-center");
                        date.innerText = getDate();


                        let blockquote = document.createElement("blockquote");
                        blockquote.classList.add("blockquote", "text-center", "border-bottom");

                        let h4 = document.createElement("h4");
                        h4.innerText = document.getElementById("reviewTitle").value;

                        let footer = document.createElement("footer");
                        footer.classList.add("blockquote-footer");
                        footer.innerText = "You";

                        blockquote.appendChild(h4);
                        blockquote.appendChild(footer);

                        let text = document.createElement("p");
                        text.classList.add("card-text");
                        text.innerHTML = document.getElementById("reviewText").value;


                        let percentage = document.createElement("p");
                        percentage.classList.add("card-text");
                        percentage.innerHTML ="How satisfied the customer was: " + percentageNum;


                        let translator = document.createElement("p");
                        translator.classList.add("card-text");
                        translator.innerHTML = "Who was their translator: "+translatorName;

                        // cardBody.appendChild(title);
                        cardBody.appendChild(date);
                        cardBody.appendChild(blockquote);
                        cardBody.appendChild(text);
                        cardBody.appendChild(percentage);
                        cardBody.appendChild(translator);



                        newCard.appendChild(cardBody);
                        cardsDiv.appendChild(newCard);

                        feedback.classList.add("success");
                        feedback.classList.remove("fail");
                        feedback.innerText = "Review successfully submitted"

                        document.getElementById("reviewTitle").value = "";
                        document.getElementById("reviewText").value = "";

                    })
                    .catch(error => {
                        console.log(error);
                        feedback.classList.add("fail");
                        feedback.classList.remove("success");
                        feedback.innerText = "Review could not be submitted"
                    });
            }


    });
});


function validateForm() {
    const title = document.getElementById("reviewTitle").value;
    const text = document.getElementById("reviewText").value;

    feedback.classList.add("fail");

    if (title.length < 5 || title.length > 100) {
        feedback.innerText = "Title must be between 5 and 100 characters";
        return false;
    }

    if (text.length < 20 || text.length > 500) {
        feedback.innerText = "Text must be between 20 and 500 characters";
        return false;
    }

    if (!title || !text) {
        feedback.innerText ="All fields are required";
        return false;
    }

    feedback.classList.remove("fail");
    feedback.classList.add("success");
    return true;
}
