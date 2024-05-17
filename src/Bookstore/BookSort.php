<?php

namespace Bookstore;

class BookSort{

    function mergeSortBooks($books, $attribute) {
        if (count($books) <= 1) {
            return $books;
        }

        $mid = intval(count($books) / 2);
        $left = array_slice($books, 0, $mid);
        $right = array_slice($books, $mid);

        $left = mergeSortBooks($left, $attribute);
        $right = mergeSortBooks($right, $attribute);

        return merge($left, $right, $attribute);
    }

    function merge($left, $right, $attribute) {
        $result = [];
        $i = 0;
        $j = 0;

        while ($i < count($left) && $j < count($right)) {
            if ($left[$i][$attribute] <= $right[$j][$attribute]) {
                $result[] = $left[$i++];
            } else {
                $result[] = $right[$j++];
            }
        }

        while ($i < count($left)) {
            $result[] = $left[$i++];
        }

        while ($j < count($right)) {
            $result[] = $right[$j++];
        }

        return $result;
    }
}


// fonction de coparaison -> rm limites 