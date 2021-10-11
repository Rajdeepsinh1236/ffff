<?php
include("header.php");
include("menu_user.php");
include("conn.php");
echo "<br>";
$username = $_COOKIE["username"];


if (isset($_POST['que'])) {
    $que = $_POST["que"];
    $add_qry = "INSERT INTO `query`( `qname`, `que`) VALUES ('$username','$que')";
    $r = mysqli_query($conn, $add_qry);
    if ($r) {
        $msg = "query posted successfully.";
    } else {
        $msg = "Please try again.";
    }
}
?>
<style>
    .queries{
        width: auto;
        padding: 15px 15px;
        background-color: #f2f2f2;
        box-shadow: 4px 4px 8px 0 rgba(19, 0, 0, 19), 10px 6px 20px .10px rgba(19, 0, 0, 19);
        display: grid;
        grid-gap: 25px;
        grid-template-columns: auto auto;
        grid-template-areas: "qb q"
            "ab a";
        align-items: center;
        font-size: 24px;
    }
    .qby {
        grid-area: qb;
        background-color: #e6e6e6;
        padding: 18px 15px;

    }
    .ansby {
        grid-area: ab;
        background-color: #e6e6e6;
        padding: 22px 15px;
    }

    .ans {
        grid-area: a;
        background-color: #ffffff;
        padding: 08px 15px;
    }

    .que {
        grid-area: q;
        background-color: #ffffff;
        padding: 19px 15px;
    }

    .query {
        width: auto;
        padding: 15px 15px;
        background-color: #f2f2f2;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        display: grid;
        grid-gap: 5px;
        grid-template-columns: auto auto;
        grid-template-areas: "qb q"
            "ab a";
        align-items: center;
        font-size: 22px;
    }
</style>
<hr>
<div class="form" align="center">
    <form method="POST">
        <input class="w3-input" type="text" name="que" placeholder="Enter the question" size="200"><br>
        <input class="w3-button w3-white w3-border w3-border-green" type="submit" name="submit" value="submit">
    </form>
    <span><?php if (isset($msg)) {
                echo $msg;
            } ?></span>
</div>
<br>
<div class="queries">
    <?php
    $fetch_qry = "select * from query where qname='$username'";
    $r1 = mysqli_query($conn, $fetch_qry);
    while ($row = mysqli_fetch_assoc($r1)) {
    ?>
        <hr>
        <div class="query">
            <div class="qby"><strong>Question By </strong>: <br><?php echo $row['qname']; ?></div>
            <div class="que">
                <strong> Your Query </strong> : <br><?php echo $row['que']; ?>
            </div>
            <div class="ansby"><strong>Solution By </strong>:<br> <?php echo $row['aname']; ?></div>
            <div class="ans">
                <strong>Solution</strong> :<br><?php echo $row['ans']; ?>
            </div>

        </div>
    <?php

    }
    ?>
</div>
<?php
include("footer.php");
?>