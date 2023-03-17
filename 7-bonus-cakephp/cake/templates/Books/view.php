<h1><small>tytuł:</small> <?= h($book->title) ?></h1>
<h3><small>autor:</small> <?= h($book->author) ?></h3>
<h3><small>gatunek:</small> <?= h($book->genre) ?></h3>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $book->id]) ?></p>
<a href="/cake/books">Return</a>