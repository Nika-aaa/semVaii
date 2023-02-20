


<div class="container">
    <div class="row">
        <div class="col-10 col-xs-10 col-sm-12 col-md-10  mx-auto">            <form id="formCreateBlogpost" onsubmit="return create(event)">
                <div class="form-group">
                    <label for="createBlogTitle" class="bold">Title</label>
                    <textarea type="textarea" class="form-control" rows="1" id="createBlogTitle" name="createBlogTitle" placeholder="Write a title for your blog post"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="createBlogText" class="bold">Text</label>
                    <textarea type="textarea" class="form-control" rows="10" id="createBlogText" name="createBlogText" placeholder="Write a blog post content"></textarea>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div">
                    <p id="formFeedback" class="text-center"></p>
                </div>
            </form>
        </div>
</div>



<script src="public/js/blogpost.js"></script>

