<?php
require 'config.php';

echo "<h2>🧪 Тест защиты от SQL-инъекций</h2>";

$malicious = "Анна'); DROP TABLE students; --";

try {
    $stmt = $pdo->prepare("INSERT INTO students (name, group_id) VALUES (:name, :group_id)");
    $stmt->execute(['name' => $malicious, 'group_id' => 1]);

    echo "✅ Инъекция НЕ сработала. Студент добавлен с именем: " . htmlspecialchars($malicious) . "<br>";

    $check = $pdo->query("SELECT COUNT(*) as cnt FROM students")->fetch();
    echo "✅ Таблица students существует. Всего студентов: " . $check['cnt'];
} catch (PDOException $e) {
    echo "❌ Ошибка: " . $e->getMessage();
}
