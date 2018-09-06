<?

use app\models\Post;

?>
<div class="admin-default-index">
    <h1>
        $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
    <?php $model = Post::findOne(3)?>
    <?= \kartik\file\FileInput::widget([
            'model' => $model,
        'attribute' => 'gallery',
        'options' => ['multiple' => true]
    ])?>
</div>
