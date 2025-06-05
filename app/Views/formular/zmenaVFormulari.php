<?php

$poradiMoznosti = range(1, 10); // Příklad pro 10 závodníků

?>

    <h1>Úprava výsledků etapy</h1>
    <form action="zpracovani.php" method="post">

        <label for="rank">Pořadí:</label>
        <select id="rank" name="rank" required>
            <?php foreach ($poradiMoznosti as $zmenaPoradi): ?>
                <option value="<?php echo $zmenaPoradi; ?>" <?php echo $zmenaPoradi == $rider['rank'] ? 'selected' : ''; ?>>
                    <?php echo $zmenaPoradi; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="first_name">Jméno:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($rider['first_name']); ?>" required><br>

        <label for="last_name">Příjmení:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($rider['last_name']); ?>" required><br>


        <label for="cas">Čas:</label>
        <input type="time" id="cas" name="cas" value="<?php echo htmlspecialchars($rider['time']); ?>" required><br>

        <input type="submit" value="Uložit změny">
    </form>
