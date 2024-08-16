<?php

namespace models;

use core\db\MySQL;
use core\helpers\Response;
use DateTime;
use PDOException;

class StudentAdmissionModel
{
    private $db = null;



    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function setStudentAdmissions($table, $data)
    {
        try {
            $this->db->beginTransaction();

            $sql_student = "INSERT INTO $table (
                year, major, student_name_my, student_name_en, student_ethnicity, student_religion, student_birth_place, 
                student_nationality, student_dob, student_email, student_phone_num, roll_num, matriculation_reg_num, 
                started_year, matriculation_roll_num, matriculation_year, matriculation_exam_center, 
                student_nrc, student_region, student_township, student_current_address, 
                scholarship, status
            ) VALUES (
                :year, :major, :student_name_my, :student_name_en, :student_ethnicity, :student_religion, :student_birth_place, 
                :student_nationality, :student_dob, :student_email, :student_phone_num, :roll_num, :matriculation_reg_num, 
                :started_year, :matriculation_roll_num, :matriculation_year, :matriculation_exam_center, 
                :student_nrc, :student_region, :student_township, :student_current_address, 
                :scholarship, :status
            )";
            $stmt_student = $this->db->prepare($sql_student);

            $student_nrc = $_POST['student_nrc_code'] . $_POST['student_nrc_name'] . $_POST['student_nrc_type'] . $_POST['student_nrc_num'];

            $stmt_student->execute([
                ':year' => $_POST['year'],
                ':major' => $_POST['major'],
                ':student_name_my' => $_POST['student_name_my'],
                ':student_name_en' => $_POST['student_name_en'],
                ':student_ethnicity' => $_POST['student_ethnicity'],
                ':student_religion' => $_POST['student_religion'],
                ':student_birth_place' => $_POST['student_birth_place'],
                ':student_nationality' => $_POST['student_nationality'],
                ':student_dob' => $_POST['student_dob'],
                ':student_email' => $_POST['student_email'],
                ':student_phone_num' => $_POST['student_phone_num'],
                ':roll_num' => $_POST['roll_num'] ?? "",
                ':matriculation_reg_num' => $_POST['matriculation_reg_num'],
                ':started_year' => $_POST['started_year'],
                ':matriculation_roll_num' => $_POST['matriculation_roll_num'],
                ':matriculation_year' => $_POST['matriculation_year'],
                ':matriculation_exam_center' => $_POST['matriculation_exam_center'],
                ':student_nrc' => $student_nrc ?? "",
                ':student_region' => $_POST['student_region'],
                ':student_township' => $_POST['student_township'],
                ':student_current_address' => $_POST['student_current_address'],
                ':scholarship' => $_POST['scholarship'],
                ':status' => 0,
            ]);

            $student_id = $this->db->lastInsertId();

            $sql_parent = "INSERT INTO student_parent_tbl (
                student_id,
                student_fath_name_my, student_fath_name_en, student_fath_ethnicity, 
                student_fath_religion, student_fath_birth_place, student_fath_nationality, 
                student_fath_nrc, student_fath_region, student_fath_township, 
                student_fath_address, student_fath_job, student_fath_phone_num, 
                student_moth_name_my, student_moth_name_en, student_moth_ethnicity, 
                student_moth_religion, student_moth_birth_place, student_moth_nationality, 
                student_moth_nrc, student_moth_region, student_moth_township, 
                student_moth_address, student_moth_job, student_moth_phone_num
            ) VALUES (
                :student_id,
                :student_fath_name_my, :student_fath_name_en, :student_fath_ethnicity, 
                :student_fath_religion, :student_fath_birth_place, :student_fath_nationality, 
                :student_fath_nrc, :student_fath_region, :student_fath_township, 
                :student_fath_address, :student_fath_job, :student_fath_phone_num, 
                :student_moth_name_my, :student_moth_name_en, :student_moth_ethnicity, 
                :student_moth_religion, :student_moth_birth_place, :student_moth_nationality, 
                :student_moth_nrc, :student_moth_region, :student_moth_township, 
                :student_moth_address, :student_moth_job, :student_moth_phone_num
            )";

