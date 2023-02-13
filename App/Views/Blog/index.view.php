<?php

/** @var \App\Models\BlogPost[] $data */
/** @var \App\Core\IAuthenticator $auth */

?>

<div>
    <!--    //TODO responsiveness-->
    <div class="container" id="containerBlog">
        <div class="row">

            <?php foreach ($data as $post) { ?>
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $post->getTitle() ?></h5>
                        <p class="card-text"> <?php echo $post->getText() ?> </p>
                        <p class="card-text"> <?php echo $post->getDate() ?></p>

                        <?php if($auth->isLogged() && $auth->getLoggedUserName() == "nikaaa") { ?>
                            <div class="text-center">

                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editModal_<?php echo $post->getId() ?>">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editModal_<?php echo $post->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit blog post</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="formEditBlogpost" method="post" action="?c=blog&a=editBlogpost&id=<?php echo $post->getId() ?>">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Title</label>
                                                        <textarea type="textarea" class="form-control" rows="1" id="editBlogTitle" name="editBlogTitle"><?php echo $post->getTitle()?></textarea>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Text</label>
                                                        <textarea type="textarea" class="form-control" rows="10" id="editBlogText" name="editBlogText"><?php echo $post->getText()?></textarea>
                                                        <!--                                                        <textarea class="form-control" rows="15" id="textarea">-->
                                                    </div>
                                                    <br>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="?c=blog&a=deleteBlogpost&id=<?php echo $post->getId() ?>" class="btn btn-secondary">Delete</a>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            <?php } ?>

            <div class="text-center">
                <?php if($auth->isLogged() && $auth->getLoggedUserName() == "nikaaa") { ?>
                    <a href="?c=blog&a=create" class="btn btn-secondary">Create new blogpost</a>
                    <br>
                    <br>
                <?php } ?>
            </div>
        </div>
    </div>
