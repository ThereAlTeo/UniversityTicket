    <div class="my-3">
        <h3 class="mb-2 text-ticketBlue"><?php echo $templateParams["headerPage"][0] ?></h3>
        <?php if (strcmp($templateParams["headerPage"][1], "") != 0): ?>
        <p class="mb-3"><i class="font-weight-bold "> <?php echo $_SESSION["accountLog"]["Mail"] ?></i> <?php echo $templateParams["headerPage"][1] ?></p>
        <?php endif; ?>
    </div>
    <?php if (strcmp($templateParams["headerPage"][2], "") != 0): ?>
        <h6 class="mb-4 text-ticketBlue"><?php echo $templateParams["headerPage"][0]." Nr. " ?><b><?php echo $templateParams["headerPage"][2] ?></b></h6>
    <?php endif; ?>
