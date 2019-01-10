<?php
echo "<a href=\"./\">BACK</a>";
echo "<h1 style=color:red>abcd</h1>";
define("MY_NAME", "Le Viet Long", true);
$a = 5;
$b = 6;
echo "My name: " . MY_NAME;
echo "<br>Result:", $a + $b;

$arr = ['1', '2', 'Long'];
echo "<br>";
print_r($arr);
function add($a, $b)
{
    echo '<br> Function runs: ';
    return $a + $b;
}
$result = add(3, 4);
echo "$result<br>";

$arr = [30, 21, 1, 5, 8, 22, 18];
rsort($arr);
print_r($arr);
echo "<br>";
echo $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_FILENAME'];
?>