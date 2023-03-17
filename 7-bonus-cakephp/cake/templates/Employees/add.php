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
            <?= $this->Html->link(__('List Employees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="employees form content">
            <?= $this->Form->create($employee) ?>
            <fieldset>
                <legend><?= __('Add Employee') ?></legend>
                <?php
                    $etaty = array('DYREKTOR'=>'DYREKTOR', 'PROFESOR'=>'PROFESOR', 'ADIUNKT'=>'ADIUNKT', 'SEKRETARKA'=>'SEKRETARKA', 'ASYSTENT'=>'ASYSTENT', 'DOKTORANT'=>'DOKTORANT',);

                    echo $this->Form->control('nazwisko');
                    echo $this->Form->control('imie');
                    echo $this->Form->control('etat', array('options' => $etaty, 'default' => 'DOKTORANT'));
                    echo $this->Form->control('id_szefa');
                    echo $this->Form->control('zatrudniony', ['empty' => true]);
                    echo $this->Form->control('placa_pod');
                    echo $this->Form->control('placa_dod');
                    echo $this->Form->control('id_zesp');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
