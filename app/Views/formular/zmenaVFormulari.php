<?php



?>

    <h1>Úprava výsledků etapy</h1>
    <form action="zmena" method="post">

    <label for="rank">Pořadí:</label>
    <input type="text" id="rank" name="rank" value="<?php echo htmlspecialchars($rider['rank']); ?>" required><br>


        <label for="first_name">Jméno:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($rider['first_name']); ?>" required><br>

        <label for="last_name">Příjmení:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($rider['last_name']); ?>" required><br>


        <label for="cas">Čas:</label>
        <input type="time" id="cas" name="cas" value="<?php echo htmlspecialchars($rider['time']); ?>" required><br>

        <input type="submit" value="Uložit změny">
    </form>
