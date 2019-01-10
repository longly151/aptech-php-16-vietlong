<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>

<table class="table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">age</th>
      <th scope="col">post_quantity</th>
      <th scope="col">salary</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $authors = [
        [
            "name" => "Viet Long",
            "age" => "18",
            "posts_quantity" => "12",
        ],
        [
            "name" => "Van Nguyen",
            "age" => "19",
            "posts_quantity" => "9",
        ],
        [
            "name" => "Nguyen Y",
            "age" => "22",
            "posts_quantity" => "17",
        ],
        [
            "name" => "Gia Thuy",
            "age" => "20",
            "posts_quantity" => "25",
        ],
    ];
    $informationPhone = [
        1 => [
            "name" => "iphoneX",
            "gia" => 1000000,
            "mau" => "Rose"
        ],
        2 => [

        ]
        ];

    $salary;
    foreach($authors as $value) {
        echo "<tr>";
        echo "<td>".$value["name"]."</td>";
        echo "<td>".$value["age"]."</td>";
        echo "<td>".$value["posts_quantity"]."</td>";
        
        if ($value["posts_quantity"] > 10) {
            $salary = $value['posts_quantity'] * 10000;
        } else $salary = 0;
        echo "<td>".$salary."</td>";
        echo "</tr>";
    }
    ?>

  </tbody>
</table>