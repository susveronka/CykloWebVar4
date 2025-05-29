<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>">
    <title>Závody</title>
</head>

<body>
    <div class="container">
        <h1> La Tropicale Amissa Bongo </h1>
        <?php
            $table = new \CodeIgniter\View\Table();
            $table->setHeading('Ročník', "Délka", "Začátek", "Konec" );
            
            foreach($race_year as $row) {
                $soucetDelky = 0;
                foreach($stage as $etapy) {
                    $soucetDelky += $etapy->distance;
                }
                $table->addRow(anchor("soupisEtap/".$row->id ,$row->year), $soucetDelky, $row->start_date, $row->end_date );
            }

            $template = array(
                'table_open'=> '<table class="table table-bordered">',
                'thead_open'=> '<thead>',
                'thead_close'=> '</thead>',
                'heading_row_start'=> '<tr>',
                'heading_row_end'=>' </tr>',
                'heading_cell_start'=> '<th>',
                'heading_cell_end' => '</th>',
                'tbody_open' => '<tbody>',
                'tbody_close' => '</tbody>',
                'row_start' => '<tr>',
                'row_end'  => '</tr>',
                'cell_start' => '<td>',
                'cell_end' => '</td>',
                'row_alt_start' => '<tr>',
                'row_alt_end' => '</tr>',
                'cell_alt_start' => '<td>',
                'cell_alt_end' => '</td>',
                'table_close' => '</table>'
                );
                
                $table->setTemplate($template);

            echo $table->generate();
        ?>
    </div>

    <style>
    /* Reset a základní styl */
body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Styl tabulky */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

h1 {
    color: #0077cc;
    margin-bottom: 20px;
}
table th, table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
}

table th {
    background-color: #f0f0f0;
    font-weight: bold;
}

/* Styl tlačítek */
.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0077cc;
    color: white;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #005fa3;
}

.button:active {
    background-color: #004e88;
}

/* Responsivní tabulka */
@media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }

    thead tr {
        display: none;
    }

    tr {
        margin-bottom: 10px;
        background-color: #fff;
        padding: 10px;
        border: 1px solid #ddd;
    }

    td {
        padding-left: 50%;
        position: relative;
    }

    td::before {
        position: absolute;
        top: 12px;
        left: 15px;
        width: 45%;
        white-space: nowrap;
        font-weight: bold;
        content: attr(data-label);
    }
}

</style>
</body>
</html>