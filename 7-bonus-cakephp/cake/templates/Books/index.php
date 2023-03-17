<h1>Books</h1>

<p>
    <?= $this->Html->link('Add Book', ['action' => 'add']) ?>
</p>

<table>
    <caption>Your books</caption>
    
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Action</th>
    </tr>

    <?php foreach ($books as $book) : ?>
    <tr>
        <td>
        <?= $book->id ?>
        </td>

        <td>
        <?= $this->Html->link($book->title, ['action' => 'view',
        $book->id]) ?>
        </td>

        <td>
        <?= $book->author ?>
        </td>

        <td>
        <?= $book->genre ?>
        </td>

        <td>
        <?= $this->Html->link(
        'Edit',
        ['action' => 'edit', $book->id]
        ) 
        ?>
        <?= $this->Form->postLink(
        'Delete',
        ['action' => 'delete', $book->id],
        ['confirm' => 'Are you sure?']
        )
        ?>
        </td>
    </tr>

    <?php endforeach; ?>
</table>