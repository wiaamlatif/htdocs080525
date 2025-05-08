<?php
/*
$hostname="sql110.infinityfree.com";
$databaseName="if0_38168562_caisse1124";
$Username="if0_38168562";
$Password="LXLQGuWwbv";

$pdo = new PDO("mysql:host=$hostname;dbname=$databaseName",$Username,$Password);
*/
?>

<?php
$host = "sql110.infinityfree.com"; // e.g., 'localhost'
$db   = "if0_38168562_caisse1124";
$user = "if0_38168562";
$pass ="LXLQGuWwbv";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

/*
$sql = "INSERT INTO users (name, email, age) VALUES (:name, :email, :age)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':age' => $age,
    ]);
    echo "Data inserted successfully!";
} catch (\PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
*/
?>