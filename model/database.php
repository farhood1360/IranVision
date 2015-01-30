<?php
/**
 * Name: Iran Vision/database.php
 * This class configurates the database connection.
 * @author Farhood Rashidi
 * @date 01/06/2015
 */

class Database {

    //properties
    const DB_HOSTNAME = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'root';
    const DB_NAME = 'Iran Vision';
    private $table;
    private $_db_connect;
    private $select;
    private $insert;
    private $result;
    private $record;
    private $sql;
    private $row;
    private $update;
    private $delete;
    private $message;

    // *************************************************************    CONSTRUCT FUNCTIONS   ******************************************************

    //connection() function
    //Craete the database configuration
    public function connection(){
        $this->_db_connect = mysql_connect(self::DB_HOSTNAME,self::DB_USERNAME,self::DB_PASSWORD) or die(mysql_error());
    }
    
    //select() function
    //Create a connection to database
    public function select(){
        mysql_select_db(self::DB_NAME) or die(mysql_error());
    }
    
    // *************************************************************    INSERT FUNCTIONS   ******************************************************

    //insert_content() function
    //Insert the new records to content table.
    //@param $author
    //@param $page
    //@param $titr
    //@param $content
    public function insert_content($author, $page, $titr, $content){
        try{
            $this->table = "Content";
            $this->insert = "INSERT INTO $this->table(author_name, web_page, titr, content) VALUES('{$author}', '{$page}', '{$title}', '{$content}')";
	        $this->sql = mysql_query($this->insert);
        }catch(Exception $e){
            echo "There is a problem on insertion to database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //insert_comment() function
    //Insert the new records to comment table.
    //@param $author
    //@param $page
    //@param $comment
    public function insert_comment($author, $page, $comment){
        try{
            $this->table = "Comment";
            $this->insert = "INSERT INTO $this->table(author_name, web_page, comment) VALUES('{$author}', '{$page}', '{$comment}')";
            $this->sql = mysql_query($this->insert);
        }catch(Exception $e){
            echo "There is a problem on insertion to database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //insert_member() function
    //Insert the new records to members table.  
    //@param $lname
    //@param $fname
    //@param $email
    //@param $phone
    //@param $uname
    //@param $password
    public function insert_member($lname, $fname, $email, $phone, $uname, $password){
        try{
            $this->table = "Members";
            $this->insert = "INSERT INTO $this->table(last_name, first_name, email_address, phone_number, user_name, password) VALUES('{$lname}', '{$fname}', '{$email}', '{$phone}', '{$uname}', '{$password}')";
            $this->sql = mysql_query($this->insert);
            if($this->sql=== TRUE){
                $this->message = "Thanks ".$fname." ".$lname." for registration in the Iran Vision Website.<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem on insertion to database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //insert_survey() function
    //Insert the new records to survey table.
    //@param $q1
    //@param $q2
    //@param $q3
    //@param $q4
    //@param $q5
    public function insert_survey($q1, $q2, $q3, $q4, $q5){
        try{
            $this->table = "Survay";
            $this->insert = "INSERT INTO $this->table(question_1, question_2, question_3, question_4, question_5) VALUES('{$q1}', '{$q2}', '{$q3}', '{$q4}', '{$q5}')";
            $this->sql = mysql_query($this->insert);
        }catch(Exception $e){
            echo "There is a problem on insertion to database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //insert_editor() function
    //Insert the new records to members table.  
    //@param $lname
    //@param $fname
    //@param $state
    public function insert_editor($lname, $fname, $state){
        try{
            $this->table = "Editors";
            $this->insert = "INSERT INTO $this->table(last_name, first_name, state) VALUES('{$lname}', '{$fname}' , '{$state}')";
            $this->sql = mysql_query($this->insert);
            if($this->sql){
                $this->message = $fname." ".$lname." is inputed.<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem on insertion to database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    // *************************************************************    UPDATE FUNCTIONS   ******************************************************

    //update_content_like() function
    //Update the records of content table.  
    //@param $contentid
    //@param $contentlike
    public function update_content_like($contentid, $contentlike){
        try{
            $this->table = "Content";
            $this->update = "UPDATE $this->table SET likes = '{$contentlike}' WHERE content_id= '{$contentid}'";
            $this->sql = mysql_query($this->update);
            if($this->sql){
                $this->message = "The number of likes is ".$contentlike.".<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem for update this database! Please try again. " . $e->getMessage();
            exit();
        }
    }


    //update_content_dislike() function
    //Update the records of content table.  
    //@param $contentid
    //@param $contentdislike
    public function update_content_dislike($contentid, $contentdislike){
        try{
            $this->table = "Content";
            $this->update = "UPDATE $this->table SET dislikes = '{$contentdislike}' WHERE content_id= '{$contentid}'";
            $this->sql = mysql_query($this->update);
            if($this->sql){
                $this->message = "The number of dislikes is ".$contentdislike.".<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem for update this database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //update_comment_like() function
    //Update the records of comment table.  
    //@param $commentid
    //@param $commentlike
    public function update_comment_like($commentid, $commentlike){
        try{
            $this->table = "Comment";
            $this->update = "UPDATE $this->table SET likes = '{$commentlike}' WHERE comment_id= '{$commentid}'";
            $this->sql = mysql_query($this->update);
            if($this->sql){
                $this->message = "The number of likes is ".$commentlike. ".<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem for update this database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //update_comment_dislike() function
    //Update the records of comment table.  
    //@param $commentid
    //@param $commentdislike
    public function update_comment_dislike($commentid, $commentdislike){
        try{
            $this->table = "Comment";
            $this->update = "UPDATE $this->table SET dislikes = '{$commentdislike}' WHERE comment_id= '{$commentid}'";
            $this->sql = mysql_query($this->update);
            if($this->sql){
                $this->message = "The number of dislikes is ".$commentdislike.".<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem for update this database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //update_comment_number_content() function
    //Update the records of content table.  
    //@param $contenttId
    //@param $ccontentNum
    public function update_comment_number_content($contenttId, $ccontentNum){
        try{
            $this->table = "Content";
            $this->update = "UPDATE $this->table SET num_comments = '{$ccontentNum}' WHERE content_id= '{$contenttId}'";
            $this->sql = mysql_query($this->update);
            if($this->sql){
                $this->message = "The number of comments is ".$ccontentNum. ".<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem for update this database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //update_comment_number_comment() function
    //Update the records of comment table.  
    //@param $commentId
    //@param $ccommentNum
    public function update_comment_number_comment($commentId, $ccommentNum){
        try{
            $this->table = "Comment";
            $this->update = "UPDATE $this->table SET num_comments = '{$ccommentNum}' WHERE comment_id= '{$commentId}'";
            $this->sql = mysql_query($this->update);
            if($this->sql){
                $this->message = "The number of comments is ".$ccommentNum. ".<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem for update this database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //update_member() function
    //Update the records of members table.  
    //@param $lname
    //@param $fname
    //@param $memberId
    //@param $editorId
    //@param $dateStart
    //@param $dateEnd
    public function update_member($memberid, $editorid, $datestart, $dateend, $fname, $lname){
        try{
            $this->table = "Members";
            $this->update = "UPDATE $this->table SET member_id = '{$memberid}', editor_id = '{$editorid}', date_start = '{$datestart}', date_end = '{$dateend}' WHERE first_name= '{$fname}' AND last_name= '{$lname}'";
            $this->sql = mysql_query($this->update);
            if($this->sql){
                $this->message = "The information of ".$fname." ".$lname." is updated.<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem for update this database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //update_editor() function
    //Update the records of ediotrs table.  
    //@param $lname
    //@param $fname
    //@param $editorId
    //@param $email
    //@param $phone
    //@param $address
    //@param $city
    //@param $zipcode
    public function update_editor($editorid, $email, $phone, $address, $city, $zipcode, $fname, $lname){
        try{
            $this->table = "Editors";
            $this->update = "UPDATE $this->table SET editor_id = '{$editorid}', email_address = '{$email}', phone_number = '{$phone}', address = '{$address}', city = '{$city}', zip = '{$zipcode}' WHERE first_name= '{$fname}' AND last_name= '{$lname}'";
            $this->sql = mysql_query($this->update);
            if($this->sql){
                $this->message = "The information of ".$fname." ".$lname." is updated.<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem for update this database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    // *************************************************************    DELETE FUNCTIONS   ******************************************************


    //delete_member() function
    //Delete the records of members table.  
    //@param $lname
    //@param $fname
    public function delete_member($lname, $fname){
        try{
            $this->table = "Members";
            $this->delete = "DELETE FROM $this->table WHERE last_name= '{$lname}' AND first_name= '{$fname}'";
            $this->sql = mysql_query($this->delete);
            if($this->sql){
                $this->message = "The information of ".$fname." ".$lname." is deleted.<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem on delete the records from database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    //delete_editor() function
    //Delete the records of editors table.  
    //@param $lname
    //@param $fname
    public function delete_editor($lname, $fname){
        // try{
            $this->table = "Editors";
            $this->delete = "DELETE FROM $this->table WHERE last_name= '{$lname}' AND first_name= '{$fname}'";
            try{
            $this->sql = mysql_query($this->delete);
            if($this->sql){
                $this->message = "The information of ".$fname." ".$lname." is deleted.<br/>";
            }
        }catch(Exception $e){
            echo "There is a problem on delete the records from database! Please try again. " . $e->getMessage();
            exit();
        }
    }

    // *************************************************************    QUERY FUNCTIONS   ******************************************************
    
    //query_content() function
    //Select the filtered records from content table.
    //@param $Webpage
    public function query_content($Webpage){
        $this->table = "Content";
        $this->select = "SELECT * FROM $this->table WHERE web_page = '$Webpage'";
        $this->row = mysql_query("SELECT web_page FROM $this->table WHERE web_page = '$Webpage'");
        $this->page = mysql_fetch_array($this->row);
        $this->result = mysql_query($this->select);
        if($this->result === FALSE){die("Error querying databa.");}
        echo "<h2>" .$this->page['web_page']. "</h2><br>";
        while(($this->record = mysql_fetch_row($this->result)) !== FALSE){
            echo "<h3>".$this->record[3]."</h3><article><span>By:".$this->record[1]."</span><p>".$this->record[4].
            "<span><a href='../model/like.php?content_id=".$this->record[0]."&content_like=".$this->record[6]."&page_id=".$this->record[2].
            "'><img src='../image/like.png' width ='20' height ='20' alt='like' title='Like' id='like'/></a> ".$this->record[6].
            " | <a href='../model/dislike.php?content_id=".$this->record[0]."&content_dislike=".$this->record[7]."&page_id=".$this->record[2].
            "'><img src='../image/dislike.png' width ='20' height ='20' alt='dislike' title='Dislike' id='dislike'/></a> ".$this->record[7].
            " | <a href='../controller/admin/comment_num.php?content_id=".$this->record[0]."&num_comments_content=".$this->record[5]."&page_id=".$this->record[2].
            "' class='toggle'><img src='../image/comment.png' width ='20' height ='20' alt='comment' title='Comment' id='comment'/></a>".$this->record[5]."</span><div class='box'></div></article>";
        }
    }

    //query_comment() function
    //Select the filtered records from comment table.
    //@param $Webpage
    public function query_comment($Webpage){
        $this->table = "Comment";
        $this->select = "SELECT * FROM $this->table WHERE web_page = '$Webpage'";
        $this->result = mysql_query($this->select);
        if($this->result === FALSE){die("Error querying databa.");}
        while(($this->record = mysql_fetch_row($this->result)) !== FALSE){
            echo "<hr/><span>By:".$this->record[1]."</span><p class='comment'>&diams;".$this->record[3].
            "<span><a href='../model/like.php?comment_id=".$this->record[0]."&comment_like=".$this->record[5]."&page_id=".$this->record[2].
            "'><img src='../image/like.png' width ='20' height ='20' alt='like' title='Like' id='like'/></a> ".$this->record[5].
             " | <a href='../model/dislike.php?comment_id=".$this->record[0]."&comment_dislike=".$this->record[6]."&page_id=".$this->record[2].
            "'><img src='../image/dislike.png' width ='20' height ='20' alt='dislike' title='Dislike' id='dislike'/></a> ".$this->record[6].
            " | <a href='../controller/admin/comment_num.php?comment_id=".$this->record[0]."&num_comments_comment=".$this->record[4]."&page_id=".$this->record[2].
            "' class='toggle'><img src='../image/comment.png' width ='20' height ='20' alt='comment' title='Comment' id='comment'/></a>".$this->record[4]."</span></p><div class='box'></div>";
        }
    }

    //query_members() function
    //Select the filtered records from members table.
    public function query_members(){
        $this->table = "Members";
        $this->select = "SELECT * FROM $this->table ORDER BY last_name";
        $this->result = mysql_query($this->select);
        if($this->result === FALSE){die("Error querying database.");}
        while(($this->record = mysql_fetch_row($this->result)) !== FALSE){
            echo "<tr><td>".$this->record[0]."</td><td>".$this->record[1]."</td><td>".$this->record[2]."</td><td>".$this->record[3]."</td><td>".$this->record[4]."</td><td>".$this->record[5]."</td><td>".$this->record[7]."</td><td>".$this->record[8]."</td><td>".$this->record[9]."</td></tr>";
        }
    }

    // query_editors() function
    // Select the filtered records from editors table.
    public function query_editors(){
        $this->table = "Editors";
        $this->select = "SELECT * FROM $this->table ORDER BY first_name, last_name";
        $this->result = mysql_query($this->select);
        if($this->result === FALSE){die("Error querying database.");}
        while(($this->record = mysql_fetch_row($this->result)) !== FALSE){
            echo "<tr><td>".$this->record[0]."</td><td>".$this->record[1]."</td><td>".$this->record[2]."</td><td>".$this->record[3]."</td><td>".$this->record[4]."</td><td>".$this->record[5]."</td><td>".$this->record[6]."</td><td>".$this->record[7]."</td><td>".$this->record[8]."</td></tr>";
        }
    }

    // query_pages() function
    // Select the filtered records from website table.
    public function query_pages(){
        $this->table = "Website";
        $this->select = "SELECT * FROM $this->table ORDER BY page_name";
        $this->result = mysql_query($this->select);
        if($this->result === FALSE){die("Error querying database.");}
        while(($this->record = mysql_fetch_row($this->result)) !== FALSE){
            echo "<tr><td>".$this->record[1]."</td><td>".$this->record[2]."</td><td>".$this->record[3]."</td></tr>";
        }
    }

    // query_survey() function
    // Select the filtered records from editors table.
    public function query_survey(){
        $this->table = "Survey";
        $this->select = "SELECT * FROM $this->table";
        $this->result = mysql_query($this->select);
        if($this->result === FALSE){die("Error querying database.");}
        while(($this->record = mysql_fetch_row($this->result)) !== FALSE){
            echo "<tr><td>".$this->record[0]."</td><td>".$this->record[1]."</td><td>".$this->record[2]."</td><td>".$this->record[3]."</td><td>".$this->record[4]."</td></tr>";
        }
    }

    // *************************************************************    DESTRUCT FUNCTIONS   ******************************************************

    //showMessage() function
    //@return $message
    function showMessage(){
        return $this->message;
    }

    //destruct() function
    // Disconnect form the database.
    public function disconnect(){
        mysql_close($this->_db_coonect);
    }
}

