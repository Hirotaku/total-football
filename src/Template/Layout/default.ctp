<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="Content-Language" content="ja">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="none">
    <title>
        Cubex
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <?= $this->Html->css('AdminLTE.min.css') ?>
    <?= $this->Html->css('skins/skin-blue-light.min.css') ?>
    <?= $this->Html->css('../plugins/select2/select2.min.css'); ?>

    <?= $this->Html->css('datepicker/bootstrap-datetimepicker.css') ?>
    <?= $this->Html->css('../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') ?>

    <?= $this->Html->script('../plugins/jQuery/jquery-2.2.3.min.js'); ?>
    <?= $this->Html->script('../plugins/select2/select2.full.min.js'); ?>
    <?= $this->Html->script('../plugins/select2/i18n/ja.js'); ?>
    <?= $this->Html->script([
        'bootstrap.js',
        'datepicker/bootstrap-datetimepicker.js',
        'datepicker/locales/bootstrap-datetimepicker.ja.js'
    ]) ?>
    <?= $this->Html->script('datepicker/form.js') ?>
    <?= $this->Html->script('wysihtml5.js') ?>
    <?= $this->Html->script('../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') ?>
    <?= $this->Html->script('../plugins/bootstrap-wysihtml5/locale/bootstrap-wysihtml5.ja-JP.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="skin-blue-light layout-top-nav">
<?= $this->element('global_header') ?>
<?= $this->Flash->render(); ?>
<?= $this->fetch('content') ?>
</body>
</html>