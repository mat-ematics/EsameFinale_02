<?php
require_once("inclusioni/strumenti.php");
use assets\strumenti;
$data = strumenti::leggiJSON("json/data.json", true)["contacts"];
/* strumenti::stampaArray($data);
exit; */
?>

<!DOCTYPE html>
<html lang="en">
    <!-- Head incluso da inclusioni/head.php -->
    <?php require_once("inclusioni/head.php") ?> 
    <body>
        <!-- Barra di navigazione inclusa da navbar.php -->
        <?php require_once('inclusioni/navbar.php') ?>
        <main>
            <!-- Contenitore Form -->
            <div id="contactsWrapper">
                <div id="contacts">
                    <!-- Form vero e proprio -->
                    <form action="<?php echo $data['action'] ?>" method="post" id="contactForm" novalidate>
                        <!-- Titolo Form -->
                        <h2 id="title"><?php echo $data['title'] ?></h2>
                        <!-- Input Nome e Cognome -->
                        <label for="fname"><?php echo $data['name']['label'] ?></label>
                        <div id="name">
                            <input type="text" id="fname" name="fname" placeholder="<?php echo $data['name']['first_name']['placeholder'] ?>" required pattern="<?php echo $data['name']['first_name']['pattern'] ?>" title="<?php echo $data['name']['first_name']['title'] ?>">
                            <input type="text" id="lname" name="lname" placeholder="<?php echo $data['name']['last_name']['placeholder'] ?>" required pattern="<?php echo $data['name']['last_name']['pattern'] ?>" title="<?php echo $data['name']['last_name']['title'] ?>">
                        </div>
                        <!-- Input Indirizzo E-mail -->
                        <label for="email"><?php echo $data['email']['label'] ?></label>
                        <input type="email" id="email" name="email" placeholder="<?php echo $data['email']['placeholder'] ?>" required pattern="<?php echo $data['email']['pattern'] ?>" title="<?php echo $data['email']['title'] ?>">
                        <!-- Input Telefono -->
                        <label for="phoneNumber"><?php echo $data['phone_number']['label'] ?></label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="<?php echo $data['phone_number']['placeholder'] ?>" required pattern="<?php echo $data['phone_number']['pattern'] ?>" title="<?php echo $data['phone_number']['title'] ?>">
                        <!-- Motivo del contatto -->
                        <label for="subject"><?php echo $data['subject']['label'] ?></label>
                        <select id="subject" name="subject">
                            <?php foreach ($data['subject']['options'] as $option) { ?>
                                <option value="<?php echo $option['value'] ?>"><?php echo $option['name'] ?></option>
                            <?php } ?>
                        </select>
                        <!-- Oggetto del messaggio -->
                        <label for="object"><?php echo $data['object']['label'] ?></label>
                        <input type="text" id="object" name="object" placeholder="<?php echo $data['object']['placeholder'] ?>" required pattern="<?php echo $data['object']['pattern'] ?>">
                        <!-- Corpo del messaggio -->
                        <label for="message"><?php echo $data['message']['label'] ?></label>
                        <textarea id="message" name="message" placeholder="<?php echo $data['message']['placeholder'] ?>" required minlength="<?php echo $data['message']['min_length'] ?>" maxlength="<?php echo $data['message']['max_length'] ?>"></textarea>
                        <button type="submit" name="submit" value="submit" id="submit">
                            <span id="buttonText"><?php echo $data['submit_button']['text'] ?></span>
                        </button>
                    </form>
                </div>
            </div>
        </main>
        <script>
        const textarea = document.getElementById('message');

        textarea.addEventListener('input', function () {
          const message = textarea.value;
          const minLength = parseInt(textarea.getAttribute('minlength'));
          const maxLength = parseInt(textarea.getAttribute('maxlength'));
      
          if (message.length < minLength || message.length > maxLength) {
            textarea.setCustomValidity(`Message must be between ${minLength} and ${maxLength} characters.`);
            textarea.classList.add('invalid');
            textarea.classList.remove('valid');
          } else {
            textarea.setCustomValidity('');
            textarea.classList.remove('invalid');
            textarea.classList.add('valid');
          }
        });
    </script>
    </body>
</html>
