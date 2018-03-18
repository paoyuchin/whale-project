<?php
try {
    $activityNo = $_REQUEST['activityNo'];
    $checkVal = $_REQUEST['checkVal'];

    require_once("connectback.php");
    $sql = 'UPDATE activity SET achievementStatus= :achievementStatus WHERE activityNo = :activityNo';
    $statement = $pdo ->prepare($sql);
    $statement->bindValue(":achievementStatus",$checkVal);
    $statement->bindValue(":activityNo",$activityNo);
    $statement->execute();
} catch (PDOException $e) {
    echo "錯誤原因: ", $e->getMessage(), "<br>";
    echo "錯誤行號: ", $e->getLine(), "<br>";
}
?>