            $student_fath_nrc = $_POST['student_fath_nrc_code'] . $_POST['student_fath_nrc_name'] . $_POST['student_fath_nrc_type'] . $_POST['student_fath_nrc_num'];
            $student_moth_nrc = $_POST['student_moth_nrc_code'] . $_POST['student_moth_nrc_name'] . $_POST['student_moth_nrc_type'] . $_POST['student_moth_nrc_num'];

            $stmt_parent = $this->db->prepare($sql_parent);
            $stmt_parent->execute([
                ':student_id' => $student_id,
                ':student_fath_name_my' => $_POST['student_fath_name_my'],
                ':student_fath_name_en' => $_POST['student_fath_name_en'],
                ':student_fath_ethnicity' => $_POST['student_fath_ethnicity'],
                ':student_fath_religion' => $_POST['student_fath_religion'],
                ':student_fath_birth_place' => $_POST['student_fath_birth_place'],
                ':student_fath_nationality' => $_POST['student_fath_nationality'],
                ':student_fath_nrc' => $student_fath_nrc,
                ':student_fath_region' => $_POST['student_fath_region'],
                ':student_fath_township' => $_POST['student_fath_township'],
                ':student_fath_address' => $_POST['student_fath_address'],
                ':student_fath_job' => $_POST['student_fath_job'],
                ':student_fath_phone_num' => $_POST['student_fath_phone_num'],
                ':student_moth_name_my' => $_POST['student_moth_name_my'],
                ':student_moth_name_en' => $_POST['student_moth_name_en'],
                ':student_moth_ethnicity' => $_POST['student_moth_ethnicity'],
                ':student_moth_religion' => $_POST['student_moth_religion'],
                ':student_moth_birth_place' => $_POST['student_moth_birth_place'],
                ':student_moth_nationality' => $_POST['student_moth_nationality'],
                ':student_moth_nrc' => $student_moth_nrc,
                ':student_moth_region' => $_POST['student_moth_region'],
                ':student_moth_township' => $_POST['student_moth_township'],
                ':student_moth_address' => $_POST['student_moth_address'],
                ':student_moth_job' => $_POST['student_moth_job'],
                ':student_moth_phone_num' => $_POST['student_moth_phone_num']
            ]);

