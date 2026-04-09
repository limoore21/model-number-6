<?php
require 'config.php';

try {
    $stmt = $pdo->query("
        SELECT students.id, students.name, groups.name AS group_name
        FROM students
        LEFT JOIN groups ON students.group_id = groups.id
        ORDER BY students.name
    ");
    $students = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Ошибка запроса: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Студенты</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .actions a { margin-right: 10px; text-decoration: none; }
    </style>
</head>
<body>
<h1>📚 Список студентов</h1>

<a href="add_student_form.php">➕ Добавить студента</a> |
<a href="schedule.php">📅 Расписание</a>

<table>
    <tr><th>ID</th><th>Имя</th><th>Группа</th><th>Действия</th></tr>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= htmlspecialchars($student['name']) ?></td>
            <td><?= $student['group_name'] ?? '—' ?></td>
            <td class="actions">
                <a href="edit_student_form.php?id=<?= $student['id'] ?>">✏️</a>
                <a href="delete_student.php?id=<?= $student['id'] ?>"
                   onclick="return confirm('Удалить студента?')">🗑️</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>