<form method="post" action="?c=posts&a=store">
    <?php /** @var \App\Models\Post $data */
    if ($data->getId()) { ?>
        <input type="hidden" name="id" value="<?php echo $data->getId() ?>">
    <?php } ?>
    <label>
        Text:
        <input type="text" name="text" value="<?php echo $data->getText() ?>">
    </label>
        <input type="submit" value="Odoslat">
<!--    takto sa prechadza medzi strankami -->
    <a class="navbar-brand" href="?c=auth">login</a>
</form>
