<?php
$templateParams["headerPage"] = array("Account", "di seguito viene riportato l'elento degli account registrati al sito.", $dbh->getAccountRecordNumber());
require(FACTORY_DIR."reservedPagesHeader.php");
?>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-5">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Utenti Info</h6>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" id="UserName">Nome</th>
                            <th class="text-center" id="UserLastName">Cognome</th>
                            <th class="text-center" id="UserMail">E-mail</th>
                            <th class="text-center" id="UserRegistration">Registrazione</th>
                            <th class="text-center" id="UserType">Tipologia</th>
                            <th class="text-center" id="UserEnable">Approvato</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dbh->getAllUsersInfo() as $key => $value): ?>
                        <tr>
                            <td class="text-center" headers="UserName"><?php echo $value["Nome"] ?></td>
                            <td class="text-center" headers="UserLastName"><?php echo $value["Cognome"] ?></td>
                            <td class="text-center" headers="UserMail"><?php echo $value["Email"] ?></td>
                            <td class="text-center" headers="UserRegistration"><?php echo $value["DataRegistrazione"] ?></td>
                            <td class="text-center" headers="UserType"><?php echo $value["Descrizione"] ?></td>
                            <?php if (strcmp($value["AccountAbilitato"], "FALSE") == 0): ?>
                                <td class="text-center" headers="UserEnable">
                                    <button type="button" class="btn btn-outline-danger enable btn-sm" title="Click per abilitare">
                                        <i class="fa fa-user-times"></i>
                                    </button>
                                </td>
                            <?php else: ?>
                                <td class="text-center text-success" headers="UserEnable"><i class="fa fa-user-plus"></i></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                    <div class="d-flex justify-content-center my-2">
                        <nav aria-label="Page navigation">
                            <ul class="pagination"></ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
