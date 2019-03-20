<?php
if (isset($_POST) && !empty($_POST)) {
    $errors = [];
    if (empty($_POST['lastName']) OR strlen($_POST['lastName']) < 2) {
        $errors['lastName'] = "The name must be greater than 1 character!";
    }
    if (empty($_POST['firstName']) OR strlen($_POST['firstName']) < 2) {
        $errors['firstName'] = "The first name must be greater than 1 character!";
    }
    if (!preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/", $_POST['phoneNumber'])) {
        $errors['phoneNumber'] = "The phone number must be in French format";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse e-mail n'est pas valide !";
    }
    if (empty($_POST['select'])) {
        $errors['select'] = "You must to choose something!";
    }
    if (empty($_POST['message'])) {
        $errors['message'] = "No empty message allowed sorry";
    }
    if (!$errors) {
        header("location: data.php");
        exit();
    }
}
?>


<!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


<div class="container">

    <form method="POST" action="form.php" >
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName"
                   value="<?= $_POST['lastName'] ?? "" ?>">
            <small class="text-danger font-weight-bold"><?= $errors['lastName'] ?? "" ?></small>
        </div>
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName"
                   value="<?= $_POST['firstName'] ?? "" ?>">
            <small class="text-danger font-weight-bold"><?= $errors['firstName'] ?? "" ?></small>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                   value="<?= $_POST['phoneNumber'] ?? "" ?>">
            <small class="text-danger font-weight-bold"><?= $errors['phoneNumber'] ?? "" ?></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="<?= $_POST['email'] ?? "" ?>">
            <small class="text-danger font-weight-bold"><?= $errors['email'] ?? "" ?></small>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend" >
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="select">
                <option value="" selected>Quel est ton animal préféré ?</option>
                <option value="1">Renard (Meilleur choix honnêtement)</option>
                <option value="2">Shiba Inu (Totalement acceptable)</option>
                <option value="3">Roucool (Pas ouf)</option>

            </select>
            <small class="text-danger font-weight-bold"><?= $errors['select'] ?? "" ?></small>


        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Your message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" ></textarea>
            <small class="text-danger font-weight-bold"><?= $errors['message'] ?? "" ?></small>

        </div>


        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
</body>
</html>
