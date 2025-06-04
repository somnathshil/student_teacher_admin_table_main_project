<?php
include("config.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load PHPMailer via Composer

// Sanitize user input
$emailOrPhone = $_REQUEST['emailOrPhone'];
$userType = $_REQUEST['user_type'];

// Fetch user

if($userType === ""){
    echo "<script>alert('You have not selected User Type')</script>";
    echo "<script>window.location.href='forgotPass.php'</script>";
}else{
    if($userType === "ADMIN"){
        $sql = "SELECT * FROM `admin` WHERE `admin_email`='$emailOrPhone' OR `admin_phone`='$emailOrPhone'";
         $data = $conn->query($sql);

          $res = $data->fetch_assoc();
          $userEmail = $res['admin_email'];
          $userId = $res['admin_id'];
    }else{
            if($userType === "TEACHER"){
                $sql = "SELECT * FROM `teacher` WHERE `teacher_email`='$emailOrPhone' OR `teacher_phone`='$emailOrPhone'";
             $data = $conn->query($sql);

              $res = $data->fetch_assoc();
              $userEmail = $res['teacher_email'];
              $userId = $res['teacher_id'];

                  }else{
                        
                     $sql = "SELECT * FROM `student` WHERE `stu_email`='$emailOrPhone' OR `stu_phone`='$emailOrPhone'";
                    $data = $conn->query($sql);

                    $res = $data->fetch_assoc();
                    $userEmail = $res['stu_email'];
                    $userId = $res['stu_id'];
                          
                }
    }
}


// Check if user exists
if ($data->num_rows<=0) {
    echo "<script>alert('No user found'); window.location.href='forgotPass.php';</script>";
    exit;
}

$toEmail = $userEmail;
$OTP = rand(1000, 9999);

// Save OTP in session
$_SESSION['OTP'] = $OTP;
$_SESSION['user_id'] = $userId;
$_SESSION['user_type'] = $userType;
$_SESSION['time'] = time();

// Your Gmail credentials (with App Password)
$fromEmail = 'somnathshil23@gmail.com';        // Replace with your Gmail address
$fromName = 'Somnath_st_tea_adm_app';
$smtpUsername = 'somnathshil23@gmail.com';     // Same as fromEmail
$smtpPassword = 'mzcezxzcdhomoeow';     // Use the 16-character App Password (no spaces)

$mail = new PHPMailer(true);

try {
    // SMTP config
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUsername;
    $mail->Password   = $smtpPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Email content
    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($toEmail);
    $mail->Subject = 'Your OTP Code';
    $mail->Body    = "Your OTP code is: $OTP";

    $mail->send();
    echo "<script>alert('OTP sent to $toEmail successfully!')</script>";
    echo "<script>window.location.href='otp_input.php'</script>";
} catch (Exception $e) {
    echo "<script>alert('OTP not sent. Error: " . $mail->ErrorInfo . "')</script>";
    echo "<script>window.location.href='forgotPass.php'</script>";
}
?>
