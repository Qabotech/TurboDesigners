<style>
body h1 {
    font-weight: 500;
    margin-top: 10vw;
    margin-bottom: 3vw;
    margin-left: 5vw;
    font-family: var(--roboto-);
}

input,
select {
    width: 40vw;
    border: 1px solid var(--F-C-);
    height: 3vw;
    padding: 0 1vw;
}

input[type="submit"] {
    width: 15vw;
    height: 3vw;
    color: var(--W-C-);
    background: var(--F-C-);
    margin-top: 2vw;
    font-family: var(--roboto-);
    font-size: 1.2em;
    cursor: pointer;
}

::placeholder {
    color: var(--GR-C-) !important;
}

form {
    margin-left: 5vw;
    margin-bottom: 10vw;
    flex-direction: column;
    align-items: flex-start !important;
    gap: 2vw;
}

form>h3 {
    font-weight: 400;
    font-family: var(--roboto-) !important;
}

.ADAera {
    position: absolute;
    right: 5vw;
    top: 50%;
    height: 600px;
    transform: translate(-5vw, -50%);
    border: 1px solid var(--F-C-);
}

.ADAera h1 {
    font-size: 5em;
    font-family: var(--roboto-);
    text-align: center;
    margin: 0;
}

body {
    position: relative;
}

.wrap {
    min-height: 70vh;
}

@media only screen and (max-width: 1024px) {
    .ADAera {
        left: 50%;
        top: 10%;
        height: auto;
        width: 70%;
        transform: translate(-50%, -50%);
        border: 1px solid var(--F-C-);
    }

    .ADAera h1 {
        font-size: 3em;
    }

    .wrap {
        min-height: 120vh;
        display: grid;
        place-content: center;
        gap: 5vw;
        padding-top: 10vh;
    }

    input {
        width: 50vw;
        height: 5vw;
    }

    input[type="submit"] {
        width: 20vw;
        height: 5vw;
        font-size: 1.2em;
    }

    ::placeholder {
        font-size: 1.3em;
        color: var(--GR-C-) !important;
    }
}

@media only screen and (max-width: 650px) {

    input,
    select {
        width: 60vw;
        height: 8vw;
    }

    input[type="submit"] {
        width: 25vw;
        height: 8vw;
        font-size: 1.2em;
    }

    ::placeholder {
        font-size: 1.3em;
        color: var(--GR-C-) !important;
    }

    .wrap {
        min-height: 110vh;
        height: auto;

    }
}

@media only screen and (max-width: 550px) {

    input,
    select {
        width: 70vw;
        height: 9vw;
    }

    ::placeholder {
        font-size: 1em;
        color: var(--GR-C-) !important;
    }

    form {
        margin-left: 5vw;
        margin-bottom: 10vw;
        flex-direction: column;
        align-items: flex-start !important;
        gap: 4vw;
    }

    .wrap {
        min-height: 130vh;
        height: auto;
    }

    .ADAera {
        width: 90%;
    }

    .ADAera h1 {
        font-size: 3em;
        padding: 0.5em 0;
    }

    input[type="submit"] {
        width: auto;
        min-width: 30vw;
        height: 9vw;
        font-size: 1em;
        padding: 0 1em;
        display: grid;
        place-content: center;
        align-items: center;
        place-items: center;
    }
}

@media only screen and (max-height: 650px) {
    .wrap {
        min-height: 180vh;
    }
}
</style>
<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");
?>
<h1>Add New </h1>
<div class="wrap">
    <form action="../Inc/Admin.php" method="post">
        <input type="text" name="PName" placeholder="product Name">
        <input type="text" name="DName" placeholder="Employee Name"><br><br>
        <input type="text" name="DLevel" placeholder="Employee Level 1-5">
        <input type="text" name="PTags" placeholder="Search Tags"><br><br>
        <input type="text" name="PDescription" placeholder="product description">
        <input type="text" name="IMG" placeholder="ADD IMG link 1 (vertical) main img"><br> <br>
        <input type="text" name="IMG1" placeholder="ADD IMG link 2 (vertical)">
        <input type="text" name="IMG2" placeholder="ADD IMG link 3 (horizontal)"><br> <br>
        <input type="text" name="Prise" placeholder="ADD Prise of the Product">
        <select name="CAT" id="cars">
            <option value="UI">UI/UX Design</option>
            <option value="Social">Social media design</option>
            <option value="Banner">Banner design</option>
            <option value="Logo">Logo design</option>
            <option value="Video">Video</option>
            <option value="Digital">Digital art</option>
            <option value="App">App Template</option>
            <option value="Website">Website Template</option>
            <option value="Other">Other</option>
        </select>
        <input type="submit" value="Create" name="create">
    </form>
</div>
<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>