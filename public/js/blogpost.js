

let feedback = document.getElementById('formFeedback');
let title = document.getElementById("createBlogTitle");
let text = document.getElementById("createBlogText");

async function create(event) {
    event.preventDefault();

    feedback.classList.remove('success');
    feedback.classList.remove('fail');

    if (validatePost()) {
        let response = await fetch("?c=blog&a=store", {
            method: 'POST',
            headers: {
                'Content-Type': "application/json",
            },
            body: JSON.stringify({
                title: title.value,
                text: text.value,
            })
        });

        if (response.ok) {
            // Request was successful
            title.value = "";
            text.value = "";
            feedback.classList.add('success');
            feedback.innerHTML = "Blogpost created successfully. " +
                "You may write another one or go back to all <a href='?c=blog'>blogposts</a>."
        }
    }

    return false;
}


function validatePost() {
    let message;
    let maxLength;
    let minLength;

    if (title.value === "") {
        message = "Blogpost must have a title";
    } else if (title.value.length > 150) {
        message = "Too long blogpost title";
        maxLength = 150;
    } else if (title.value.length <15) {
        message = "Too short blogpost title";
        minLength = 15;
    } else if (text.value === "") {
        message = "Blogpost must have a text";
    } else if (text.value.length > 5000) {
        message = "The text is too long";
        maxLength = 5000;
    } else if (text.value.length < 500) {
        message = "The text is too short";
        minLength = 500;
    }

    if (message !== "") {
        feedback.classList.add('fail');
        feedback.innerText = message;

        if (maxLength != null) {
            feedback.innerText += ` (max ${maxLength} characters)`;
        }
        if (minLength != null) {
            feedback.innerText += ` (min ${minLength} characters)`;
        }
        return false;
    }


    return true;
}


