<?php

namespace Bookstore;

echo ("\n" . "CHEMIN : " . '/Users/robinburnay/Desktop/ESGI-DIRECTORY/Cours-IW3/ALGO/projet/vendor/autoload.php') . "\n \n";
/*require_once(__DIR__ . '/../../../vendor/autoload.php');*/
require_once('/Users/robinburnay/Desktop/ESGI-DIRECTORY/Cours-IW3/ALGO/projet/vendor/autoload.php');


use Bookstore\BookFunctions;
use Bookstore\BookSort;
use Bookstore\BookDisplay;

$books = [];

$BookFunctions = new BookFunctions();
$BookFunctions-> addBook($books, "1984", "Roman dystopique de George Orwell, illustrant une société totalitaire.", false);


/*addBook($books, "Le Meilleur des mondes", "Roman d'anticipation de Aldous Huxley, dépeignant une société futuriste.", false);
addBook($books, "Fahrenheit 451", "Roman de science-fiction de Ray Bradbury, centré sur la censure et la répression.", false);
addBook($books, "Le Seigneur des Anneaux", "Épopée fantastique de J.R.R. Tolkien, un classique du genre fantasy.", false);
addBook($books, "Le vieil homme et la mer", "Roman court d'Ernest Hemingway, récit d'une lutte entre un vieil homme et un grand marlin.", false);
addBook($books, "Crime et Châtiment", "Roman psychologique de Fiodor Dostoïevski, explorant la morale et la rédemption.", false);
addBook($books, "L'Étranger", "Roman existentialiste de Albert Camus, connu pour son exploration de l'absurdité de la vie.", false);
addBook($books, "À la recherche du temps perdu", "Roman de Marcel Proust, une profonde réflexion sur le temps et la mémoire.", false);
addBook($books, "Les Misérables", "Roman de Victor Hugo, qui critique la société française et explore la justice et la loi.", false);
addBook($books, "Guerra e Paz", "Roman historique de Leo Tolstoï, qui raconte l'histoire de familles aristocratiques pendant les guerres napoléoniennes.", false);
addBook($books, "La Ferme des animaux", "Fable politique de George Orwell, une satire du stalinisme.", false);
addBook($books, "Moby Dick", "Roman d'aventure de Herman Melville, une quête obsessionnelle du grand cachalot blanc.", true);
addBook($books, "Jane Eyre", "Roman de Charlotte Brontë, un mélange de critique sociale et de développement personnel.", false);
addBook($books, "Orgueil et Préjugés", "Roman de Jane Austen, une critique mordante des attitudes sociales de l'époque.", false);

addBook($books, "Les Frères Karamazov", "Roman de Fiodor Dostoïevski, une exploration de la foi, du doute et de la raison.", false);
addBook($books, "Le Comte de Monte-Cristo", "Roman d'aventure d'Alexandre Dumas, une histoire de trahison et de revanche.", false);
addBook($books, "Brave New World", "Roman de science-fiction d'Aldous Huxley, un aperçu d'un futur dystopique effrayant.", false);
addBook($books, "La Divine Comédie", "Poème épique de Dante Alighieri, une allégorie du voyage de l'âme vers Dieu.", false);
addBook($books, "Don Quichotte", "Roman de Miguel de Cervantes, une satire des romans de chevalerie traditionnels.", false);
*/



$BookFunctions->updateBook($books, 2, "Le Livre", "C'est moi j'ai écris le livre c:", false);



$BookFunctions->deleteBook($books, 2);


$BookSort = new BookSort();

$sortedBooks = $BookSort->mergeSortBooks($books, 'id');

$BookDisplay = new BookDisplay();

$BookDisplay->displayBook($books, 1);
$BookDisplay->displayAllBooks($sortedBooks);

