
    <title>Závody</title>
    <div class="container">
        <?= $this->extend('layout/layout'); ?>

<?= $this->section("obsah"); ?>
        <h2> La Tropicale Amissa Bongo </h2>
        <?php
            $table = new \CodeIgniter\View\Table();
            $table->setHeading('Ročník', "Délka", "Začátek", "Konec" );
            
            foreach($race_year as $row) {
                $soucetDelky = 0;
                foreach($stage as $etapy) {
                    if ($etapy->id_race_year == $row->id) {
                        $soucetDelky += $etapy->distance;
                    }
                }
                $table->addRow(anchor('soupisEtap/'.$row->id, $row->year), $soucetDelky." m", $row->start_date, $row->end_date );
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

    <?= $this->endSection(); ?>
