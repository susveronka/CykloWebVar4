<?= $this->extend('layout/layout'); ?>

<?= $this->section("obsah"); ?>
    <div class="container">
        <h1> Etapa <?= $stage[0]->number ?> </h1>
        <?php
            $table = new \CodeIgniter\View\Table();
            $table->setHeading('Start', "Cíl", "Datum", "Délka");
            
            foreach($stage as $row) {
                $table->addRow($row->departure, $row->arrival, $row->date, $row->distance." m");
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

            <h1> Výsledky prvních 10 závodníků </h1>
            <?php
            $vysledkyEtapy = new \CodeIgniter\View\Table();
            $vysledkyEtapy->setHeading("Umístění", 'Jméno', "Čas", "");
            
            foreach ($result as $row) {

                $uprava = anchor(
                    'formular/zmenaVFormulari/'.$row->id,
                    'Upravit',
                    ['class' => 'btn btn-warning btn-sm']
                );

                if ($row->rank >= 1 && $row->rank <= 10 && $row->type_result == 1) {
                    $jmeno = str_replace('-', ' ', explode('/', $row->name_link)[1]);
                    $vysledkyEtapy->addRow($row->rank.".", $jmeno, $row->time, $uprava);
                }
            }

            $template2 = array(
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
                
                $vysledkyEtapy->setTemplate($template2);

            echo $vysledkyEtapy->generate();
        ?>
    </div>
    <?= $this->endSection(); ?>
