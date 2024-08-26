<?php

namespace models;

use core\db\MySQL;
use PDOException;
use PDO;

class TimeTableModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
        if (!$this->db instanceof \PDO) {
            die('Database connection failed: ' . $this->db); // This will show the connection error
        }
    }

    public function createTimetable($table, $data)
    {
        try {
            $sql = "INSERT INTO $table (day,time_slot,start_time,end_time,teacher_id,course_id,semester_id,section_id,major_id,start_date,end_date) 
                    VALUES (:day,:time_slot,:start_time,:end_time,:teacher_id,:course_id,:semester_id,:section_id,:major_id,:start_date,:end_date)";
            $statement = $this->db->prepare($sql);
            $statement->execute([
                ":day" =>  $data['day'],
                ":time_slot" =>  $data['time_slot'],
                ":start_time" =>  $data['start_time'],
                ":end_time" =>  $data['end_time'],
                ":teacher_id" =>  $data['teacher_id'] ?? null,
                ":course_id" =>  $data['course_id'] ?? null,
                ":semester_id" =>  $data['semester_id'],
                ":section_id" =>  $data['section_id'],
                ":major_id" =>  $data['major_id'],
                ":start_date" => $data['start_date'],
                ":end_date" => $data['end_date'],
            ]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAllTimetables($table)
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

    public function getTimetableByDSSM($table, $day, $sectionId, $semesterId, $majorId)
    {
        try {
            $sql = "SELECT * FROM $table
                    WHERE day=:day
                    AND section_id=:section_id
                    AND semester_id=:semester_id
                    AND major_id=:major_id
                    ORDER BY start_time
            ";
            $statement = $this->db->prepare($sql);
            $statement->execute([
                ":day" => $day,
                ":section_id" => $sectionId,
                ":semester_id" => $semesterId,
                ":major_id" => $majorId,
            ]);
            $data = $statement->fetchAll((PDO::FETCH_ASSOC));
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateTimetable($table, $id, $data)
    {
        try {
            $sql = "UPDATE $table SET 
                        day = :day,
                        start_time = :start_time,
                        end_time = :end_time,
                        teacher_id = :teacher_id,
                        course_id = :course_id,
                        semester_id = :semester_id,
                        section_id = :section_id,
                        start_date = :start_date,
                        end_date = :end_date
                    WHERE id = :id";
            $statement = $this->db->prepare($sql);
            $result = $statement->execute([
                ":day" =>  $data['day'],
                ":start_time" =>  $data['start_time'],
                ":end_time" =>  $data['end_time'],
                ":teacher_id" =>  $data['teacher_id'],
                ":course_id" =>  $data['course_id'],
                ":semester_id" =>  $data['semester_id'],
                ":section_id" =>  $data['section_id'],
                ":start_date" => $data['start_date'],
                ":end_date" => $data['end_date'],
                ":id" => $id,
            ]);
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteTimetable($table, $id)
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
