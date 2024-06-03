<?php 

require_once("inclusioni/strumenti.php");
use assets\strumenti;
$contacts = strumenti::leggiJSON("json/data.json", true)["contacts"];
$data = strumenti::leggiJSON("json/data.json", true)['responses']['contacts'];

$print = false;
$form = [];
$flag = [];

if (empty($_POST)) {
    $flag["form"] = $data['errors']['default'];
} else {

    /* strumenti::stampaArray($_POST); */

    strumenti::validaTesto($_POST['fname'], 'default', $contacts['name']['first_name']['max_length'], $contacts['name']['first_name']['min_length'], $print , 'Name') ? $form['name'] = trim($_POST['fname']) : $flag[] = $contacts["name"]['first_name']['error_message'];
    strumenti::validaTesto($_POST['lname'], 'default', $contacts['name']['last_name']['max_length'], $contacts['name']['last_name']['min_length'], $print , 'Surname') ? $form['surname'] = trim($_POST['lname']) : $flag[] = $contacts["name"]['last_name']['error_message'];
    strumenti::validateEmail($_POST['email'], $print) ? $form['email'] = trim($_POST['email']) : $flag[] = $contacts["email"]['error_message'];;
    strumenti::validatePhone(preg_replace('/\s+/', "", $_POST['phoneNumber'])) ? $form['phone_number'] = preg_replace('/\s+/', "", $_POST['phoneNumber']) : $flag[] = $contacts["phone_number"]['error_message'];
    if ($_POST['subject'] == null) {
        $flag[] = $contacts["subject"]['error_message'];
    } else {
        $form['subject'] = trim($_POST['subject']);
    }
    strumenti::validaTesto($_POST['object'], "default", $contacts['object']['max_length'], $contacts['object']['min_length'], $print, "Object") ? $form['object'] = trim($_POST['object']) : $flag[] = $contacts["object"]['error_message'];
    strumenti::validaTesto($_POST['message'], "", $contacts['message']['max_length'], $contacts['message']['min_length'], $print, "Message") ? $form['object'] = trim($_POST['message']) : $flag[] = $contacts["message"]['error_message'];;

    /* strumenti::stampaArray($form); */

    strumenti::writeArrInFile("contatti/contatti.txt", $form, "%s: %s \n");
}
?>

<!DOCTYPE html>
<html lang="en">
    <!-- Head incluso da inclusioni/head.php -->
    <?php require_once("inclusioni/head.php") ?> 
    <body>
        <!-- Barra di navigazione inclusa da navbar.php -->
        <?php require_once('inclusioni/navbar.php') ?>
        <main>
            <!-- Display Errori -->
            <?php if (empty($flag) == false) { 
                foreach ($flag as $error) { ?>
                    <p class="errors"><?php echo $error ?></p>
                <?php } ?>   
            <!-- Display Conferma di Invio -->
            <?php } else { ?>
                    <p>Form Sent Successfully</p>
            <?php } ?>
        </main>
         <?php require_once("inclusioni/footer.php") ?>
    </body>
</html>