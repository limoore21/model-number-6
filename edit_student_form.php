<?php
require 'config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
$stmt->execute(['id' => $id]);
$student = $stmt->fetch();

$groups = $pdo->query("SELECT id, name FROM groups")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Редактировать</title></head>
<body>
<h1>✏️ Редактировать студента</h1>
<form method="POST" action="update_student.php">
    <input type="hidden" name="id" value="<?= $student['id'] ?>">
    <label>Имя:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required><br><br>

    <label>Группа:</label><br>
    <select name="group_id" required>
        <?php foreach ($groups as $group): ?>
            <option value="<?= $group['id'] ?>" <?= $group['id'] == $student['group_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($group['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Сохранить</button>
    <a href="index.php">Отмена</a>
</form>
</body>
</html>