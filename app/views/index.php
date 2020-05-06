<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title-guide">
            Bem-vindo <?= $request['NAME'] ?>!
        </div>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Employee</a>
                    </div>
                    <?php
                    echo "<pre>";
                    foreach ($contacts as $contact) {
                        print_r($contact);
                    }
                    echo "<pre>";
                    if (!empty($contacts)) {
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>Phone</th>";
                        echo "<th>CPF</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach ($contacts as $contact) {
                            echo "<tr>";
                            echo "<td>" . $contact['ID'] . "</td>";
                            echo "<td>" . $contact['NAME'] . "</td>";
                            echo "<td>" . $contact['EMAIL'] . "</td>";
                            echo "<td>" . $contact['PHONE'] . "</td>";
                            echo "<td>" . $contact['UF_CRM_CPF'] . "</td>";
                            echo "<a href='read.php?id=" . $contact['ID'] . "' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                            echo "<a href='update.php?id=" . $contact['ID'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                            echo "<a href='delete.php?id=" . $contact['ID'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
