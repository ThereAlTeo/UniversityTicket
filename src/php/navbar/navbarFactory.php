    <!--Navbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="navbarToggle" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle text-muted" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <?php
                    $badge = count($dbh->getMessageByIDUser($_SESSION["accountLog"]["IDUser"], true));
                    if ($badge): ?>
                        <span class="badge badge-danger badge-counter"><?php echo $badge ?></span>
                    <?php endif; ?>
                </a>
                <?php
                $message = $dbh->getMessageByIDUser($_SESSION["accountLog"]["IDUser"]);
                if (count($message)): ?>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Notifiche
                        </h6>
                        <?php foreach (range(0, 2) as $value): ?>
                            <?php if (isset($message[$value])): ?>
                                <a class="dropdown-item d-flex align-items-center">
                                    <div class="mr-3">
                                        <div class="iconCircle bg-<?php echo getNoticeColor($value) ?>">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo getLongDateFormat($message[$value]["DataMessaggio"]) ?></div>
                                        <span class="<?php echo (!$message[$value]["Lettura"]) ? "font-weight-bold" : "" ; ?>"><?php echo $message[$value]["Contenuto"] ?></span>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <a class="dropdown-item text-center small text-gray-500" href="./notificationCenter.php">Leggi tutti i messaggi</a>
                    </div>
                <?php endif; ?>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle text-secondary" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user mr-1"></i>
                    <span class="d-none d-lg-inline"><?php echo $_SESSION["accountLog"]["Mail"]; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="./logout.php">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!--Navbar -->
