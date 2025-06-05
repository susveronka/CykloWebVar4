<?php
// zmenaVFormulari.php

// Předpokládáme, že data závodníka jsou načtena z databáze
$zavodnik = [
    'jmeno' => 'Jan',
    'prijmeni' => 'Novak',
    'cas' => '01:30:00',
    'poradi' => 1
];

// Možnosti pro pořadí
$poradiMoznosti = range(1, 10); // Příklad pro 10 závodníků

?>

    <h1>Úprava výsledků etapy</h1>
    <form action="zpracovani.php" method="post">
        <label for="jmeno">Jméno:</label>
        <input type="text" id="jmeno" name="jmeno" value="<?php echo htmlspecialchars($zavodnik['jmeno']); ?>" required><br>

        <label for="prijmeni">Příjmení:</label>
        <input type="text" id="prijmeni" name="prijmeni" value="<?php echo htmlspecialchars($zavodnik['prijmeni']); ?>" required><br>

        <label for="cas">Čas:</label>
        <input type="time" id="cas" name="cas" value="<?php echo htmlspecialchars($zavodnik['cas']); ?>" required><br>

        <label for="poradi">Pořadí:</label>
        <select id="poradi" name="poradi" required>
            <?php foreach ($poradiMoznosti as $zmenaPoradi): ?>
                <option value="<?php echo $zmenaPoradi; ?>" <?php echo $zmenaPoradi == $zavodnik['poradi'] ? 'selected' : ''; ?>>
                    <?php echo $zmenaPoradi; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" value="Uložit změny">
    </form>
