


<container>
    <div class="row">
        <div class="col-10 col-xs-10 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <form id="formCreateBlogpost" onsubmit="return create(event)">
                <div class="form-group">
                    <label for="createBlogTitle">Title</label>
                    <textarea type="textarea" class="form-control" rows="1" id="createBlogTitle" name="createBlogTitle" placeholder="Write a title for your blog post"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="createBlogText">Text</label>
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
</container>



<script src="public/js/blogpost.js"></script>

