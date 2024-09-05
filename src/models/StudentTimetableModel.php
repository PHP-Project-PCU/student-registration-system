<?php

namespace models;

use core\db\MySQL;
use PDOException;

class StudentTimetableModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function getSemesterIdAndSectionIdByStudentId($table, $studentIdParam)
    {
        try {
            $query = "SELECT semester_id,section_id FROM $table WHERE student_id = :studentId";
            $statement = $this->db->prepare($query);
            $statement->execute([
                "studentId" => $studentIdParam
            ]);
            $studentId = $statement->fetch();
            return $studentId ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAcademicYear($table, $studentId)
    {
        try {
            $query = "SELECT YEAR(created_at) FROM $table WHERE id = :studentId";
            $statement = $this->db->prepare($query);
            $statement->execute([
                "studentId" => $studentId
            ]);
            $academicYear = $statement->fetch();
            return $academicYear ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getSemester($table, $semesterId)
    {
        try {
            $query = "SELECT semester FROM $table WHERE id = :semesterId";
            $statement = $this->db->prepare($query);
            $statement->execute([
                "semesterId" => $semesterId

            ]);
            $semester = $statement->fetch();
            return $semester ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getSection($table, $sectionId)
    {
        try {
            $query = "SELECT section FROM $table WHERE id = :sectionId";
            $statement = $this->db->prepare($query);
            $statement->execute([
                "sectionId" => $sectionId

            ]);
            $section = $statement->fetch();
            return $section ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getTimeTableData($table, $sectionId, $semesterId)
    {
        try {
            $query = "SELECT * FROM $table WHERE semester_id = :semesterId AND section_id = :sectionId";
            $statement = $this->db->prepare($query);
            $statement->execute([
                "sectionId" => $sectionId,
                "semesterId" => $semesterId
            ]);
            $data = $statement->fetchAll();
            return $data ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getTeachers($table, $teacherId)
    {
        try {
            $query = "SELECT * FROM $table WHERE id = :teacherId";
            $statement = $this->db->prepare($query);
            $statement->execute([
                "teacherId" => $teacherId,
            ]);
            $teacher = $statement->fetch();
            return $teacher ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getCourses($table, $courseId)
    {
        try {
            $query = "SELECT * FROM $table WHERE id = :courseId";
            $statement = $this->db->prepare($query);
            $statement->execute([
                "courseId" => $courseId,
            ]);
            $course = $statement->fetch();
            return $course ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}