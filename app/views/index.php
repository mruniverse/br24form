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
                        <a href="/register" class="btn btn-success pull-right">Add New Employee</a>
                    </div>
                    <?php
//                    echo "<pre>";
//                    foreach ($contacts as $contact) {
//                        print_r($contact);
//                    }
//                    echo "<pre>";
                    if (!empty($contacts)) {
                        echo "<table class='table'>";
                            echo "<thead class='thead-dark'>";
                                echo "<tr>";
                                    echo "<th scope='col'>#</th>";
                                    echo "<th scope='col'>Name</th>";
                                    echo "<th scope='col'>Email</th>";
                                    echo "<th scope='col'>Phone</th>";
                                    echo "<th scope='col'>CPF</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                foreach ($contacts as $contact) {
                                    $email = array_value_recursive('VALUE', $contact['EMAIL']);
                                    $phone = array_value_recursive('VALUE', $contact['PHONE']);
                                    echo "<tr>";
                                        echo "<th scope='row'>" . $contact['ID'] . "</th>";
                                        echo "<td>" . $contact['NAME'] . "</td>";
                                        echo "<td>" . $email . "</td>";
                                        echo "<td>" . $phone . "</td>";
                                        echo "<td>" . $contact['UF_CRM_CPF'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='update.php?id=" . $contact['ID'] .
                                                "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=" . $contact['ID'] .
                                                "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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
