<?php

    class Members extends CI_Model
    {
        
        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        function admin_do_login($username, $password)
        {
            $query = $this->db->get_where('admin', array('admin_username' => $username, 'admin_password' => $password, 'enabled' => YES));
            
            if($query->num_rows() == 1)
            {
                    return true;
            }
            
            return false;			
        }
	
	function do_login($username, $password){
	    
	    $this->db->select('username','password','account_type');
	    $this->db->from('login');
	    $this->db->where('username',$username);
	    $this->db->where('password',$password);
	    
	    
	    $query = $this->db->get();
            
            if($query->num_rows() == 1)
            {
                    return true;
            }
            
            return false;
	    
	}
        
        function get_num_of_students(){
            
            $this->db->select('student_id');
            $this->db->from('student_info');
            
            $query = $this->db->get();
            
            return $query->num_rows();
            
        }
        
        function get_num_of_admitted_students(){
            
            $this->db->select('admission_id');
            $this->db->from('admissions');
            
            $query = $this->db->get();
            
            return $query->num_rows();
            
        }
        
        
        
        function get_all_students(){
            
            $this->db->select('student_id, first_name, last_name, email, school_name, passport, birth, result, admission_status');
            $this->db->from('student_info');
            $this->db->order_by('admission_status', 'asc');
            
            $query = $this->db->get();
            
            return $query->result_array();
        }
        
        function get_all_admitted_students(){
            
            $this->db->select('*');
            $this->db->from('admissions');
            $this->db->join('student_info', 'student_info.student_id = admissions.student_id');
            
            
            $query = $this->db->get();
            
            
	    
	    return $query->result_array();	
		
                
        }
        
        function get_all_uploads($id){
            
            $this->db->select('passport, birth, result');
            $this->db->from('student_info');
            $this->db->where('student_id', $id);
            
            $query = $this->db->get();
            
            return $query->result_array();
            
        }
        
        
        function get_other_details($id){
            
            $where = array(
                           'student_id' => $id
                           );
            
            $this->db->select('present_class,school_type,personal_computer,computer_knowledge,computer_rating,solving_problem,solved_problem,learn_program,best_subject,reason');
            $this->db->from('student_info');
            $this->db->where($where);
            
            $query = $this->db->get();
            
            return $query->result_array();
            
            
            
        }
        
        
        function is_exist($table, $param_array)
        {
            $query = $this->db->get_where($table, $param_array);
            
            if($query->num_rows() > 0) return true;
            
            return false;			
        }
        
        function verified($mem_id)
        {
            if($this->is_exist('member_info', array('mem_id' => $mem_id, 'status' => ENABLED)))
                return true;
            
            return false;
        }
        
        function get($what_id, $where_array, $table)
        {
            $this->db->select($what_id);
            $this->db->where($where_array);
            $this->db->limit(1);
            $query = $this->db->get($table);
            
            foreach($query->result() as $value)
                return $value->$what_id;            
        }
        
        
        
        function get_insert_id()
        {                
            return $this->db->insert_id();           
        }
        
        function update_entry($mem_id, $param_array)
        {
            $this->db->where(array('mem_id' => $mem_id));
            $this->db->update('member_info', $param_array);
            
        }
        
        function delete_entry($table, $param_array)
        {
            #$this->db->where(array('stud_id' => $mem_id));
            $this->db->delete($table, $param_array);
            
        }
	
	function insert_entry($table, $param)
        {    
            $this->db->insert($table, $param);
        }
        
       
	

	
	function get_all($select_all,$tables,$id,$asc){
	    
	    $this->db->select($select_all);
	    $this->db->from($tables);
	    $this->db->order_by($id,$asc);
	    
	    $query = $this->db->get();
	    
	    
	    
	    return $query->result_array();
	    
	    
	}
	
	function get_all_where($select_all,$table,$where){
	    
	    $this->db->select($select_all);
	    $this->db->from($table);
	    $this->db->where($where);
	    
	    $query = $this->db->get();
	    
	    
	    return $query->result_array();
	    
	}
	
	
	function get_join($select_all,$table1,$table2,$array_join){
	    
	    $this->db->select($select_all);
	    $this->db->from($table1);
	    $this->db->join($table2,$array_join);
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	    
	    
	    
	}
	
	function get_multi_join(){
	    
	    $this->db->select('*');
	    $this->db->from('programs');
	    $this->db->join('departments','programs.department_id = departments.department_id');
	    $this->db->join('faculties', 'departments.faculty_id = faculties.faculty_id','left');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	    
	    
	    
	}
	
	function get_students(){
	    
	    $this->db->select('*');
	    $this->db->from('students');
	    $this->db->join('programs','students.program_id = programs.program_id');
	    $this->db->join('departments', 'programs.department_id = departments.department_id');
	    $this->db->join('faculties', 'departments.faculty_id = faculties.faculty_id');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	
	}
	
	
	function get_students_in_faculty($faculty_id){
	    
	    $this->db->select('*');
	    $this->db->from('students');
	    $this->db->where(array('students.faculty_id'=>$faculty_id));
	    $this->db->join('departments','students.department_id = departments.department_id');
	    $this->db->join('programs','students.program_id = programs.program_id');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	    
	    
	    
	}
	
	function get_courses_in_faculty($faculty_id){
	    
	    $this->db->select('*');
	    $this->db->from('courses');
	    $this->db->join('departments','courses.department_id = departments.department_id');
	    $this->db->where(array('courses.faculty_id'=>$faculty_id));
	    
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	    
	    
	}
	
	function get_courses($acc_id){
	    
	    $this->db->select('*');
	    $this->db->from('courses');
	    $this->db->where(array('courses.faculty_id'=>$acc_id));
	    $this->db->join('departments','courses.department_id = departments.department_id');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	    
	}
	
	
	function get_programs_in_faculty($faculty_id){
	    
	    $this->db->select('*');
	    $this->db->from('programs');
	    $this->db->where(array('programs.faculty_id'=>$faculty_id));
	    $this->db->join('departments','programs.department_id = departments.department_id');
	    
	    $query = $this->db->get();
	    
	    if($query->num_rows > 0){
	    
	    return $query->result_array();
	    }
	    
	}
	
	function get_department_courses($department_id,$faculty_id){
	    
	    $this->db->select('*');
	    $this->db->from('scores');
	    $this->db->where(array('scores.department_id'=>$department_id,
				   'scores.faculty_id'=>$faculty_id));
	    $this->db->join('courses','scores.course_id = courses.course_id');
	    //$this->db->join('faculties','scores.faculty_id = faculties.faculty_id');
	    
	    $query = $this->db->get();
	    
	    if($query->num_rows > 0){
		
		return $query->result_array();
		
	    }   
	    
	}
	
	function get_department_students($department_id,$faculty_id){
	    
	    $this->db->select('*');
	    $this->db->from('students');
	    $this->db->where(array('students.department_id'=>$department_id,
				   'students.faculty_id'=>$faculty_id));
	    $this->db->join('programs','students.program_id = programs.program_id');
	    //$this->db->join('faculties','scores.faculty_id = faculties.faculty_id');
	    
	    $query = $this->db->get();
	    
	    if($query->num_rows > 0){
		
		return $query->result_array();
		
	    }   
	    
	}
	
	function get_departmental_courses($department_id,$faculty_id){
	    
	    $this->db->select('*');
	    $this->db->from('courses');
	    $this->db->where(array('courses.department_id'=>$department_id,
				   'courses.faculty_id'=>$faculty_id));
	    
	    $query = $this->db->get();
	    
	    if($query->num_rows > 0){
		
		return $query->result_array();
	    }
	}
	
	
	function get_departmental_scores($department_id,$faculty_id){
	    
	    $this->db->select('*');
	    $this->db->from('scores');
	    $this->db->where(array('scores.department_id'=>$department_id,
				   'scores.faculty_id'=>$faculty_id));
	    $this->db->join('courses','scores.course_id = courses.course_id');
	    $this->db->join('students','scores.student_id= students.student_id');
	    $this->db->order_by('scores.date_added','asc');
	    
	    $query = $this->db->get();
	    
	    if($query->num_rows > 0){
		
		return $query->result_array();
	    }
	    
	    
	}
	
	function get_departmental_student_scores($student_id,$stud_dept_id,$semester,$session,$level){
	    
	    
	    
	   $this->db->select('*');
	   $this->db->from('scores');
	   $this->db->where(array('scores.student_id'=>$student_id,
				   'scores.semester'=>$semester,
				   'scores.level'=>$level));
	   $this->db->join('courses','scores.course_id = courses.course_id');
	   //$this->db->join('students','scores.student_id= students.student_id');
	   $this->db->order_by('scores.date_added','desc');
	    
	    
	    $query = $this->db->get();
	   
	   //$failed = ""; 
	    $result = "<table border = \"1\" width = \"840\" cellpadding = \"0\" cellspacing = \"0\">
				<tr>
				    <th width = \"300\">Course Code</th>
				    <th width = \"650\">Course Title</th>
				    <th width = \"250\">Unit</th>
				    <th width = \"250\">CA</th>
				    <th width = \"250\">Exam Score</th>
				    <th width = \"250\">Score</th>
				    <th width = \"250\">Grade</th>";
	    $weight = $totalunit = 0;
	    $grade = '';
	    
	    foreach($query->result() as $row){
		
		$course_id = $row->course_id;
		$continuous_asessment = $row->continuous_asessment;
		$exam_score = $row->exam_score;
		$grade = $row->grade;
		$score = $row->score;
		$student_id = $row->student_id;
		$unit = $row->unit;
		//$grade = $this->members->getGrade($score);
		$point = $this->members->getPoint($grade) * $unit;
		
		$course_code = $this->members->get('course_code',array('course_id'=>$course_id),'courses');
		$course_title = $this->members->get('course_title',array('course_id'=>$course_id),'courses');
		$unit = $this->members->get('unit',array('course_id'=>$course_id),'courses');
		$student_name = $this->members->get('surname',array('student_id'=>$student_id),'students');
		//$continuous_asessment = $this->members->get('continuous_asessment',array('student_id'=>$student_id),'scores');
		//$exam_score = $this->members->get('exam_score',array('student_id'=>$student_id),'scores');
		//$score = $this->members->get('score',array('student_id'=>$student_id),'scores');
		
		//$grade = $this->members->getGrade($score);
		$point = $this->members->getPoint($grade) * $unit;
		//$weight = $totalunit = 0;
	    
		$result .= "<tr>
				<td>$course_code</td>
				<td>$course_title</td>
				<td>$unit</td>
				<td>$continuous_asessment</td>
				<td>$exam_score</td>
				<td>$score</td>
				<td>$grade</td>
			    </tr>";
		
		$weight += $point;
		$totalunit += $unit;
		
	    }
	    
	    
	    $result .= "</table>";
		if($grade == 'F')
		$result .= 'Outstanding Courses :'.$this->members->get_outstanding_courses($grade).'<br/>';
		else
		$result .= 'Outstanding Courses :None. <br/>';
		
	     if(($weight != 0) && ($totalunit != 0))   
		$result .= "GPA: ".round(($weight/$totalunit), 2)." <br/><br/>";
	     else
		$result .= "GPA : 0.00<br/><br/>";
	    
	//if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
	    //$result .= 'here';
	    if($level == '1' && $semester == '1')
		if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
		    $result .= 'CGPA : 0.00';
		    else
		    $result .= 'CGPA :'.round($this->members->total_weight($student_id,$semester,$level)/$this->members->total_unit($student_id,$semester,$level),2);

	    if($level == '1' && $semester == '2')
		if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
		    $result .= 'CGPA : 0.00';
		    else
		    $result .= 'CGPA :'.round(($this->members->total_weight($student_id,'1','1')+$this->members->total_weight($student_id,'2','1'))/
		    ($this->members->total_unit($student_id,'1','1')+$this->members->total_unit($student_id,'2','1')), 2);
		
	    if($level == '2' && $semester == '1')
		if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
		    $result .= 'CGPA : 0.00';
		    else
		    $result .= 'CGPA :'.round(($this->members->total_weight($student_id,'1','1')+$this->members->total_weight($student_id,'2','1')+$this->members->total_weight($student_id,'1','2'))/
		    ($this->members->total_unit($student_id,'1','1')+$this->members->total_unit($student_id,'2','1')+$this->members->total_unit($student_id,'1','2')),2);
		//$cgpa = $rule/$query2;	
	    if($level == '2' && $semester == '2')
		if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
		    $result .= 'CGPA : 0.00';
		    else
		    $result .= 'CGPA :'.round(($this->members->total_weight($student_id,'1','1')+$this->members->total_weight($student_id,'2','1')+$this->members->total_weight($student_id,'1','2')+$this->members->total_weight($student_id,'2','2'))/
		    ($this->members->total_unit($student_id,'1','1')+$this->members->total_unit($student_id,'2','1')+$this->members->total_unit($student_id,'1','2')+$this->members->total_unit($student_id,'2','2')),2);
		
	    if($level == '3' && $semester == '1')
		if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
		    $result .= 'CGPA : 0.00';
		    else
		    $result .= 'CGPA :'.round(($this->members->total_weight($student_id,'1','1')+$this->members->total_weight($student_id,'2','1')+$this->members->total_weight($student_id,'1','2')+$this->members->total_weight($student_id,'2','2')+$this->members->total_weight($student_id,'1','3'))/
		    ($this->members->total_unit($student_id,'1','1')+$this->members->total_unit($student_id,'2','1')+$this->members->total_unit($student_id,'1','2')+$this->members->total_unit($student_id,'2','2'))+$this->members->total_unit($student_id,'1','3'),2);
		
	    if($level == '3' && $semester == '2')
		if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
		    $result .= 'CGPA : 0.00';
		    else
		    $result .= 'CGPA :'.round(($this->members->total_weight($student_id,'1','1')+$this->members->total_weight($student_id,'2','1')+$this->members->total_weight($student_id,'1','2')+$this->members->total_weight($student_id,'2','2')+$this->members->total_weight($student_id,'1','3')+$this->members->total_weight($student_id,'2','3'))/
		    ($this->members->total_unit($student_id,'1','1')+$this->members->total_unit($student_id,'2','1')+$this->members->total_unit($student_id,'1','2')+$this->members->total_unit($student_id,'2','2'))+$this->members->total_unit($student_id,'1','3')+$this->members->total_unit($student_id,'2','3'),2);
		
	    if($level == '4' && $semester == '1')
		if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
		    $result .= 'CGPA : 0.00';
		    else
		    $result .= 'CGPA :'.round(($this->members->total_weight($student_id,'1','1')+$this->members->total_weight($student_id,'2','1')+$this->members->total_weight($student_id,'1','2')+$this->members->total_weight($student_id,'2','2')+$this->members->total_weight($student_id,'1','3')+$this->members->total_weight($student_id,'2','3')+$this->members->total_weight($student_id,'1','4'))/
		    ($this->members->total_unit($student_id,'1','1')+$this->members->total_unit($student_id,'2','1')+$this->members->total_unit($student_id,'1','2')+$this->members->total_unit($student_id,'2','2'))+$this->members->total_unit($student_id,'1','3')+$this->members->total_unit($student_id,'2','3')+$this->members->total_unit($student_id,'1','4'),2);
		
	    if($level == '4' && $semester == '2')
		if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
		    $result .= 'CGPA : 0.00';
		    else
		    $result .= 'CGPA :'.round(($this->members->total_weight($student_id,'1','1')+$this->members->total_weight($student_id,'2','1')+$this->members->total_weight($student_id,'1','2')+$this->members->total_weight($student_id,'2','2')+$this->members->total_weight($student_id,'1','3')+$this->members->total_weight($student_id,'2','3')+$this->members->total_weight($student_id,'1','4')+$this->members->total_weight($student_id,'2','4'))/
		    ($this->members->total_unit($student_id,'1','1')+$this->members->total_unit($student_id,'2','1')+$this->members->total_unit($student_id,'1','2')+$this->members->total_unit($student_id,'2','2'))+$this->members->total_unit($student_id,'1','3')+$this->members->total_unit($student_id,'2','3')+$this->members->total_unit($student_id,'1','4')+$this->members->total_unit($student_id,'2','4'),2);
		
	    if($level == '5' && $semester == '1')
		if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
		    $result .= 'CGPA : 0.00';
		    else
		    $result .= 'CGPA :'.round(($this->members->total_weight($student_id,'1','1')+$this->members->total_weight($student_id,'2','1')+$this->members->total_weight($student_id,'1','2')+$this->members->total_weight($student_id,'2','2')+$this->members->total_weight($student_id,'1','3')+$this->members->total_weight($student_id,'2','3')+$this->members->total_weight($student_id,'1','4')+$this->members->total_weight($student_id,'2','4')+$this->members->total_weight($student_id,'1','5'))/
		    ($this->members->total_unit($student_id,'1','1')+$this->members->total_unit($student_id,'2','1')+$this->members->total_unit($student_id,'1','2')+$this->members->total_unit($student_id,'2','2'))+$this->members->total_unit($student_id,'1','3')+$this->members->total_unit($student_id,'2','3')+$this->members->total_unit($student_id,'1','4')+$this->members->total_unit($student_id,'2','4')+$this->members->total_unit($student_id,'1','5'),2);
		
	    if($level == '5' && $semester == '2')
		if(($this->members->total_weight($student_id,$semester,$level) == 0) && ($this->members->total_unit($student_id,$semester,$level) == 0))
		    $result .= 'CGPA : 0.00';
		    else
		    $result .= 'CGPA :'.round(($this->members->total_weight($student_id,'1','1')+$this->members->total_weight($student_id,'2','1')+$this->members->total_weight($student_id,'1','2')+$this->members->total_weight($student_id,'2','2')+$this->members->total_weight($student_id,'1','3')+$this->members->total_weight($student_id,'2','3')+$this->members->total_weight($student_id,'1','4')+$this->members->total_weight($student_id,'2','4')+$this->members->total_weight($student_id,'1','5')+$this->members->total_weight($student_id,'2','5'))/
		    ($this->members->total_unit($student_id,'1','1')+$this->members->total_unit($student_id,'2','1')+$this->members->total_unit($student_id,'1','2')+$this->members->total_unit($student_id,'2','2'))+$this->members->total_unit($student_id,'1','3')+$this->members->total_unit($student_id,'2','3')+$this->members->total_unit($student_id,'1','4')+$this->members->total_unit($student_id,'2','4')+$this->members->total_unit($student_id,'1','5')+$this->members->total_unit($student_id,'2','5'),2);
		
		
		
	    return $result;
	    
	    
	}
	    
	    
	
	
	function find_student_score($course_code,$semester,$session,$acc_id,$stud_num){
	    
	   $this->db->select('*');
	   $this->db->from('scores');
	   $this->db->where(array('scores.student_id'=>$acc_id));
	   $this->db->like('scores.course_id',$course_code,'after');
	   $this->db->like('semester',$semester,'after');
	   $this->db->like('session',$session,'after');
	   
	   $query = $this->db->get();
	   
	    
	    if($query->num_rows() < 1){
		
		$result = 'No result found';
	    }
	    else{
		$result = " ";
		    
		    foreach($query->result() as $row){
			
			$course_id = $row->course_id;
			$student_id = $row->student_id;
			$score = $row->score;
			//$semester = $row->semester;
			//$session_admitted = $row->session_admitted;
			$code = $this->members->get('course_code',array('course_id'=>$course_id),'courses');
			$result .= 'Student Name : '.'<b>'.$this->members->get('surname',array('student_id'=>$student_id),'students'). ' '.$this->members->get('first_name',array('student_id'=>$student_id),'students').'</b>'.'('.$stud_num.')'.'<br/><br/>';
			$result .= 'Course : '.$this->members->get('course_title',array('course_id'=>$course_id),'courses').'('.$code.')'.'<br/><br/>';
			$result .= 'Score :'.' '.'<b>'.$score.'</b>'.'<br/><br/>';
			$result .= 'Grade :'.' '.'<b>'.$this->members->getGrade($score).'</b>';/*"<tr>
			$
					<td>$matric_number</td>
					<td>$course</td>
					<td>$score</td>
					<td>$semester</td>
					<td>$session_admitted</td>
					<td>Edit</td>
					<td>Delete</td>
				    </tr>";*/
			
		    }
		   $result .= " "; 
		
	    }
	    
	    return $result;
	   
	    
	    
	}
	
	
	function get_outstanding_courses($grade){
	
		$this->db->select('*');
		$this->db->from('scores');
		$this->db->where(array('grade'=>'F'));
		
		$query = $this->db->get();
		
		$result = "";
		
		foreach($query->result() as $row){
			
			$courses = $row->course_id;
			
			$result .= $this->members->get('course_code',array('course_id'=>$courses),'courses'). ' '.' ,';
		
		}
			return $result;	
	}
	
	
	 function getGrade($score)
	{
		
		
			if($score >0 && $score <= 39)
				return 'F';
			if($score > 39 && $score <= 45)
				return 'E';
			if($score > 45 && $score <= 49)
				return 'D';
			if($score > 49 && $score <= 59)
				return 'C';
			if($score > 59 && $score <=69)
				return 'B';
			if($score > 69 && $score <= 100)
				return 'A';
			if($score == 0)
				return "&nbsp;";
		
	}
	
	
	function getPoint($grade){
	    
	    if($grade == 'A')
		return '5.0';
	    if($grade == 'B')
		return '4.0';
	    if($grade == 'C')
		return '3.0';
	    if($grade == 'D')
		return '2.0';
	    if($grade == 'E')
		return '1.0';
	    if($grade == 'F')
		return '0.0';
		
	    
	    
	    
	    
	}
	
	function cgpa($student_id,$semester,$level){
	    
	    
	   $this->db->select('*');
	   $this->db->from('scores');
	   $this->db->where(array('scores.student_id'=>$student_id,
				   'scores.semester'=>$semester,
				   'scores.level'=>$level));
	   $this->db->join('courses','scores.course_id = courses.course_id');
	   //$this->db->join('students','scores.student_id= students.student_id');
	   $this->db->order_by('scores.date_added','desc');
	    
	    $query = $this->db->get();
	    	    
	    $result = " ";
	    
	    $weight = $totalunit = '';
	    
	    foreach($query->result() as $row){
		
		$course_id = $row->course_id;
		$score = $row->score;
		$course_code = $row->course_code;
		$course_title = $row->course_title;

		$course_code = $this->members->get('course_code',array('course_id'=>$course_id),'courses');
		$course_title = $this->members->get('course_title',array('course_id'=>$course_id),'courses');
		$unit = $this->members->get('unit',array('course_id'=>$course_id),'courses');
		$grade = $this->members->getGrade($score);
		$point = $this->members->getPoint($grade) * $unit;
		
		
		$weight += $point;
		$totalunit += $unit;
		
		//$total = $this->members->total_rows($student_id);
		//$range = range(1,$total);
	    }	    
	    
	    
	  
	   
	    
		$result .= round(($weight/$totalunit), 2);
		
	    
	    return $result;
	    
	    	    
	    
	        
	    
	}
	
	

	
	function firstyear($student_id){
	    
	    $result = $this->members->display_first_semester($student_id,'1','1');
	    $result .= $this->members->display_second_semester($student_id,'2','1');
	    $query1 = $this->members->total_weight($student_id,'1','1') + $this->members->total_weight($student_id,'2','1');
	    $query2 = $this->members->total_unit($student_id,'1','1') + $this->members->total_unit($student_id,'2','1');
	    
	    if(($query1 != 0) && ($query2 != 0))
	    $result .= 'CGPA :'.round($query1/$query2,2);
	    
	    else
	    $result .= 'CGPA : 0.00';
	    //
	    
	    //calculating cgpa
	    //$gpa = $this->calulategpa();
	    
	    return $result;
	}
	
	function secondyear($student_id){
	    
	    $result = $this->members->display_first_semester($student_id,'1','2');
	    
	    $query1 = $this->members->total_weight($student_id,'1','1') + $this->members->total_weight($student_id,'2','1') + $this->members->total_weight($student_id,'1','2');
	    $query2 = $this->members->total_unit($student_id,'1','1') + $this->members->total_unit($student_id,'2','1') + $this->members->total_unit($student_id,'1','2') ;
	    
	     if(($query1 != 0) && ($query2 != 0))
	    $result .= 'CGPA :'.round($query1/$query2,2);
	    
	    else
	    $result .= 'CGPA : 0.00';
	    $result .= $this->members->display_second_semester($student_id,'2','2');
	    
	    $query3 = $this->members->total_weight($student_id,'1','1') + $this->members->total_weight($student_id,'2','1') + $this->members->total_weight($student_id,'1','2') + $this->members->total_weight($student_id,'2','2');
	    
	    $query4 = $this->members->total_unit($student_id,'1','1') + $this->members->total_unit($student_id,'2','1') + $this->members->total_unit($student_id,'1','2') + $this->members->total_unit($student_id,'2','2');
	    
	     if(($query3 != 0) && ($query4 != 0))
	    $result .= 'CGPA :'.round($query3/$query4,2);
	    
	    else
	    $result .= 'CGPA : 0.00';
	    return $result;
	}
	
	function thirdyear($student_id){
	    
	    $result = $this->members->display_first_semester($student_id,'1','3');
	    
	    $query1 = $this->members->total_weight($student_id,'1','1') + $this->members->total_weight($student_id,'2','1') + $this->members->total_weight($student_id,'1','2') + $this->members->total_weight($student_id,'2','2') + $this->members->total_weight($student_id,'1','3') ;
	    $query2 = $this->members->total_unit($student_id,'1','1') + $this->members->total_unit($student_id,'2','1') + $this->members->total_unit($student_id,'1','2') + $this->members->total_unit($student_id,'2','2') + $this->members->total_unit($student_id,'1','3')  ;
	    
	    
	     if(($query1 != 0) && ($query2 != 0))
	    $result .= 'CGPA :'.round($query1/$query2,2);
	    
	    else
	    $result .= 'CGPA : 0.00';
	    $result .= $this->members->display_second_semester($student_id,'2','3');
	    
	    $query3 = $this->members->total_weight($student_id,'1','1') + $this->members->total_weight($student_id,'2','1') + $this->members->total_weight($student_id,'1','2') + $this->members->total_weight($student_id,'2','2') + $this->members->total_weight($student_id,'1','3') + $this->members->total_weight($student_id,'2','3');
	    $query4 = $this->members->total_unit($student_id,'1','1') + $this->members->total_unit($student_id,'2','1') + $this->members->total_unit($student_id,'1','2') + $this->members->total_unit($student_id,'2','2') + $this->members->total_unit($student_id,'1','3') + $this->members->total_weight($student_id,'2','3') ;
	    
	    
	     if(($query3 != 0) && ($query4 != 0))
	    $result .= 'CGPA :'.round($query3/$query4,2);
	    
	    else
	    $result .= 'CGPA : 0.00';
	    return $result;
	}
	
	function fourthyear($student_id){
	    
	    $result = $this->members->display_first_semester($student_id,'1','4');
	    
	    $query1 = $this->members->total_weight($student_id,'1','1') + $this->members->total_weight($student_id,'2','1') + $this->members->total_weight($student_id,'1','2') + $this->members->total_weight($student_id,'2','2') + $this->members->total_weight($student_id,'1','3') + $this->members->total_weight($student_id,'2','3') + $this->members->total_weight($student_id,'1','4');
	    $query2 = $this->members->total_unit($student_id,'1','1') + $this->members->total_unit($student_id,'2','1') + $this->members->total_unit($student_id,'1','2') + $this->members->total_unit($student_id,'2','2') + $this->members->total_unit($student_id,'1','3') + $this->members->total_weight($student_id,'2','3') + $this->members->total_weight($student_id,'1','4') ;
	    
	    if(($query1 != 0) && ($query2 != 0))
	    $result .= 'CGPA :'.round($query1/$query2,2);
	    
	    else
	    $result .= 'CGPA : 0.00';
	    $result .= $this->members->display_second_semester($student_id,'2','4');
	    
	    $query3 = $this->members->total_weight($student_id,'1','1') + $this->members->total_weight($student_id,'2','1') + $this->members->total_weight($student_id,'1','2') + $this->members->total_weight($student_id,'2','2') + $this->members->total_weight($student_id,'1','3') + $this->members->total_weight($student_id,'2','3') + $this->members->total_weight($student_id,'1','4') + $this->members->total_weight($student_id,'2','4');
	    $query4 = $this->members->total_unit($student_id,'1','1') + $this->members->total_unit($student_id,'2','1') + $this->members->total_unit($student_id,'1','2') + $this->members->total_unit($student_id,'2','2') + $this->members->total_unit($student_id,'1','3') + $this->members->total_weight($student_id,'2','3') + $this->members->total_weight($student_id,'1','4') + $this->members->total_unit($student_id,'2','4') ;
	
	     if(($query3 != 0) && ($query4 != 0))
	    $result .= 'CGPA :'.round($query3/$query4,2);
	    
	    else
	    $result .= 'CGPA : 0.00';
	    return $result;
	}
	
	function fifthyear($student_id){
	    
	    $result = $this->members->display_first_semester($student_id,'1','5');
	    
	    
	    $query1 = $this->members->total_weight($student_id,'1','1') + $this->members->total_weight($student_id,'2','1') + $this->members->total_weight($student_id,'1','2') + $this->members->total_weight($student_id,'2','2') + $this->members->total_weight($student_id,'1','3') + $this->members->total_weight($student_id,'2','3') + $this->members->total_weight($student_id,'1','4') + $this->members->total_weight($student_id,'2','4') + $this->members->total_weight($student_id,'1','5');
	    $query2 = $this->members->total_unit($student_id,'1','1') + $this->members->total_unit($student_id,'2','1') + $this->members->total_unit($student_id,'1','2') + $this->members->total_unit($student_id,'2','2') + $this->members->total_unit($student_id,'1','3') + $this->members->total_weight($student_id,'2','3') + $this->members->total_weight($student_id,'1','4') + $this->members->total_unit($student_id,'2','4') + $this->members->total_unit($student_id,'1','5') ;
	    
	    
	    if(($query1 != 0) && ($query2 != 0))
	    $result .= 'CGPA :'.round($query1/$query2,2);
	    
	    else
	    $result .= 'CGPA : 0.00';	
	    $result .= $this->members->display_second_semester($student_id,'2','5');
	    
	    $query3 = $this->members->total_weight($student_id,'1','1') + $this->members->total_weight($student_id,'2','1') + $this->members->total_weight($student_id,'1','2') + $this->members->total_weight($student_id,'2','2') + $this->members->total_weight($student_id,'1','3') + $this->members->total_weight($student_id,'2','3') + $this->members->total_weight($student_id,'1','4') + $this->members->total_weight($student_id,'2','4') + $this->members->total_weight($student_id,'1','5') + $this->members->total_weight($student_id,'2','5');
	    $query4 = $this->members->total_unit($student_id,'1','1') + $this->members->total_unit($student_id,'2','1') + $this->members->total_unit($student_id,'1','2') + $this->members->total_unit($student_id,'2','2') + $this->members->total_unit($student_id,'1','3') + $this->members->total_weight($student_id,'2','3') + $this->members->total_weight($student_id,'1','4') + $this->members->total_unit($student_id,'2','4') + $this->members->total_unit($student_id,'1','5') + $this->members->total_unit($student_id,'2','5');
	    
	    if(($query3 != 0) && ($query4 != 0))
	    $result .= 'CGPA :'.round($query3/$query4,2);
	    
	    else
	    $result .= 'CGPA : 0.00';
	    return $result;
	}
	
	function display_first_semester($student_id,$semester1,$level){
	    
	   $this->db->select('*');
	   $this->db->from('scores');
	   $this->db->where(array('scores.student_id'=>$student_id,
				   'scores.semester'=>$semester1,
				   'scores.level'=>$level));
	   $this->db->join('courses','scores.course_id = courses.course_id');
	   //$this->db->join('students','scores.student_id= students.student_id');
	   $this->db->order_by('scores.date_added','desc');
	    
	    $query = $this->db->get();
	    	    
	    $result = "<h4>First Semester</h4>
			<table border = \"1\" width = \"100%\">
			
				    <tr>
					<th>Course Code</th>
					<th>Course Title</th>
					<th>Unit</th>
					<th>Score</th>
					<th>Grade</th>
					
			        </tr>
			";
	    
	    $weight = $totalunit = 0;
	    
	    foreach($query->result() as $row){
		
		$course_id = $row->course_id;
		$score = $row->score;
		$course_code = $row->course_code;
		$course_title = $row->course_title;

		$course_code = $this->members->get('course_code',array('course_id'=>$course_id),'courses');
		$course_title = $this->members->get('course_title',array('course_id'=>$course_id),'courses');
		$unit = $this->members->get('unit',array('course_id'=>$course_id),'courses');
		$grade = $this->members->getGrade($score);
		$point = $this->members->getPoint($grade) * $unit;
		
		$result .= "
			    <tr>
			    
				<td>$course_code</td>
				<td>$course_title</td>
				<td>$unit</td>
				<td>$score</td>
				<td>$grade</td>
			    </tr>
			    ";
		
		$weight += $point;
		$totalunit += $unit;
		
		//$total = $this->members->total_rows($student_id);
		//$range = range(1,$total);
	    }	    
	    
	    
	    $result .= "</table><br/><br/>";
	   
	    if(($weight != 0) && ($totalunit != 0))
		$result .= "GPA : ".round(($weight/$totalunit), 2)."<br/>";
		
	    else
		$result .= "GPA : 0.00<br/>";
		
	    
	    return $result;
	    
	}
	
	function display_second_semester($student_id,$semester2 ,$level){
	    
	   $this->db->select('*');
	   $this->db->from('scores');
	   $this->db->where(array('scores.student_id'=>$student_id,
				   'scores.semester'=>$semester2,
				   'scores.level'=>$level));
	   $this->db->join('courses','scores.course_id = courses.course_id');
	   //$this->db->join('students','scores.student_id= students.student_id');
	   $this->db->order_by('scores.date_added','desc');
	    
	    $query = $this->db->get();
	    	    
	    $result = "<h4>Second Semester</h4>
			<table border = \"1\" width = \"100%\">
			
				    <tr>
					<th>Course Code</th>
					<th>Course Title</th>
					<th>Unit</th>
					<th>Score</th>
					<th>Grade</th>
					
				    </tr>";
	    
	    $weight = $totalunit = 0;
	    
	    foreach($query->result() as $row){
		
		$course_id = $row->course_id;
		$score = $row->score;
		$course_code = $row->course_code;
		$course_title = $row->course_title;

		$course_code = $this->members->get('course_code',array('course_id'=>$course_id),'courses');
		$course_title = $this->members->get('course_title',array('course_id'=>$course_id),'courses');
		$unit = $this->members->get('unit',array('course_id'=>$course_id),'courses');
		$grade = $this->members->getGrade($score);
		$point = $this->members->getPoint($grade) * $unit;
		
		$result .= "
			    <tr>
				<td>$course_code</td>
				<td>$course_title</td>
				<td>$unit</td>
				<td>$score</td>
				<td>$grade</td>
			    </tr>";
		
		$weight += $point;
		$totalunit += $unit;
		
		
	    }
	    
	    
	    $result .= "</table><br/><br/>";
	    
	    if(($weight != 0) && ($totalunit != 0))   
		$result .= "GPA: ".round(($weight/$totalunit), 2)." <br/>";
	    else
		$result .= "GPA : 0.00<br/>";
	    //$result .= "<input name=\"Submit\" type=\"submit\" onClick=\"window.print()\" value=\"Print Transcript\" />";
	    
	    return $result;
	    
	}
	
	
	function total_weight($student_id,$semester,$level){
	    
	     $this->db->select('*');
	     $this->db->from('scores');
	     $this->db->where(array('scores.student_id'=>$student_id,
				   'scores.semester'=>$semester,
				   'scores.level'=>$level));
	   $this->db->join('courses','scores.course_id = courses.course_id');
	   //$this->db->join('students','scores.student_id= students.student_id');
	   $this->db->order_by('scores.date_added','desc');
	    
	    $query = $this->db->get();
	    	    
	    $result = "";
	    
	    $weight = $totalunit = 0;
	    
	    foreach($query->result() as $row){
		
		$course_id = $row->course_id;
		$score = $row->score;
		$course_code = $row->course_code;
		$course_title = $row->course_title;

		$course_code = $this->members->get('course_code',array('course_id'=>$course_id),'courses');
		$course_title = $this->members->get('course_title',array('course_id'=>$course_id),'courses');
		$unit = $this->members->get('unit',array('course_id'=>$course_id),'courses');
		$grade = $this->members->getGrade($score);
		$point = $this->members->getPoint($grade) * $unit;
		
		$result .= " ";
		
		$weight += $point;
		//$totalunit += $unit;
		
		//$total = $this->members->total_rows($student_id);
		//$range = range(1,$total);
	    }	    
	    
	    
	  
	   
	    if(($weight != 0))
		$result .= round($weight);
		
	    else
		$result .= 0;
		
	    
	    return $result;
	    
	}
	
	function total_unit($student_id,$semester,$level){
	    
	    
	      $this->db->select('*');
	     $this->db->from('scores');
	     $this->db->where(array('scores.student_id'=>$student_id,
				   'scores.semester'=>$semester,
				   'scores.level'=>$level));
	   $this->db->join('courses','scores.course_id = courses.course_id');
	   //$this->db->join('students','scores.student_id= students.student_id');
	   $this->db->order_by('scores.date_added','desc');
	    
	    $query = $this->db->get();
	    	    
	    $result = "";
	    
	    $weight = $totalunit = 0;
	    
	    foreach($query->result() as $row){
		
		$course_id = $row->course_id;
		$score = $row->score;
		$course_code = $row->course_code;
		$course_title = $row->course_title;

		$course_code = $this->members->get('course_code',array('course_id'=>$course_id),'courses');
		$course_title = $this->members->get('course_title',array('course_id'=>$course_id),'courses');
		$unit = $this->members->get('unit',array('course_id'=>$course_id),'courses');
		$grade = $this->members->getGrade($score);
		$point = $this->members->getPoint($grade) * $unit;
		
		$result .= " ";
		
		//$weight += $point;
		$totalunit += $unit;
		
		//$total = $this->members->total_rows($student_id);
		//$range = range(1,$total);
	    }	    
	    
	    
	  
	   
	    if(($totalunit != 0))
		$result .= round($totalunit);
		
	    else
		$result .= 0;
		
	    
	    return $result;
	    
	    
	    
	    
	    
	    
	}
	
	function get_level_session($student_id,$level){
	    
	   $this->db->select('session');
	   $this->db->from('scores');
	   $this->db->where(array('scores.student_id'=>$student_id,
				   'scores.level'=>$level));
	   //$this->db->join('courses','scores.course_id = courses.course_id');
	   //$this->db->join('students','scores.student_id= students.student_id');
	   //$this->db->order_by('scores.date_added','desc');
	   
	   $query = $this->db->get();
	   $res = '';
	   if($query == NULL){
		$res = 'Session Unavailable';
	   }
	    else{
	   foreach($query->result()  as $value){
	    
	    $res = $value->session;
	   }
	   
	    
	    }
	    return $res;
	}
	
	/*function total_units($student_id){
	    
	   $this->db->select('scores.unit');
	   $this->db->from('scores');
	   $this->db->where(array('scores.student_id'=>$student_id,
				   'scores.semester'=>1));
	   $this->db->join('courses','scores.course_id = courses.course_id');
	   //$this->db->join('students','scores.student_id= students.student_id');
	   $this->db->order_by('scores.date_added','desc');
	   
	   $query = $this->db->get();
	   return  $query->num_rows();
	    
	}*/
	
	
	 
	
	 
	
	

    }