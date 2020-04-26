    <?php
    require(HEADER_DIR.$templateParams["header"]);

    if(isset($templateParams["navbar"]))
        require(NAVBAR_DIR.$templateParams["navbar"]);
    ?>
    <main>
        <div class="container-fluid">
            <?php
            if (isset($templateParams["jumbotron"]))
            require(JUMBOTRN_DIR.$templateParams["jumbotron"]);

            if(isset($templateParams["main"]))
            require(MAIN_DIR.$templateParams["main"]);
            ?>
        </div>        
    </main>
    <?php
    if(isset($templateParams["footer"]))
        require(FOOTER_DIR.$templateParams["footer"]);
    ?>
