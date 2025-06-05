<?php
// zmenaVFormulari.php

// Předpokládáme, že data závodníka jsou načtena z databáze


// Možnosti pro pořadí
$poradiMoznosti = range(1, 10); // Příklad pro 10 závodníků

?>

    <h1>Úprava výsledků etapy</h1>
    <form action="zpracovani.php" method="post">

        <label for="rank">Pořadí:</label>
        <select id="rank" name="rank" required>
            <?php foreach ($poradiMoznosti as $zmenaPoradi): ?>
                <option value="<?php echo $zmenaPoradi; ?>" <?php echo $zmenaPoradi == $zavodnik['rank'] ? 'selected' : ''; ?>>
                    <?php echo $zmenaPoradi; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="name_link">Jméno:</label>
        <input type="text" id="name_link" name="name_link" value="<?php echo htmlspecialchars($zavodnik['name_link']); ?>" required><br>

        <label for="cas">Čas:</label>
        <input type="time" id="cas" name="cas" value="<?php echo htmlspecialchars($zavodnik['time']); ?>" required><br>

        <input type="submit" value="Uložit změny">
    </form>
