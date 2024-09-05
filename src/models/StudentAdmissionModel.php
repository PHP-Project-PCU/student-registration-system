<?php

namespace models;

use core\db\MySQL;
use PDOException;
use PDO;

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

            $student_nrc = $data['student_nrc_code'] . "/" . $data['student_nrc_name'] . $data['student_nrc_type'] . $data['student_nrc_num'];

            $stmt_student->execute([
                ':year' => $data['year'],
                ':major' => $data['major'],
                ':student_name_my' => $data['student_name_my'],
                ':student_name_en' => $data['student_name_en'],
                ':student_ethnicity' => $data['student_ethnicity'],
                ':student_religion' => $data['student_religion'],
                ':student_birth_place' => $data['student_birth_place'],
                ':student_nationality' => $data['student_nationality'],
                ':student_dob' => $data['student_dob'],
                ':student_email' => $data['student_email'],
                ':student_phone_num' => $data['student_phone_num'],
                ':roll_num' => $data['roll_num'] ?? "",
                ':matriculation_reg_num' => $data['matriculation_reg_num'],
                ':started_year' => $data['started_year'],
                ':matriculation_roll_num' => $data['matriculation_roll_num'],
                ':matriculation_year' => $data['matriculation_year'],
                ':matriculation_exam_center' => $data['matriculation_exam_center'],
                ':student_nrc' => $student_nrc ?? "",
                ':student_region' => $data['student_region'],
                ':student_township' => $data['student_township'],
                ':student_current_address' => $data['student_current_address'],
                ':scholarship' => $data['scholarship'],
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

            $student_fath_nrc = $data['student_fath_nrc_code'] . "/" . $data['student_fath_nrc_name'] . $data['student_fath_nrc_type'] . $data['student_fath_nrc_num'];
            $student_moth_nrc = $data['student_moth_nrc_code'] . "/" . $data['student_moth_nrc_name'] . $data['student_moth_nrc_type'] . $data['student_moth_nrc_num'];

            $stmt_parent = $this->db->prepare($sql_parent);
            $stmt_parent->execute([
                ':student_id' => $student_id,
                ':student_fath_name_my' => $data['student_fath_name_my'],
                ':student_fath_name_en' => $data['student_fath_name_en'],
                ':student_fath_ethnicity' => $data['student_fath_ethnicity'],
                ':student_fath_religion' => $data['student_fath_religion'],
                ':student_fath_birth_place' => $data['student_fath_birth_place'],
                ':student_fath_nationality' => $data['student_fath_nationality'],
                ':student_fath_nrc' => $student_fath_nrc,
                ':student_fath_region' => $data['student_fath_region'],
                ':student_fath_township' => $data['student_fath_township'],
                ':student_fath_address' => $data['student_fath_address'],
                ':student_fath_job' => $data['student_fath_job'],
                ':student_fath_phone_num' => $data['student_fath_phone_num'],
                ':student_moth_name_my' => $data['student_moth_name_my'],
                ':student_moth_name_en' => $data['student_moth_name_en'],
                ':student_moth_ethnicity' => $data['student_moth_ethnicity'],
                ':student_moth_religion' => $data['student_moth_religion'],
                ':student_moth_birth_place' => $data['student_moth_birth_place'],
                ':student_moth_nationality' => $data['student_moth_nationality'],
                ':student_moth_nrc' => $student_moth_nrc,
                ':student_moth_region' => $data['student_moth_region'],
                ':student_moth_township' => $data['student_moth_township'],
                ':student_moth_address' => $data['student_moth_address'],
                ':student_moth_job' => $data['student_moth_job'],
                ':student_moth_phone_num' => $data['student_moth_phone_num']
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
                ':guardian_name' => $data['guardian_name'],
                ':guardian_relation' => $data['guardian_relation'],
                ':guardian_job' => $data['guardian_job'],
                ':guardian_address' => $data['guardian_address'],
                ':guardian_phone_num' => $data['guardian_phone_num'],
            ]);

            // Create a directory for the student if it doesn't exist
            $uploadDir = 'C:\xampp\htdocs\student-registration-system\www\utils\uploads\admission/' . $student_id . '/';
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
    public function setStudentAdmissionsByStatus($table, $data)
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

            $student_nrc = $data['student_nrc_code'] . "/" . $data['student_nrc_name'] . $data['student_nrc_type'] . $data['student_nrc_num'];

            $stmt_student->execute([
                ':year' => $data['year'],
                ':major' => $data['major'],
                ':student_name_my' => $data['student_name_my'],
                ':student_name_en' => $data['student_name_en'],
                ':student_ethnicity' => $data['student_ethnicity'],
                ':student_religion' => $data['student_religion'],
                ':student_birth_place' => $data['student_birth_place'],
                ':student_nationality' => $data['student_nationality'],
                ':student_dob' => $data['student_dob'],
                ':student_email' => $data['student_email'],
                ':student_phone_num' => $data['student_phone_num'],
                ':roll_num' => $data['roll_num'] ?? "",
                ':matriculation_reg_num' => $data['matriculation_reg_num'],
                ':started_year' => $data['started_year'],
                ':matriculation_roll_num' => $data['matriculation_roll_num'],
                ':matriculation_year' => $data['matriculation_year'],
                ':matriculation_exam_center' => $data['matriculation_exam_center'],
                ':student_nrc' => $student_nrc ?? "",
                ':student_region' => $data['student_region'],
                ':student_township' => $data['student_township'],
                ':student_current_address' => $data['student_current_address'],
                ':scholarship' => $data['scholarship'],
                ':status' => 2,
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

            $student_fath_nrc = $data['student_fath_nrc_code'] . "/" . $data['student_fath_nrc_name'] . $data['student_fath_nrc_type'] . $data['student_fath_nrc_num'];
            $student_moth_nrc = $data['student_moth_nrc_code'] . "/" . $data['student_moth_nrc_name'] . $data['student_moth_nrc_type'] . $data['student_moth_nrc_num'];

            $stmt_parent = $this->db->prepare($sql_parent);
            $stmt_parent->execute([
                ':student_id' => $student_id,
                ':student_fath_name_my' => $data['student_fath_name_my'],
                ':student_fath_name_en' => $data['student_fath_name_en'],
                ':student_fath_ethnicity' => $data['student_fath_ethnicity'],
                ':student_fath_religion' => $data['student_fath_religion'],
                ':student_fath_birth_place' => $data['student_fath_birth_place'],
                ':student_fath_nationality' => $data['student_fath_nationality'],
                ':student_fath_nrc' => $student_fath_nrc,
                ':student_fath_region' => $data['student_fath_region'],
                ':student_fath_township' => $data['student_fath_township'],
                ':student_fath_address' => $data['student_fath_address'],
                ':student_fath_job' => $data['student_fath_job'],
                ':student_fath_phone_num' => $data['student_fath_phone_num'],
                ':student_moth_name_my' => $data['student_moth_name_my'],
                ':student_moth_name_en' => $data['student_moth_name_en'],
                ':student_moth_ethnicity' => $data['student_moth_ethnicity'],
                ':student_moth_religion' => $data['student_moth_religion'],
                ':student_moth_birth_place' => $data['student_moth_birth_place'],
                ':student_moth_nationality' => $data['student_moth_nationality'],
                ':student_moth_nrc' => $student_moth_nrc,
                ':student_moth_region' => $data['student_moth_region'],
                ':student_moth_township' => $data['student_moth_township'],
                ':student_moth_address' => $data['student_moth_address'],
                ':student_moth_job' => $data['student_moth_job'],
                ':student_moth_phone_num' => $data['student_moth_phone_num']
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
                ':guardian_name' => $data['guardian_name'],
                ':guardian_relation' => $data['guardian_relation'],
                ':guardian_job' => $data['guardian_job'],
                ':guardian_address' => $data['guardian_address'],
                ':guardian_phone_num' => $data['guardian_phone_num'],
            ]);

            // Create a directory for the student if it doesn't exist
            $uploadDir = 'C:\xampp\htdocs\student-registration-system\www\utils\uploads\admission/' . $student_id . '/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Function to upload a file
            function uploadFiles($fileInput, $uploadDir)
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
            $passportPhoto = uploadFiles('passport_photo', $uploadDir);
            $oneInchPhoto = uploadFiles('one_inch_photo', $uploadDir);
            $studentNrcPhotoFront = uploadFiles('student_nrc_photo_front', $uploadDir);
            $studentNrcPhotoBack = uploadFiles('student_nrc_photo_back', $uploadDir);
            $fathNrcPhotoFront = uploadFiles('fath_nrc_photo_front', $uploadDir);
            $fathNrcPhotoBack = uploadFiles('fath_nrc_photo_back', $uploadDir);
            $mothNrcPhotoFront = uploadFiles('moth_nrc_photo_front', $uploadDir);
            $mothNrcPhotoBack = uploadFiles('moth_nrc_photo_back', $uploadDir);
            $covidPhoto = uploadFiles('covid_photo', $uploadDir);
            $matriculationCertificate = uploadFiles('matriculation_certificate', $uploadDir);
            $matriculationMarkPhoto = uploadFiles('matriculation_mark_photo', $uploadDir);
            $houseRegistrationPhotoFront = uploadFiles('house_registration_photo_front', $uploadDir);
            $houseRegistrationPhotoBack = uploadFiles('house_registration_photo_back', $uploadDir);
            $quarterApprovedLetter = uploadFiles('quarter_approved_letter', $uploadDir);
            $policeApprovedLetter = uploadFiles('police_approved_letter', $uploadDir);
            $paymentScreenshot = uploadFiles('payment_screenshot', $uploadDir);

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

    public function setOldStudentAdmissions($id, $data, $files)
    {
        try {
            $this->db->beginTransaction();
            // list($major, $scholarship, $passport_photo, $one_inch_photo, $covid_photo, $quarter_approved_letter, $police_approved_letter, $payment_screenshot) = $data;
            $major = $data['major'];
            $scholarship = $data['scholarship'];
            // $passport_photo = $files['passport_photo'];
            // $one_inch_photo = $files['one_inch_photo'];
            // $covid_photo = $files['covid_photo'];
            // $quarter_approved_letter = $files['quarter_approved_letter'];
            // $police_approved_letter = $files['police_approved_letter'];
            // $payment_screenshot = $files['payment_screenshot'];

            $student_sql = "UPDATE student_tbl SET
            year= year+1,
            status=3,
            major=:major,scholarship=:scholarship WHERE id=:id";
            $stmt = $this->db->prepare($student_sql);
            $stmt->execute([
                ":major" => $major,
                ":scholarship" => $scholarship,
                ":id" => $id
            ]);

            // Create a directory for the student if it doesn't exist
            $uploadDir = 'C:\xampp\htdocs\student-registration-system\www\utils\uploads\admission/' . $id . '/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Function to upload a file
            function uploadFiless($fileInput, $uploadDir)
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
            } // Upload files
            $passportPhoto = uploadFiless('passport_photo', $uploadDir);
            $oneInchPhoto = uploadFiless('one_inch_photo', $uploadDir);
            $covidPhoto = uploadFiless('covid_photo', $uploadDir);
            $quarterApprovedLetter = uploadFiless('quarter_approved_letter', $uploadDir);
            $policeApprovedLetter = uploadFiless('police_approved_letter', $uploadDir);
            $paymentScreenshot = uploadFiless('payment_screenshot', $uploadDir);

            $file_sql = "UPDATE student_admission_required_file_tbl
            SET passport_photo=:passport_photo, one_inch_photo=:one_inch_photo,
                covid_photo=:covid_photo,quarter_approved_letter=:quarter_approved_letter,
                police_approved_letter=:police_approved_letter,payment_screenshot=:payment_screenshot
            WHERE student_id=:id";
            $stmt = $this->db->prepare($file_sql);
            $stmt->execute([
                ":passport_photo" => $passportPhoto,
                ":one_inch_photo" => $oneInchPhoto,
                ":covid_photo" => $covidPhoto,
                ":quarter_approved_letter" => $quarterApprovedLetter,
                ":police_approved_letter" => $policeApprovedLetter,
                ":payment_screenshot" => $paymentScreenshot,
                ":id" => $id

            ]);

            $semester_sql = "UPDATE student_section_tbl SET
            semester_id= semester_id + 1
            WHERE student_id=:id";
            $stmt = $this->db->prepare($semester_sql);
            $stmt->execute([
                ":id" => $id
            ]);

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return $e->getMessage();
        }
    }
    public function getAllStudentsByStatusAndYear($studentTbl, $status, $year, $academicYear, $page, $limit)
    {
        try {
            $offset = ($page - 1) * $limit;
            if ($status == 1) {
                // get approved students
                $sql = "SELECT id, matriculation_reg_num, student_name_my, student_nrc
                FROM $studentTbl 
                WHERE status = 1 AND year = :year AND year(created_at) = :academicYear
                ORDER BY matriculation_reg_num ASC 
                LIMIT :limit OFFSET :offset";
            } elseif ($status == 2) {
                // get unapprove credit transfer students
                $sql = "SELECT id, matriculation_reg_num, student_name_my, student_nrc
                FROM $studentTbl 
                WHERE status=2 AND year = :year AND year(created_at) = :academicYear
                ORDER BY matriculation_reg_num ASC 
                LIMIT :limit OFFSET :offset";
            } else {
                // get unapprove students
                $sql = "SELECT id, matriculation_reg_num, student_name_my, student_nrc
                FROM $studentTbl 
                WHERE (status = 0 or status=3) AND year = :year AND year(created_at) = :academicYear
                ORDER BY matriculation_reg_num ASC 
                LIMIT :limit OFFSET :offset";
            }

            $stmt = $this->db->prepare($sql);
            // $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":year", $year, PDO::PARAM_INT);
            $stmt->bindParam(":academicYear", $academicYear, PDO::PARAM_INT);
            $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
            $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array_values($data);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function getStudentById($studentId)
    {
        try {
            // Prepare SQL to get student details
            $sql_student = "SELECT * FROM student_tbl WHERE id = :student_id";
            $stmt_student = $this->db->prepare($sql_student);
            $stmt_student->execute([':student_id' => $studentId]);
            $student = $stmt_student->fetch(PDO::FETCH_ASSOC);

            if (!$student) {
                return null;  // No student found with the given ID
            }

            // Prepare SQL to get parent details
            $sql_parent = "SELECT * FROM student_parent_tbl WHERE student_id = :student_id";
            $stmt_parent = $this->db->prepare($sql_parent);
            $stmt_parent->execute([':student_id' => $studentId]);
            $parent = $stmt_parent->fetch(PDO::FETCH_ASSOC);

            // Prepare SQL to get guardian details
            $sql_guardian = "SELECT * FROM student_guardian_tbl WHERE student_id = :student_id";
            $stmt_guardian = $this->db->prepare($sql_guardian);
            $stmt_guardian->execute([':student_id' => $studentId]);
            $guardian = $stmt_guardian->fetch(PDO::FETCH_ASSOC);

            // Prepare SQL to get required files
            $sql_files = "SELECT * FROM student_admission_required_file_tbl WHERE student_id = :student_id";
            $stmt_files = $this->db->prepare($sql_files);
            $stmt_files->execute([':student_id' => $studentId]);
            $files = $stmt_files->fetch(PDO::FETCH_ASSOC);

            // Combine all information into one array
            $studentData = [
                'student' => $student,
                'parent' => $parent,
                'guardian' => $guardian,
                'files' => $files
            ];

            return $studentData;
        } catch (PDOException $e) {
            echo "Failed to retrieve student data: " . $e->getMessage();
            return null;
        }
    }

    public function getTotalRows($table, $year, $status)
    {
        try {
            if ($year && $status == 1) {
                $query = "SELECT COUNT(*) as total FROM $table WHERE year = :year AND status=1";
            } elseif ($year && $status == 0) {
                $query = "SELECT COUNT(*) as total FROM $table WHERE year = :year AND (status=0 OR status=3)";
            } elseif ($year && $status == 2) {
                $query = "SELECT COUNT(*) as total FROM $table WHERE year = :year AND status=2";
            } else {
                $query = "SELECT COUNT(*) as total FROM $table";
                $statement = $this->db->prepare($query);
            }
            $statement = $this->db->prepare($query);
            $statement->bindParam(':year', $year);
            // $statement->bindParam(':status', $status);
            $statement->execute();
            $result = $statement->fetch();
            return $result->total;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function approveFresher($studentTbl, $studentAuthTbl, $data)
    {
        try {
            $this->db->beginTransaction();
            $sql = "UPDATE $studentTbl SET status=:status, roll_num=:roll_num
        WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ":status" => 1,
                ":roll_num" => $data['roll_num'],
                ":id" => $data['id'],
            ]);
            $sql = "INSERT INTO $studentAuthTbl(
            student_id,edu_mail,password) 
            VALUES(
            :student_id,:edu_mail,:password
            )";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ":student_id" => $data['id'],
                ":edu_mail" => $data['edu_mail'],
                ":password" => $data['password'],
            ]);

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return $e->getMessage();
        }
    }

    // approve old student admissions
    public function approveOldStudent($studentTbl, $data)
    {
        try {
            $this->db->beginTransaction();
            $sql = "UPDATE $studentTbl SET year=:year, status=:status WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ":year" => $data['year'],
                ":status" => 1,
                ":id" => $data['id'],
            ]);
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return $e->getMessage();
        }
    }

    public function getStudentsYear($table)
    {
        try {
            $query = "SELECT DISTINCT year FROM $table WHERE status = 0 OR status = 1 OR status=3";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getApprovedStudentsYear($table)
    {
        try {
            $query = "SELECT DISTINCT year FROM $table WHERE status = 1";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getStudentAdmissionTotalCount($table, $year)
    {
        try {
            $query = "SELECT COUNT(*) as total FROM $table WHERE year=:year";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':year', $year);
            $statement->execute();
            $result = $statement->fetch();

            return $result->total;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getStudentAdmissionApprovedCount($table, $year)
    {
        try {
            $query = "SELECT COUNT(*) as total FROM $table WHERE year=:year AND status=1";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':year', $year);
            $statement->execute();
            $result = $statement->fetch();

            return $result->total;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    // for credit transfer students
    public function getStudentAdmissionTotalCountByStatus($table, $status)
    {
        try {
            $query = "SELECT COUNT(*) as total FROM $table WHERE status=:status";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':status', $status);
            $statement->execute();
            $result = $statement->fetch();

            return $result->total;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getApprovedStudentsRollNum($table, $year)
    {
        try {
            $query = "SELECT roll_num FROM student_tbl WHERE status = 1 AND year = :year AND id NOT IN (SELECT student_id FROM student_section_tbl)";

            $statement = $this->db->prepare($query);
            $statement->bindParam(':year', $year);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getStudentNameAndRollNumAndSemesterAndSectionPaginationData($page, $limit, $semester = null, $section = null)
    {
        $offset = ($page - 1) * $limit;
        try {
            if ($semester && $section) {
                $query = "SELECT s.id AS student_id, s.roll_num,s.student_name_en,sem.semester,sem.id AS semester_id,sec.section,sec.id AS section_id FROM student_tbl s JOIN  student_section_tbl ss ON s.id = ss.student_id JOIN  semester_tbl sem ON ss.semester_id = sem.id JOIN   section_tbl sec ON ss.section_id = sec.id WHERE  ss.semester_id = :semester AND ss.section_id = :section  ORDER BY   s.id LIMIT :limit OFFSET :offset";


                $statement = $this->db->prepare($query);
                $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
                $statement->bindValue(':offset', $offset, \PDO::PARAM_INT);
                $statement->bindValue(':semester', $semester, \PDO::PARAM_INT);
                $statement->bindValue(':section', $section, \PDO::PARAM_INT);
            } else {
                $query = "SELECT s.id AS student_id, s.roll_num,s.student_name_en,sem.semester,sem.id AS semester_id,sec.section,sec.id AS section_id FROM student_tbl s JOIN  student_section_tbl ss ON s.id = ss.student_id JOIN  semester_tbl sem ON ss.semester_id = sem.id JOIN   section_tbl sec ON ss.section_id = sec.id ORDER BY   s.id LIMIT :limit OFFSET :offset";
                $statement = $this->db->prepare($query);
                $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
                $statement->bindValue(':offset', $offset, \PDO::PARAM_INT);
            }
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getStudentIdBetweenRollNum($table, $startRollNum, $endRollNum)
    {
        try {
            $query = "SELECT id FROM $table WHERE roll_num BETWEEN :startRollNum AND :endRollNum";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":startRollNum" => $startRollNum,
                ":endRollNum" => $endRollNum
            ]);
            $result = $statement->fetchAll();
            return array_values($result);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function setStudentSection($table, $studentData)
    {
        try {
            $columns = implode(", ", array_keys($studentData));
            $placeholders = ":" . implode(", :", array_keys($studentData));
            $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $statement = $this->db->prepare($query);
            $statement->execute($studentData);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
