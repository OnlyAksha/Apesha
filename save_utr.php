<?php
header('Content-Type: application/json');

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);
$utr = $data['utr'] ?? '';
$timestamp = $data['timestamp'] ?? date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];

if (empty($utr)) {
    http_response_code(400);
    die(json_encode(['error' => 'UTR number is required']));
}

// Format log entry
$logEntry = sprintf(
    "[%s] IP: %s | UTR: %s\n",
    $timestamp,
    $ip,
    $utr
);

// Save to file (creates if doesn't exist)
$logFile = 'utr_log.log';
$success = file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);

if ($success !== false) {
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to save UTR']);
}
?>