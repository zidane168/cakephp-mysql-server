<!DOCTYPE html>
<html>
    <head>
        <title>PDF</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @page {
                margin: 0px 0px 0px 0px !important;
                padding: 0px 0px 0px 0px !important;
            }
            
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--       
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet"> -->

        
        <style>
            /* export chinese use this */
            @font-face {
                font-family: 'Firefly Sung';
                font-style: normal;
                font-weight: 400;
                src: url(http://eclecticgeek.com/dompdf/fonts/cjk/fireflysung.ttf) format('truetype');
            }
            * {
                font-family: Firefly Sung, DejaVu Sans, sans-serif; 
            }

            .blue {
                color: blue;
            }

            .mt-20 {
                margin-top: 20px;
            }

            .bold {
                font-weight: bold;
            }

            /* export vietnamese use this */
            /* * { 
                font-family: 'DejaVu Sans', sans-serif;
            } */
    </style>
    </head>
    <body>

        <?php 
            echo "<div class='mt-20'>";
                echo sprintf("<div class='bold text-center'> %s </div>", 'Administrator');
                echo "<div class='table-responsive'>";
                    echo "<table class='table'>";

                        echo "<thead>";
                            echo "<tr>";
                                echo sprintf("<th class='bold'> %s </th>", 'Id');
                                echo sprintf("<th class='bold'> %s </th>", 'Name');
                                echo sprintf("<th class='bold'> %s </th>", 'Email');
                                echo sprintf("<th class='bold'> %s </th>", 'Roles');
                                echo sprintf("<th class='bold'> %s </th>", 'Companies');
                                echo sprintf("<th class='bold'> %s </th>", 'Phone');
                                echo sprintf("<th class='bold'> %s </th>", 'Last logged in');
                                echo sprintf("<th class='bold'> %s </th>", 'modified_by');
                                echo sprintf("<th class='bold'> %s </th>", 'created');
                                echo sprintf("<th class='bold'> %s </th>", 'created_by');
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            
                            foreach ($result_Administrators as $item) {
                                echo "<tr>";
                                    $companies = $item->has('company') ? reset($item->company->company_languages)['name'] : '';
                                    $roles = "";
                                    $tmp_roles = array();
                                    foreach ($item->roles as $role) { 
                                        $tmp_roles[] = $role->name;
                                    }

                                    echo sprintf("<td class='blue'> %s </td>", $item->id);  // use sprintf, con noi chuoi thi ko dc
                                    echo sprintf("<td> %s </td>", $item->name);
                                    echo sprintf("<td> %s </td>", $item->email);
                                    echo sprintf("<td> %s </td>", implode(", ", $tmp_roles));
                                    echo sprintf("<td> %s </td>", $companies);
                                    echo sprintf("<td> %s </td>", $item->phone);
                                    echo sprintf("<td> %s </td>", $item->last_logged_in);
                                    echo sprintf("<td> %s </td>", $item->modified_by && !empty($item->modified_by) ? $item->modified_by['name'] : '' );
                                    echo sprintf("<td> %s </td>", $item->created);
                                    echo sprintf("<td> %s </td>", $item->created_by && !empty($item->created_by) ? $item->created_by['name'] : '');
                                echo "</tr>";
                            }
                            
                        echo "</tbody>";
                    echo "</table>";
                echo "</div>";


            echo "</div>";
        ?>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>