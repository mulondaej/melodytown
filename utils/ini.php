<?php 
// Email Settings
ini_set('SMTP', 'live.smtp.mailtrap.io');
ini_set('smtp_port', 587);
ini_set('sendmail_from', 'mailtrap@kibongatsho.fr');

// Error Handling
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', '/path/to/error/log');

// File Uploads
ini_set('file_uploads', 'On');
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '20M');

// Sessions
ini_set('session.save_path', '/tmp');
ini_set('session.cookie_lifetime', '86400');

// Maximum Input Variables
ini_set('max_input_vars', '1000');

// Date and Time
ini_set('date.timezone', 'Your/Timezone');

?>