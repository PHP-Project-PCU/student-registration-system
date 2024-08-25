<?php

namespace models;

use core\db\MySQL;
use PDOException;
use PDO;

class CourseModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
        if (!$this->db instanceof \PDO) {
            die('Database connection failed: ' . $this->db); // This will show the connection error
        }
    }

    public function createCourse($table, $data)
    {
        try {
            $sql = "INSERT INTO $table 
                    (code,title,dept_id,semester_id,assessment,assignment,tutorial,quiz,lab_exam,project,exam,credit_unit) 
                    VALUES (:code,:title,:dept_id,:semester_id,:assessment,:assignment,:tutorial,:quiz,:lab_exam,:project,:exam,:credit_unit)";
            $statement = $this->db->prepare($sql);
            $statement->execute([
                ':code' => $data['code'],
                ':title' => $data['title'],
                ':dept_id' => $data['dept_id'],
                ':semester_id' => $data['semester_id'],
                ':assessment' => $data['assessment'],
                ':assignment' => $data['assignment'],
                ':tutorial' => $data['tutorial'],
                ':quiz' => $data['quiz'],
                ':lab_exam' => $data['lab_exam'],
                ':project' => $data['project'],
                ':exam' => $data['exam'],
                ':credit_unit' => $data['credit_unit'],
            ]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAllCourses($table)
    {
        try {
            $sql = "SELECT * FROM $table";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll((PDO::FETCH_ASSOC));
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAllCoursesBySemester($table, $semesterId)
    {
        try {
            $sql = "SELECT * FROM $table where semester_id=:semester_id";
            $statement = $this->db->prepare($sql);
            $statement->execute([
                ":semester_id" => $semesterId
            ]);
            $data = $statement->fetchAll((PDO::FETCH_ASSOC));
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function updateCourse($table, $id, $data)
    {
        try {
            $sql = "UPDATE $table 
                    SET code = :code,
                        title = :title,
                        dept_id = :dept_id,
                        semester_id = :semester_id,
                        assessment = :assessment,
                        assignment = :assignment,
                        tutorial = :tutorial,
                        quiz = :quiz,
                        lab_exam = :lab_exam,
                        project = :project,
                        exam = :exam,
                        credit_unit = :credit_unit
                    WHERE id = :id";

            $statement = $this->db->prepare($sql);
            $statement->execute([
                ':code' => $data['code'],
                ':title' => $data['title'],
                ':dept_id' => $data['dept_id'],
                ':semester_id' => $data['semester_id'],
                ':assessment' => $data['assessment'],
                ':assignment' => $data['assignment'],
                ':tutorial' => $data['tutorial'],
                ':quiz' => $data['quiz'],
                ':lab_exam' => $data['lab_exam'],
                ':project' => $data['project'],
                ':exam' => $data['exam'],
                ':credit_unit' => $data['credit_unit'],
                ':id' => $id,
            ]);

            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteCourse($table, $id)
    {
        try {
            $sql = "DELETE FROM $table WHERE id=:id";
            $statement = $this->db->prepare($sql);
            $statement->execute([":id" => $id]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
