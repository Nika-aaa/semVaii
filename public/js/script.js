//
//     // Array of words
//     var words = ['FIND', 'HIRE', 'BOOK'];
//     // Function that executes every 2000 milliseconds
//     var t = setInterval(function() {
//     // Random number generator
//     var randomNumber = Math.round( Math.random() * (words.length-1) );
//     // Change the word in the span for a random one in the array of words
//     $('#changingSpan').html( words[ randomNumber ] );
// }, 2000);


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



$(document).ready(function () {
    function load_data() {
        $.ajax({
            url: "",
            method: "POST",
            data: {page:page},
            dataType:"JSON",
            success:function (data){

            }
        })
    }
})



