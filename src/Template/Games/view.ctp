<!-- data area -->
<div class="box">
    <?php if ($game->status == 'TIMED') : ?>
        <?= $this->partial('timed_view');?>
    <?php else: ?>
        <?= $this->partial('finished_view');?>
    <?php endif; ?>
</div>

<!-- comment area -->
<?= $this->partial('comment',['disabled' => true]);?>
