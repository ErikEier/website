<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? preg_replace('/[^a-zA-Z0-9_-]/', '_', $_POST['name']) : 'unknown';
    $dateTime = date('Y-m-d_H-i-s');
    $fileName = "{$name}_{$dateTime}.txt";
    
    $data = "";
    foreach ($_POST as $key => $value) {
        $data .= "$key: $value\n";
    }
    
    $filePath = "saved_files/{$fileName}";
    file_put_contents($filePath, $data);
    echo "Data saved successfully as $filePath.";
} else {
    echo "Invalid request.";
}
?>