            $sql_guardian = "INSERT INTO student_guardian_tbl (
                student_id,
                guardian_name,
                guardian_relation,
                guardian_job,
                guardian_address,
                guardian_phone_num
            ) VALUES (
                :student_id,
                :guardian_name,
                :guardian_relation,
                :guardian_job,
                :guardian_address,
                :guardian_phone_num
            )";
            $stmt_guardian = $this->db->prepare($sql_guardian);
            $stmt_guardian->execute([
                ':student_id' => $student_id,
                ':guardian_name' => $_POST['guardian_name'],
                ':guardian_relation' => $_POST['guardian_relation'],
                ':guardian_job' => $_POST['guardian_job'],
                ':guardian_address' => $_POST['guardian_address'],
                ':guardian_phone_num' => $_POST['guardian_phone_num'],
            ]);

            // Create a directory for the student if it doesn't exist
            $uploadDir = '../uploads/' . $student_id . '/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Function to upload a file
            function uploadFile($fileInput, $uploadDir)
            {
                if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] == 0) {
                    $fileName = basename($_FILES[$fileInput]['name']);
                    $targetFile = $uploadDir . $fileName;

                    if (move_uploaded_file($_FILES[$fileInput]['tmp_name'], $targetFile)) {
                        return $fileName;  // Return the file name only
                    } else {
                        echo "Error from upload file fn: $fileName";
                        return null;
                    }
                }
                return null;
            }

            // Upload files
            $passportPhoto = uploadFile('passport_photo', $uploadDir);
            $oneInchPhoto = uploadFile('one_inch_photo', $uploadDir);
            $studentNrcPhotoFront = uploadFile('student_nrc_photo_front', $uploadDir);
            $studentNrcPhotoBack = uploadFile('student_nrc_photo_back', $uploadDir);
            $fathNrcPhotoFront = uploadFile('fath_nrc_photo_front', $uploadDir);
            $fathNrcPhotoBack = uploadFile('fath_nrc_photo_back', $uploadDir);
            $mothNrcPhotoFront = uploadFile('moth_nrc_photo_front', $uploadDir);
            $mothNrcPhotoBack = uploadFile('moth_nrc_photo_back', $uploadDir);
            $covidPhoto = uploadFile('covid_photo', $uploadDir);
            $matriculationCertificate = uploadFile('matriculation_certificate', $uploadDir);
            $matriculationMarkPhoto = uploadFile('matriculation_mark_photo', $uploadDir);
            $houseRegistrationPhotoFront = uploadFile('house_registration_photo_front', $uploadDir);
            $houseRegistrationPhotoBack = uploadFile('house_registration_photo_back', $uploadDir);
            $quarterApprovedLetter = uploadFile('quarter_approved_letter', $uploadDir);
            $policeApprovedLetter = uploadFile('police_approved_letter', $uploadDir);
            $paymentScreenshot = uploadFile('payment_screenshot', $uploadDir);

            // SQL query
            $sql_file = "INSERT INTO student_admission_required_file_tbl (
                student_id, passport_photo, one_inch_photo, student_nrc_photo_front,
                student_nrc_photo_back, fath_nrc_photo_front, fath_nrc_photo_back,
                moth_nrc_photo_front, moth_nrc_photo_back, covid_photo, 
                matriculation_certificate, matriculation_mark_photo, house_registration_photo_front,
                house_registration_photo_back, quarter_approved_letter, police_approved_letter,
                payment_screenshot
            ) VALUES (
                :student_id, :passport_photo, :one_inch_photo, :student_nrc_photo_front, 
                :student_nrc_photo_back, :fath_nrc_photo_front, :fath_nrc_photo_back, 
                :moth_nrc_photo_front, :moth_nrc_photo_back, :covid_photo, 
                :matriculation_certificate, :matriculation_mark_photo, :house_registration_photo_front, 
                :house_registration_photo_back, :quarter_approved_letter, :police_approved_letter, 
                :payment_screenshot
)";

            // Prepare and execute the statement
            $stmt = $this->db->prepare($sql_file);
            $stmt->execute([
                ':student_id' => $student_id,
                ':passport_photo' => $passportPhoto,
                ':one_inch_photo' => $oneInchPhoto,
                ':student_nrc_photo_front' => $studentNrcPhotoFront,
                ':student_nrc_photo_back' => $studentNrcPhotoBack,
                ':fath_nrc_photo_front' => $fathNrcPhotoFront,
                ':fath_nrc_photo_back' => $fathNrcPhotoBack,
                ':moth_nrc_photo_front' => $mothNrcPhotoFront,
                ':moth_nrc_photo_back' => $mothNrcPhotoBack,
                ':covid_photo' => $covidPhoto,
                ':matriculation_certificate' => $matriculationCertificate,
                ':matriculation_mark_photo' => $matriculationMarkPhoto,
                ':house_registration_photo_front' => $houseRegistrationPhotoFront,
                ':house_registration_photo_back' => $houseRegistrationPhotoBack,
                ':quarter_approved_letter' => $quarterApprovedLetter,
                ':police_approved_letter' => $policeApprovedLetter,
                ':payment_screenshot' => $paymentScreenshot
            ]);
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            echo "Failed to register student: " . $e->getMessage();
            return $e->getMessage();
        }
    }
}
