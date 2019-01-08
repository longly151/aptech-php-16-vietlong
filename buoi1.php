<style>
  table {
    border: 1px solid;
    border-collapse: collapse;
  }
  th,
  td {
    border: 1px solid #000;
    padding: 10px 20px;
  }
</style>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Price</th>
      <th>Color</th>
    </tr>
  </thead>
  <tbody>
    <?php
$products = [
    'iphone X' =>
    ['price' => 18200000,
        'color' => 'rose'],
    'ipad' =>
    ['price' => 9000000,
        'color' => 'gray'],
];
$i = 1;
foreach ($products as $key => $value) {
    echo "<tr>";
    echo "<th>$i</th>";
    echo "<td>$key</td>";
    foreach ($value as $key1 => $value1) {
        echo "<td>$value1</td>";
    }
    echo "</tr>";
    $i++;
}
?>
  </tbody>
</table>