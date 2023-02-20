<?php

/** @var \App\Models\BlogPost[] $data */
/** @var \App\Core\IAuthenticator $auth */


$sortOrder = $_GET['sort'] ?? 'desc'; // Default to showing the newest posts first

?>

<div>
    <div class="container">
        <div class="row">
            <div class="col-10 col-xs-10 col-sm-12 col-md-10  mx-auto">


                    <?php foreach (array_reverse($data) as $post) { ?>
                    <div class="card my-3" >
                        <div class="card-body">
                            <p class="card-text text-center border-bottom"> <?php echo $post->getDate() ?></p>
                            <h4 class="card-title text-center border-bottom"><?php echo $post->getTitle() ?></h4>
                            <p class="card-text"> <?php echo $post->getText() ?> </p>

                            <?php if($auth->isLogged() && $auth->getLoggedUserName() == "nikaaa") { ?>
                                <div class="text-center">

                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#editModal_<?php echo $post->getId() ?>">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal_<?php echo $post->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title bold" id="exampleModalLongTitle">Edit blog post</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form id="formEditBlogpost" method="post" action="?c=blog&a=editBlogpost&id=<?php echo $post->getId()?>">
                                                        <div class="form-group">
                                                            <label for="editBlogTitle" class="bold">Title</label>
                                                            <textarea required maxlength="1000" minlength="100" type="textarea" class="form-control" rows="1" id="editBlogTitle" name="editBlogTitle"><?php echo $post->getTitle()?></textarea>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="editBlogText" class="bold">Text</label>
                                                            <textarea required maxlength="100" minlength="20" type="textarea" class="form-control" rows="10" id="editBlogText" name="editBlogText"><?php echo $post->getText()?></textarea>
                                                            <!--                                                        <textarea class="form-control" rows="15" id="textarea">-->
                                                        </div>
                                                        <br>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="?c=blog&a=deleteBlogpost&id=<?php echo $post->getId() ?>" class="btn btn-outline-primary" data-toggle="modal" data-target="#deleteModal_<?php echo $post->getId() ?>">Delete</a>

                                    <div class="modal fade" id="deleteModal_<?php echo $post->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title bold" id="deleteModalLabel">Delete Post</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this post?</p>
                                                    <form id="deleteForm_<?php echo $post->getId() ?>" method="post" action="?c=blog&a=deleteBlogpost&id=<?php echo $post->getId()?>">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                    </form>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-outline-danger" form="deleteForm_<?php echo $post->getId() ?>">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                </div>
                            <?php }  ?>
                        </div>
                    </div>
                <?php } ?>





                <div class="text-center">
                    <?php if($auth->isLogged() && $auth->getLoggedUserName() == "nikaaa") { ?>
                        <a href="?c=blog&a=createBlogpost" class="btn btn-outline-primary">Create new blogpost</a>
                        <br>
                        <br>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="public/js/blog.js"></script>
    <!-- Add the necessary CSS and JS files -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<!---->
<!--    <script>-->
<!--        $(document).ready(function () {-->
<!--            $('#sortSelect').change(function () {-->
<!--                var sortOption = $(this).val();-->
<!--                $.ajax({-->
<!--                    url: '?c=blog&a=getSortedPosts&sortOption=' + sortOption,-->
<!--                    success: function (response) {-->
<!--                        $('#posts-container').html(response);-->
<!--                    }-->
<!--                });-->
<!--            });-->
<!--        });-->
<!--    </script>-->



