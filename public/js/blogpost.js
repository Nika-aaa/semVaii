class BlogPost {
    constructor(title, text, feedback) {
        this.title = title;
        this.text = text;
        this.feedback = feedback;
    }

    async create() {
        this.feedback.classList.remove('success');
        this.feedback.classList.remove('fail');

        if (this.validate()) {
            let response = await fetch("?c=blog&a=store", {
                method: 'POST',
                headers: {
                    'Content-Type': "application/json",
                },
                body: JSON.stringify({
                    title: this.title.value,
                    text: this.text.value,
                })
            });

            if (response.ok) {
                // Request was successful
                this.title.value = "";
                this.text.value = "";
                this.feedback.classList.add('success');
                this.feedback.innerHTML = "Blogpost created successfully. " +
                    "You may write another one or go back to all <a href='?c=blog'>blogposts</a>."
            }
        }

        return false;
    }

    // validateEdit() {
    //
    //     let titleEdit = document.getElementById("createBlogTitle");
    //     let textEdit = document.getElementById("createBlogText");
    // }

    validate() {
        let message="";
        let maxLength;
        let minLength;

        console.log(this.title.value)
        console.log(this.text.value)

        if (this.title.value === "") {
            message = "Blogpost must have a title";
        } else if (this.title.value.length > 150) {
            message = "Too long blogpost title";
            maxLength = 150;
        } else if (this.title.value.length <15) {
            message = "Too short blogpost title";
            minLength = 15;
        } else if (this.text.value === "") {
            message = "Blogpost must have a text";
        } else if (this.text.value.length > 5000) {
            message = "The text is too long";
            maxLength = 5000;
        } else if (this.text.value.length < 5) {
            message = "The text is too short";
            minLength = 500;
        }

        console.log(message)

        if (message != "") {
            console.log("message is not empty")
            this.feedback.classList.add('fail');
            this.feedback.innerText = message;

            if (maxLength != null) {
                this.feedback.innerText += ` (max ${maxLength} characters)`;
            }
            if (minLength != null) {
                this.feedback.innerText += ` (min ${minLength} characters)`;
            }
            return false;
        }

        return true;
    }
}

let feedback = document.getElementById('formFeedback');
let title = document.getElementById("createBlogTitle");
let text = document.getElementById("createBlogText");

let blogPost = new BlogPost(title, text, feedback);


function create(event) {
    event.preventDefault();
    blogPost.create();
    return false;
}
