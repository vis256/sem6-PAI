<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<div class="employees index content">
    <?= $this->Html->link(__('New Employee'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Employees') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nazwisko') ?></th>
                    <th><?= $this->Paginator->sort('imie') ?></th>
                    <th><?= $this->Paginator->sort('etat') ?></th>
                    <th><?= $this->Paginator->sort('id_szefa') ?></th>
                    <th><?= $this->Paginator->sort('zatrudniony') ?></th>
                    <th><?= $this->Paginator->sort('placa_pod') ?></th>
                    <th><?= $this->Paginator->sort('placa_dod') ?></th>
                    <th><?= $this->Paginator->sort('id_zesp') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $this->Number->format($employee->id) ?></td>
                    <td><?= h($employee->nazwisko) ?></td>
                    <td><?= h($employee->imie) ?></td>
                    <td><?= h($employee->etat) ?></td>
                    <td><?= $employee->id_szefa === null ? '' : $this->Number->format($employee->id_szefa) ?></td>
                    <td><?= h($employee->zatrudniony) ?></td>
                    <td><?= $employee->placa_pod === null ? '' : $this->Number->format($employee->placa_pod) ?></td>
                    <td><?= $employee->placa_dod === null ? '' : $this->Number->format($employee->placa_dod) ?></td>
                    <td><?= $employee->id_zesp === null ? '' : $this->Number->format($employee->id_zesp) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
