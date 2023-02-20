
let triviaQuestion = document.getElementById("triviaQuestion")
let triviaAnswer = document.getElementById("triviaAnswer")
let answer = "";

const getTrivia = async () => {
    try {
        const result = await fetch("https://api.api-ninjas.com/v1/trivia?category=language", {
            headers: {'X-Api-Key': 'okXEfCoupiIynwMoigTnGA==GzfYSMdNvBATLZk6'}
        });
        const data = await result.json();
        triviaAnswer.innerText = "Reveal answer"
        console.log(data);
        triviaQuestion.innerText = data[0].question;
        answer = data[0].answer;

    } catch (e) {
        console.log(e)
    }
}

getTrivia();

triviaAnswer.addEventListener("mouseover", function () {
    triviaAnswer.innerText = answer;
})


setInterval(getTrivia, 60000);






