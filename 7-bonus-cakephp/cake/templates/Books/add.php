<h1>Add book</h1>
<?php
    $options = array('dramat' => 'dramat', 'komedia' => 'komedia', 'powieść'
    => 'powieść');
    echo $this->Form->create($book);
    echo $this->Form->control('author');
    echo $this->Form->control('title');
    echo $this->Form->control('genre', array('options' => $options, 'default'
    => 'dramat'));
    echo $this->Form->button(__('Save book'));
    echo $this->Form->end();
?>