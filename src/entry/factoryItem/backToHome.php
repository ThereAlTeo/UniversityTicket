<?php if (isset($_GET["backHome"])): ?>
    <div class="text-center text-ticketBlue">
        <h1 class="display-1 text-uppercase font-weight-bold mt-5"><?php echo $_GET["backHome"]["Section"] ?></h1>
        <h3 class="font-weight-light mb-5 h3"><?php echo $_GET["backHome"]["Text"] ?></h3>
        <p class="my-2">
            <a href="./bacheca.php" class="my-2">&larr; Torna alla HOMEPAGE</a>
        </p>
    </div>
<?php unset($_GET["backHome"]);
endif; ?>
