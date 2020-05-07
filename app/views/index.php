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
                    <div class="title-guide">
                        <h2 class="text-white" align="left">Contacts Details</h2>
                    </div>
                    <?php
                    if (!empty($contacts)) {
                        echo "<table class='table table-striped'>";
                            echo "<thead class='thead-dark'>";
                                echo "<tr>";
                                    echo "<th scope='col'>#</th>";
                                    echo "<th scope='col'>Name</th>";
                                    echo "<th scope='col'>Email</th>";
                                    echo "<th scope='col'>Phone</th>";
                                    echo "<th scope='col'>CPF</th>";
                                    echo "<th scope='col'></th>";
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
                                        echo "<td align='right'>";
                                            echo "<a href='https://google.com' class='btn btn-dark'>Update</a>";
                                            echo "<a href='https://google.com' class='btn btn-danger'>Delete</a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                    ?>
<!--                Companies ========================================================================-->
                    <div class="title-guide">
                        <h2 class="text-white" align="left">Companies Details</h2>
                    </div>
                    <?php
                    if (!empty($companies)) {
                        echo "<table class='table table-striped'>";
                        echo "<thead class='thead-dark'>";
                        echo "<tr>";
                        echo "<th scope='col'>#</th>";
                        echo "<th scope='col'>Name</th>";
                        echo "<th scope='col'>Email</th>";
                        echo "<th scope='col'>Phone</th>";
                        echo "<th scope='col'>CPF</th>";
                        echo "<th scope='col'></th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach ($companies as $company) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $company['ID'] . "</th>";
                            echo "<td>" . $company['TITLE'] . "</td>";
                            echo "<td>" . $company['UF_CRM_CNPJ'] . "</td>";
                            echo "<td align='right'>";
                            echo "<a href='https://google.com' class='btn btn-dark'>Update</a>";
                            echo "<a href='https://google.com' class='btn btn-danger'>Delete</a>";
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
