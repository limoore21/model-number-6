<?php
require 'config.php';
$groups = $pdo->query("SELECT id, name FROM groups")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Добавить студента</title></head>
<body>
<h1>➕ Добавить студента</h1>
<form method="POST" action="add_student.php">
    <label>Имя:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Группа:</label><br>
    <select name="group_id" required>
        <option value="">Выберите</option>
        <?php foreach ($groups as $group): ?>
            <option value="<?= $group['id'] ?>"><?= htmlspecialchars($group['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Добавить</button>
    <a href="index.php">Отмена</a>
</form>
</body>
</html>