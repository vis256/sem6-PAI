<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Employees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Employee'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="employees view content">
            <h3><?= h($employee->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nazwisko') ?></th>
                    <td><?= h($employee->nazwisko) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imie') ?></th>
                    <td><?= h($employee->imie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Etat') ?></th>
                    <td><?= h($employee->etat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($employee->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Szefa') ?></th>
                    <td><?= $employee->id_szefa === null ? '' : $this->Number->format($employee->id_szefa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Placa Pod') ?></th>
                    <td><?= $employee->placa_pod === null ? '' : $this->Number->format($employee->placa_pod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Placa Dod') ?></th>
                    <td><?= $employee->placa_dod === null ? '' : $this->Number->format($employee->placa_dod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Zesp') ?></th>
                    <td><?= $employee->id_zesp === null ? '' : $this->Number->format($employee->id_zesp) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zatrudniony') ?></th>
                    <td><?= h($employee->zatrudniony) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
