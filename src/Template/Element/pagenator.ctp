<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('最初へ')) ?>
        <?= $this->Paginator->prev('< ' . __('前へ')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('次へ') . ' >') ?>
        <?= $this->Paginator->last(__('最後へ') . ' >>') ?>
    </ul>
</div>