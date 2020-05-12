<?php if (isset($_GET["backHome"])): ?>
    <div class="text-center text-ticketBlue">
        <p class="display-1 text-uppercase font-weight-bold mt-5 h1"><?php echo $_GET["backHome"]["Section"] ?></p>
        <p class="font-weight-light mb-5 h3"><?php echo $_GET["backHome"]["Text"] ?></p>
        <p class="my-2">
            <a href="./bacheca.php" class="my-2">&larr; Torna alla HOMEPAGE</a>
        </p>
    </div>
<?php unset($_GET["backHome"]);
endif; ?>
