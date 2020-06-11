<?php

include 'connect.php';


$headers = apache_request_headers();
$token = htmlspecialchars($_COOKIE["token"]);

$resultArray= [];

if($headers['token'] === $token){
    $data = $_POST['dataValue'];
    $datax = json_decode($data);

    foreach ($datax as $key => $value){
        $resultArray[$key] = $value[0];
    }

    $sql = "INSERT INTO sonuclar(pageone,
            pagetwo,
            pagethree,
            pagefour,
            pagefive,
            pagesix,
            pageseven,
            pageeight) VALUES (
            :pageoner,
            :pagetwor,
            :pagethreer,
            :pagefourr,
            :pagefiver,
            :pagesixr,
            :pagesevenr,
            :pageeightr)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pageoner', $resultArray['pageone'], PDO::PARAM_STR);
    $stmt->bindParam(':pagetwor', $resultArray['pagetwo'], PDO::PARAM_STR);
    $stmt->bindParam(':pagethreer', $resultArray['pagethree'], PDO::PARAM_STR);
    $stmt->bindParam(':pagefourr', $resultArray['pagefour'], PDO::PARAM_STR);
    $stmt->bindParam(':pagefiver', $resultArray['pagefive'], PDO::PARAM_STR);
    $stmt->bindParam(':pagesixr', $resultArray['pagesix'], PDO::PARAM_STR);
    $stmt->bindParam(':pagesevenr', $resultArray['pageseven'], PDO::PARAM_STR);
    $stmt->bindParam(':pageeightr', $resultArray['pageeight'], PDO::PARAM_STR);

    $stmt->execute();

    $sql2 = "SELECT COUNT(*) FROM sonuclar";
    $stmtx = $conn-> prepare($sql2);
    $stmtx->execute();

    $stmtxx = $stmtx->fetchColumn();

   echo $stmtxx;

}


