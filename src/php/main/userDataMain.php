<?php
$templateParams["headerPage"] = array("Account", "di seguito viene riportato l'elento degli account registrati al sito.", $dbh->getAccountRecordNumber());
require(FACTORY_DIR."reservedPagesHeader.php");
?>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-5">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <p class="m-0 font-weight-bold text-primary h6">Utenti Info</p>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Cognome</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Registrazione</th>
                            <th class="text-center">Tipologia</th>
                            <th class="text-center">Approvato</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dbh->getAllUsersInfo() as $key => $value): ?>
                        <tr>
                        <?php foreach ($value as $index => $item):
                            if (strcmp($index, "AccountAbilitato") == 0):
                                if (strcmp($value["AccountAbilitato"], "FALSE") == 0): ?>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-danger enable btn-sm" title="Click per abilitare">
                                            <i class="fa fa-user-times"></i>
                                        </button>
                                    </td>
                                <?php else: ?>
                                    <td class="text-center text-success"><i class="fa fa-user-plus"></i></td>
                                <?php endif; ?>
                            <?php else: ?>
                                <td class="text-center"><?php echo $item ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
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
