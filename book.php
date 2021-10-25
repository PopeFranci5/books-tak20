<?php

require_once 'connection.php';

$stmt = $pdo ->prepare ('SELECT * FROM books b LEFT JOIN book_authors ba ON b.id=ba.book_id LEFT JOIN authors a ON a.id=ba.author_id WHERE b.id=:id');

$stmt-> execute([':id' => $_GET['id']]);
$book = $stmt->fetch();
?>
<html>
<h1><?php echo $book['title']; ?></h1>
<p>Väljalaske aasta: <?php echo $book['release_date']; ?></p>
<p>Keel: <?php echo $book['language']; ?></p>
<p>Kirjeldus: <?php echo $book['summary']; ?></p>
<p>Autor: <?php echo $book['first_name']; ?> <?php echo $book['last_name']; ?></p>
<p>Lehti: <?php echo $book['pages']; ?></p>
<p>Hind: <?php echo $book['price']; ?></p>
<img src="<?php echo $book['cover_path']; ?>" alt="Raamatu kaas"> <br>
<a href="edit.php?id=<?php echo $book['id']; ?>">Muuda</a>
</html>
