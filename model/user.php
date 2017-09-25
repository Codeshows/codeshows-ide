<?php

    class user_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function validate($data = []) {
            extract($data);
            $i_patt = '/2[0-9]{3}[a-zA-Z]{3}[0-9]{4}/';
            $e_patt = '/.+@.+\..+/';
            $msg = "";
            if (!ctype_alpha($fname) || strlen($fname) > 20) {
                $msg = "Invalid First Name";
            } else if (!ctype_alpha($lname) || strlen($lname) > 20) {
                $msg = "Invalid Last Name";
            } else if (!ctype_alpha($username) || strlen($username) > 20) {
                $msg = "Invalid User Name";
            } else if (!preg_match($i_patt, $institute_id)) {
                $msg = "Invalid Institute Id";
            } else if (!preg_match($e_patt, $email)) {
                $msg = "Invalid Email";
            } else if (strlen($password) < 8) {
                $msg = "Invalid Password";
            } else if ($password !== $confirm) {
                $msg = "Passwords do not match";
            } else if (!is_numeric($sem)) {
                $msg = "Invalid Sem";
            } else if (!is_numeric($cg)) {
                $msg = "Invalid CGPA";
            } else if (!ctype_alpha($branch)) {
                $msg = "Invalid Branch";
            } else if (!ctype_alnum($batch)) {
                $msg = "Invalid Batch";
            }
            return $msg;
        }

        function login($data = []) {
            extract($data);
            $sql = "SELECT * FROM `user` WHERE `email`='$email'";
            $result = query($this->db, $sql);
            if ($result === false) {
                db_close($this->db);
                return $result;
            }
            $hash = $result[0]['password'];
            $res = password_verify($password, $hash);
            if ($res !== false) $result = $result[0];
            else $result = false;
            db_close($this->db);
            return $result;
        }

        function register($data = []) {
            $msg = $this->validate($data);
            if ($msg) {
                print($msg);
                redirect_sleep('main', 'home', 5);
                exit();
            }
            extract($data);
            $sql = "INSERT INTO `user` (`fname`, `lname`, `username`, `institute_id`, `email`, `password`, `sem`, `cg`, `branch`,
            `dob`, `batch`, `about_me`) VALUES('$fname', '$lname', '$username', '$institute_id', '$email',
            '".password_hash($password, PASSWORD_BCRYPT)."', $sem, $cg, '$branch', '$dob', '$batch', '$about_me')";
            $result = query($this->db, $sql);
            db_close($this->db);
            return $result;
        }

    }

?>