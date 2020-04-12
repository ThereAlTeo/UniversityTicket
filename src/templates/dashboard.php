<div id="wrapper">
    <?php
    if(isset($templateParams["menu"]))
        require(MENU_DIR.$templateParams["menu"]);
    ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php
            if(isset($templateParams["navbar"]))
                require(NAVBAR_DIR.$templateParams["navbar"]);
            ?>
            <div class="container-fluid">
            <?php
            if(isset($templateParams["main"]))
                require(MAIN_DIR.$templateParams["main"]);
            ?>
            </div>
        </div>
        <?php
        if(isset($templateParams["footer"]))
            require(FOOTER_DIR.$templateParams["footer"]);
        ?>
    </div>
</div>
