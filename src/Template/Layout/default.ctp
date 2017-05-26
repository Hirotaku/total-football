<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="Content-Language" content="ja">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="none">
    <title>
        Total-Football
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <?= $this->Html->css('AdminLTE.min.css') ?>
    <?= $this->Html->css('skins/skin-red.min.css') ?>
    <?= $this->Html->css('../plugins/select2/select2.min.css'); ?>

    <?= $this->Html->script('../plugins/jQuery/jquery-2.2.3.min.js'); ?>
    <?= $this->Html->script('../plugins/select2/select2.full.min.js'); ?>
    <?= $this->Html->script('../plugins/select2/i18n/ja.js'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<!--<body class="skin-blue-light layout-top-nav">-->
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
<?= $this->element('global_header') ?>
<?= $this->element('global_sidebar') ?>
    <div class="content-wrapper">
<?= $this->Flash->render(); ?>
<?= $this->fetch('content') ?>
    </div>
</div>
</body>
</html>