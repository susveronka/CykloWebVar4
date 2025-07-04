<h1>Úprava výsledků etapy</h1>
<form action="<?= base_url('formular/zmena') ?>" method="post">

    <input type="hidden" name="idResult" value="<?= htmlspecialchars($rider->id ?? '') ?>">

    <label for="rank">Pořadí:</label>
    <select id="rank" name="rank" required>
        <option value="">Vyberte pořadí</option>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <option value="<?= $i ?>" <?= (isset($rider->rank) && $rider->rank == $i) ? 'selected' : '' ?>>
                <?= $i ?>
            </option>
        <?php endfor; ?>
    </select><br>

    <label for="first_name">Jméno:</label>
    <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($rider->first_name ?? '') ?>" required><br>

    <label for="last_name">Příjmení:</label>
    <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($rider->last_name ?? '') ?>" required><br>

    <label for="cas">Čas:</label>
    <input type="text" id="cas" name="cas" value="<?= htmlspecialchars($rider->time ?? '') ?>" required><br>

    <input type="submit" value="Uložit změny">
</form>
