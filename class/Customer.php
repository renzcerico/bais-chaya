<?php
class Customer {
	public $conn;

	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function counter($id) {
		$sql = 'SELECT
					 count(ch.id) as total_child,
					 count(cu.id) as total_custodian,
					 count(h.id) as family_application
			    FROM tbl_child ch 
				LEFT JOIN tbl_custodian cu ON cu.child_id = ch.id
				LEFT JOIN tbl_household h ON h.parent_id = ch.parent_id
				WHERE ch.parent_id = :id';
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function login($data) {
		$email_address = strtolower(htmlspecialchars($data['email_address']));
		$password = md5(htmlspecialchars($data['password']));

		$sql = "SELECT id, first_name, status FROM tbl_parents WHERE email_address = :email_address AND password = :password";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':email_address', $email_address);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$count = $stmt->rowCount();

		if ($count > 0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);
			$result = [];

			$result = ['id' => $id, 'status' => $status, 'first_name' => $first_name]; 
			
			return json_encode($result);
		} else {
			return false;
		}
	}

	
	public function email($email) {
		$email_address = strtolower(htmlspecialchars($email));

		$sql = "SELECT * FROM tbl_parents WHERE email_address = :email_address";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':email_address', $email_address);
		$stmt->execute();
		$count = $stmt->rowCount();

		if ($count > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function forgot($data) {
		$email_address = strtolower(htmlspecialchars($data['email']));
		$sec_ques = strtolower(htmlspecialchars($data['sec_ques']));
		$sec_ans = strtolower(htmlspecialchars($data['sec_ans']));

		$sql = "SELECT 
					* 
				FROM tbl_parents 
				WHERE email_address = :email_address 
				AND security_question = :sec_ques
				AND security_answer = :sec_ans";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':email_address', $email_address);
		$stmt->bindParam(':sec_ques', $sec_ques);
		$stmt->bindParam(':sec_ans', $sec_ans);
		$stmt->execute();
		$count = $stmt->rowCount();

		if ($count > 0) {
			$random = $this->random_secret();
			// mailForgot($email_address, $random);
			$this->resetPassword($email_address, $random);
			return true;
		} else {
			return false;
		}
	}

	public function mailForgot($email, $random) {
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: Bais Chaya Academy";

		$to = $email;
		$subject = 'Password Reset';
		$message = 'Your new password is ' . $random;

		mail($to, $subject, $html, $headers);
	}

	public function resetPassword($email, $code) {
		$email = $email;
		$code = md5($code);
		
		$sql = "UPDATE tbl_parents SET password = :code WHERE email_address = :email";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':code', $code);
		$stmt->execute();
	}

	public function adminlogin($data) {
		$email_address = strtolower(htmlspecialchars($data['email_address']));
		$password = md5(htmlspecialchars($data['password']));

		$sql = "SELECT id, first_name, status FROM tbl_admin WHERE email_address = :email_address AND password = :password";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':email_address', $email_address);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$count = $stmt->rowCount();

		if ($count > 0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);
			$result = [];

			$result = ['id' => $id, 'status' => $status, 'first_name' => $first_name]; 
			
			return json_encode($result);
		} else {
			return false;
		}
	}

	public function getEmail($id) {
		$sql = 'SELECT email_address FROM tbl_parents WHERE id = :id';

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);

			return $email_address;
		} else {
			return false;
		}
	}

	public function resendVerification($id) {
		$email = $this->getEmail($id); 
		
		if ($email) {
			$random = $this->random_secret();
			$randomHash = md5($random);
			
			$sql = 'UPDATE tbl_parents SET secret = :secret WHERE id = :id';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':secret', $randomHash);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			
			$this->mail($email, $random);

			return 200;
		} else {
			return false;
		}

	}

	public function random_secret() {
		$random = rand(1,100000);
		return $random;
	}

	// public function mail($email, $random) {
	// 	$from = 'Bais Chaya Academy';
	// 	$to = $email;
	// 	$subject = 'Email Confirmation';
	// 	$message = 'Please verify your email address. Verification code is ' . $random;

	// 	mail($subject, $from, $to, $message);
	// }

	public function mail($email, $random) {
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: Bais Chaya Academy";

		$to = $email;
		$subject = 'Email Confirmation';
		$message = 'Please verify your email address. Verification code is ' . $random;

		mail($to, $subject, $html, $headers);
	}

	public function insert($data) {
		try {
			$secret = $this->random_secret();
			$last_name = ucwords(htmlspecialchars($data['last_name']));
			$first_name = ucwords(htmlspecialchars($data['first_name']));
			$middle_name = ucwords(htmlspecialchars($data['middle_name'])) || '';
			$email_address = strtolower(htmlspecialchars($data['email_address']));
			$sec_ques = strtolower(htmlspecialchars($data['sec_ques']));
			$sec_ans = strtolower(htmlspecialchars($data['sec_ans']));
			$password = md5($data['password']);
			$secret = '12345';
			$secret_md5 = md5($secret);


			$sql = "INSERT INTO tbl_parents SET
							last_name = :last_name,
							first_name = :first_name,
							middle_name = :middle_name,
							email_address = :email_address,
							password = :password,
							secret = :secret,
							security_question = :sec_ques,
							security_answer = :sec_ans,
							status = 'pending'";

			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':last_name', $last_name);
			$stmt->bindParam(':first_name', $first_name);
			$stmt->bindParam(':middle_name', $middle_name);
			$stmt->bindParam(':email_address', $email_address);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':secret', $secret_md5);
			$stmt->bindParam(':sec_ques', $sec_ques);
			$stmt->bindParam(':sec_ans', $sec_ans);
			$stmt->execute();

			$this->mail($email_address, $secret);

			return 200;
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
	}

	public function secret($id) {
		$sql = "SELECT secret FROM tbl_parents WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$count = $stmt->rowCount();

		if ($count > 0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);

			return $secret;
		} else {
			return 422;
		}

	}

	public function verify($id, $code) {
		$id = $id;
		$code = md5($code);
		$secret = $this->secret($id);
		
		if ($secret == $code) {
			$sql = "UPDATE tbl_parents SET status = 'verified' WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			return 200;
		} else {
			return 422;
		}
	}

	public function insertFamilyApplication($data, $id) {
		try {
			// PART 1. All household members
			// $child_id = $data['to_array'][4]['child_id'];

			if (count($data['to_array'][0]) > 0) {
				$sqlMeal = "INSERT INTO tbl_meal SET parent_id = :id";
				$stmtMeal = $this->conn->prepare($sqlMeal);
				$stmtMeal->bindParam(':id', $id);
				$stmtMeal->execute();

				$mealID = $this->conn->lastInsertId();

				foreach($data['to_array'][0] as $household) {
					$household_name = $household['name'];
					$household_student_id = $household['student_id'];
					$household_foster = $household['household_foster'];
					$household_homeless = $household['household_homeless'];
					$household_migrant = $household['household_migrant'];
					$household_runaway = $household['household_runaway'];
					$household_headstart = $household['household_headstart'];
					$household_no_income = $household['household_no_income'];
	
					$sql = "INSERT INTO tbl_household 
									SET name = :household_name,
										student_id = :household_student_id,
										foster = :household_foster,
										homeless = :household_homeless,
										migrant = :household_migrant,
										runaway = :household_runaway,
										headstart = :household_headstart,
										no_income = :household_no_income,
										meal_id = :id
					";
	
					$stmt = $this->conn->prepare($sql);
					$stmt->bindParam(':household_name', $household_name);
					$stmt->bindParam(':household_student_id', $household_student_id);
					$stmt->bindParam(':household_foster', $household_foster);
					$stmt->bindParam(':household_homeless', $household_homeless);
					$stmt->bindParam(':household_migrant', $household_migrant);
					$stmt->bindParam(':household_runaway', $household_runaway);
					$stmt->bindParam(':household_headstart', $household_headstart);
					$stmt->bindParam(':household_no_income', $household_no_income);
					$stmt->bindParam(':id', $mealID);
					// $stmt->bindParam(':child_id', $child_id);
					$stmt->execute();
				}	
			}

			// Part 2. Benefits
			$benefits_name = $data['to_array'][1][0]['benefits_name'] || '';
			$benefits_program_name = $data['to_array'][1][0]['benefits_program_name'] || '';
			$benefits_card_number = $data['to_array'][1][0]['benefits_card_number'] || '';

			$sql_benefits = "INSERT INTO tbl_benefits 
									SET name = :benefits_name,
										program_name = :benefits_program_name,
										card_number = :benefits_card_number,
										meal_id = :id
			";

			$stmt_benefits = $this->conn->prepare($sql_benefits);
			$stmt_benefits->bindParam(':benefits_name', $benefits_name);
			$stmt_benefits->bindParam(':benefits_program_name', $benefits_program_name);
			$stmt_benefits->bindParam(':benefits_card_number', $benefits_card_number);
			$stmt_benefits->bindParam(':id', $mealID);
			// $stmt_benefits->bindParam(':child_id', $child_id);

			if ($benefits_name) {
				$stmt_benefits->execute();
			}


			// Part 3. Total Income
			foreach($data['to_array'][2] as $total_income) { 
				$total_name = $total_income['total_name'];

				$total_deductions = $total_income['total_deductions'];
				$total_deductions_weekly = $total_income['total_deductions_weekly'];
				$total_deductions_2_weeks = $total_income['total_deductions_2_weeks'];
				$total_deductions_twice_monthly = $total_income['total_deductions_twice_monthly'];
				$total_deductions_monthly = $total_income['total_deductions_monthly'];
	
				$total_walfare = $total_income['total_walfare'] || '';
				$total_walfare_weekly = $total_income['total_walfare_weekly'];
				$total_walfare_2_weeks = $total_income['total_walfare_2_weeks'];
				$total_walfare_twice_monthly = $total_income['total_walfare_twice_monthly'];
				$total_walfare_monthly = $total_income['total_walfare_monthly'];
	
				$total_social = $total_income['total_social'] || '';
				$total_social_weekly = $total_income['total_social_weekly'];
				$total_social_2_weeks = $total_income['total_social_2_weeks'];
				$total_social_twice_monthly = $total_income['total_social_twice_monthly'];
				$total_social_monthly = $total_income['total_social_monthly'];
	
				$total_other = $total_income['total_other'] || '';
				$total_other_weekly = $total_income['total_other_weekly'];
				$total_other_2_weeks = $total_income['total_other_2_weeks'];
				$total_other_twice_monthly = $total_income['total_other_twice_monthly'];
				$total_other_monthly = $total_income['total_other_monthly'];
	
				$sql_total_income = "INSERT INTO tbl_total_income 
										SET name = :total_name,
											earnings = :total_deductions,
											weekly_earnings = :total_deductions_weekly,
											two_weeks_earnings = :total_deductions_2_weeks,
											twice_monthly_earnings = :total_deductions_twice_monthly,
											monthly_earnings = :total_deductions_monthly,
											welfare = :total_walfare,
											weekly_welfare = :total_walfare_weekly,
											two_weeks_welfare = :total_walfare_2_weeks,
											twice_monthly_welfare = :total_walfare_twice_monthly,
											monthly_welfare = :total_walfare_monthly,
											sss = :total_social,
											weekly_sss = :total_social_weekly,
											two_weeks_sss = :total_social_2_weeks,
											twice_monthly_sss = :total_social_twice_monthly,
											monthly_sss = :total_social_monthly,
											other = :total_other,
											weekly_other = :total_other_weekly,
											two_weeks_other = :total_other_2_weeks,
											twice_monthly_other = :total_other_twice_monthly,
											monthly_other = :total_other_monthly,
											meal_id = :id
				";
	
				$stmt_total_income = $this->conn->prepare($sql_total_income);
				$stmt_total_income->bindParam(':total_name', $total_name);
				$stmt_total_income->bindParam(':total_deductions', $total_deductions);
				$stmt_total_income->bindParam(':total_deductions_weekly', $total_deductions_weekly);
				$stmt_total_income->bindParam(':total_deductions_2_weeks', $total_deductions_2_weeks);
				$stmt_total_income->bindParam(':total_deductions_twice_monthly', $total_deductions_twice_monthly);
				$stmt_total_income->bindParam(':total_deductions_monthly', $total_deductions_monthly);
				$stmt_total_income->bindParam(':total_walfare', $total_walfare);
				$stmt_total_income->bindParam(':total_walfare_weekly', $total_walfare_weekly);
				$stmt_total_income->bindParam(':total_walfare_2_weeks', $total_walfare_2_weeks);
				$stmt_total_income->bindParam(':total_walfare_twice_monthly', $total_walfare_twice_monthly);
				$stmt_total_income->bindParam(':total_walfare_monthly', $total_walfare_monthly);
				$stmt_total_income->bindParam(':total_social', $total_social);
				$stmt_total_income->bindParam(':total_social_weekly', $total_social_weekly);
				$stmt_total_income->bindParam(':total_social_2_weeks', $total_social_2_weeks);
				$stmt_total_income->bindParam(':total_social_twice_monthly', $total_social_twice_monthly);
				$stmt_total_income->bindParam(':total_social_monthly', $total_social_monthly);
				$stmt_total_income->bindParam(':total_other', $total_other);
				$stmt_total_income->bindParam(':total_other_weekly', $total_other_weekly);
				$stmt_total_income->bindParam(':total_other_2_weeks', $total_other_2_weeks);
				$stmt_total_income->bindParam(':total_other_twice_monthly', $total_other_twice_monthly);
				$stmt_total_income->bindParam(':total_other_monthly', $total_other_monthly);
				$stmt_total_income->bindParam(':id', $mealID);
				// $stmt_total_income->bindParam(':child_id', $child_id);
				$stmt_total_income->execute();
			}
			
			// Part 4. Adult Signature
			$adult_signature = $data['to_array'][3][0]['adult_signature'] || '';
			$adult_name = $data['to_array'][3][0]['adult_name'];
			$adult_date = $data['to_array'][3][0]['adult_date'];
			$adult_address = $data['to_array'][3][0]['adult_address'];
			$adult_phone_number = $data['to_array'][3][0]['adult_phone_number'];
			$adult_email = $data['to_array'][3][0]['adult_email'];
			$adult_city = $data['to_array'][3][0]['adult_city'];
			$adult_state = $data['to_array'][3][0]['adult_state'];
			$adult_zip = $data['to_array'][3][0]['adult_zip'];
			$adult_social_security = $data['to_array'][3][0]['adult_social_security'];
			$adult_no_social_security = $data['to_array'][3][0]['adult_no_social_security'];
			$share_information = $data['to_array'][3][0]['share_information'];
			$ethnicity = $data['to_array'][3][0]['ethnicity'];
			$ethnicity_asian = $data['to_array'][3][0]['ethnicity_asian'];
			$ethnicity_indian = $data['to_array'][3][0]['ethnicity_indian'];
			$ethnicity_african = $data['to_array'][3][0]['ethnicity_african'];
			$ethnicity_white = $data['to_array'][3][0]['ethnicity_white'];
			$ethnicity_hawaiian = $data['to_array'][3][0]['ethnicity_hawaiian'];

			$sql_adult_signature = "INSERT INTO tbl_adult_signature 
											SET signature = :adult_signature, 
												name = :adult_name, 
												date_applicant = :adult_date, 
												address = :adult_address, 
												phone_number = :adult_phone_number, 
												email_address = :adult_email, 
												city = :adult_city, 
												state = :adult_state, 
												zip_code = :adult_zip, 
												sss = :adult_social_security, 
												sss_none = :adult_no_social_security, 
												share_info = :share_information, 
												ethnicity = :ethnicity, 
												ethnicity_asian = :ethnicity_asian, 
												ethnicity_white = :ethnicity_indian, 
												ethnicity_american = :ethnicity_african, 
												ethnicity_native = :ethnicity_white, 
												ethnicity_black = :ethnicity_hawaiian, 
												meal_id = :id
			";

			$stmt_adult_signature = $this->conn->prepare($sql_adult_signature);
			$stmt_adult_signature->bindParam(':adult_signature', $adult_signature);
			$stmt_adult_signature->bindParam(':adult_name', $adult_name);
			$stmt_adult_signature->bindParam(':adult_date', $adult_date);
			$stmt_adult_signature->bindParam(':adult_address', $adult_address);
			$stmt_adult_signature->bindParam(':adult_phone_number', $adult_phone_number);
			$stmt_adult_signature->bindParam(':adult_email', $adult_email);
			$stmt_adult_signature->bindParam(':adult_city', $adult_city);
			$stmt_adult_signature->bindParam(':adult_state', $adult_state);
			$stmt_adult_signature->bindParam(':adult_zip', $adult_zip);
			$stmt_adult_signature->bindParam(':adult_social_security', $adult_social_security);
			$stmt_adult_signature->bindParam(':adult_no_social_security', $adult_no_social_security);
			$stmt_adult_signature->bindParam(':share_information', $share_information);
			$stmt_adult_signature->bindParam(':ethnicity', $ethnicity);
			$stmt_adult_signature->bindParam(':ethnicity_asian', $ethnicity_asian);
			$stmt_adult_signature->bindParam(':ethnicity_indian', $ethnicity_indian);
			$stmt_adult_signature->bindParam(':ethnicity_african', $ethnicity_african);
			$stmt_adult_signature->bindParam(':ethnicity_white', $ethnicity_white);
			$stmt_adult_signature->bindParam(':ethnicity_hawaiian', $ethnicity_hawaiian);
			$stmt_adult_signature->bindParam(':id', $mealID);
			// $stmt_adult_signature->bindParam(':child_id', $child_id);
			
			if ($adult_name) {
				$stmt_adult_signature->execute();
			}

			return 200;
		} catch(PDOException $ex) {
			return $ex->getMessage();
			die();
		}
	}
	public function getAllParents() {
		$sql = "SELECT id, 
					   CONCAT(last_name, ', ', first_name, ' ', LEFT(middle_name, 1)) as parent_name,
			 		   email_address,
					   status,
					   created_at  
				FROM tbl_parents
			   ";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt;
	}

	public function getAllParentsArchives() {
		$sql = "SELECT p.id, 
					   CONCAT(p.last_name, ', ', p.first_name, ' ', LEFT(p.middle_name, 1)) as parent_name,
			 		   p.email_address,
					   p.status,
					   m.id as meal_id,
					   ma.year,
					   p.created_at  
				FROM tbl_parents p
					LEFT JOIN tbl_meal m ON m.parent_id = p.id
					RIGHT JOIN tbl_meal_archives ma ON ma.meal_id = m.id
			   ";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt;		
	}

	public function getFamilyApplication($id) {
		$sql = "SELECT
					parents.id,
					CONCAT(parents.last_name, ', ', parents.first_name, ' ', LEFT(parents.middle_name, 1)) as parent_name,
					parents.email_address,
					GROUP_CONCAT()adult.*,
					benefits.*,
					household.*,
					income.*
				FROM tbl_parents parents
				LEFT JOIN tbl_meal meal ON meal.parent_id = parents.id 
				LEFT JOIN tbl_adult_signature adult ON adult.meal_id = meal.id
				LEFT JOIN tbl_benefits benefits ON benefits.meal_id = meal.id
				LEFT JOIN tbl_household household ON household.meal_id = meal.id
				LEFT JOIN tbl_total_income income ON income.meal_id = meal.id";

		$stmt = $this->conn->prepare($sql);
		$stmtParents->bindParam(':id', $id);
		$stmt->execute();

		return $stmt;
	}

	public function familyApplication($id) {
		// $sql = "SELECT
		// 		parents.id,
		// 		CONCAT(parents.last_name, ', ', parents.first_name, ' ', LEFT(parents.middle_name, 1)) as parent_name,
		// 		parents.email_address,
		// 		adult.*,
		// 		benefits.*,
		// 		household.*,
		// 		income.*
		// 	FROM tbl_parents parents
		// 	LEFT JOIN tbl_adult_signature adult ON adult.parent_id = parents.id
		// 	LEFT JOIN tbl_benefits benefits ON benefits.parent_id = parents.id
		// 	LEFT JOIN tbl_household household ON household.parent_id = parents.id
		// 	LEFT JOIN tbl_total_income income ON income.parent_id = parents.id
		// 	WHERE parents.id = :id";
		
		// $sqlParents = "SELECT parents.id,
		// 					CONCAT(parents.last_name, ', ', parents.first_name, ' ', LEFT(parents.middle_name, 1)) as parent_name,
		// 					parents.email_address
		// 			  FROM tbl_parents parents";
		// $stmtParents = $this->conn->prepare($sqlParents);
		// $stmtParents->bindParam(':id', $id);
		// $stmtParents->execute();
		// $stmtParents = $stmtParents->fetchAll(PDO::FETCH_ASSOC);

		$sqlMeal = "SELECT id FROM tbl_meal WHERE parent_id = :id LIMIT 1";
		$stmtMeal = $this->conn->prepare($sqlMeal);
		$stmtMeal->bindParam(':id', $id);
		$stmtMeal->execute();
		$row = $stmtMeal->fetch(PDO::FETCH_ASSOC);
		$mealID = $row['id'];


		$sqlAdult = "SELECT * FROM tbl_adult_signature WHERE meal_id = :id";
		$stmtAdult = $this->conn->prepare($sqlAdult);
		$stmtAdult->bindParam(':id', $mealID);
		$stmtAdult->execute();
		$stmtAdult = $stmtAdult->fetch(PDO::FETCH_ASSOC);

		$sqlBenefits = "SELECT * FROM tbl_benefits WHERE meal_id = :id";
		$stmtBenefits = $this->conn->prepare($sqlBenefits);
		$stmtBenefits->bindParam(':id', $mealID);
		$stmtBenefits->execute();
		$stmtBenefits = $stmtBenefits->fetchAll(PDO::FETCH_ASSOC);

		$sqlHousehold = "SELECT * FROM tbl_household WHERE meal_id = :id";
		$stmtHousehold = $this->conn->prepare($sqlHousehold);
		$stmtHousehold->bindParam(':id', $mealID);
		$stmtHousehold->execute();
		$stmtHousehold = $stmtHousehold->fetchAll(PDO::FETCH_ASSOC);

		$sqlIncome = "SELECT * FROM tbl_total_income WHERE meal_id = :id";
		$stmtIncome = $this->conn->prepare($sqlIncome);
		$stmtIncome->bindParam(':id', $mealID);
		$stmtIncome->execute();
		$stmtIncome = $stmtIncome->fetchAll(PDO::FETCH_ASSOC);

		$array = [
			// 'parents' => ($stmtParents),
			'adult' => ($stmtAdult),
			'benefits' => ($stmtBenefits),
			'household' => ($stmtHousehold),
			'income' => ($stmtIncome),
		];

		return $array;
	}

	public function getAllChild() {
		$sql = "SELECT c.id, 
						p.id parent_id,
					   CONCAT(c.last_name, ', ', c.first_name, ' ', LEFT(c.middle_name, 1), '.') as child_name,
					   CONCAT(p.last_name, ', ', p.first_name, ' ', LEFT(p.middle_name, 1), '.') as parent_name,
					   c.created_at  
				FROM tbl_child c
					LEFT JOIN tbl_parents p ON p.id = c.parent_id
				WHERE
					c.id NOT IN (SELECT child_id FROM tbl_child_archives)  
			   ";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt;
	}

	public function getAllChildArchives() {
		$sql = "SELECT c.id, 
						p.id parent_id,
						CONCAT(c.last_name, ', ', c.first_name, ' ', LEFT(c.middle_name, 1), '.') as child_name,
						CONCAT(p.last_name, ', ', p.first_name, ' ', LEFT(p.middle_name, 1), '.') as parent_name,
						ca.year,
						c.created_at  
				FROM tbl_child c
					LEFT JOIN tbl_parents p ON p.id = c.parent_id
					RIGHT JOIN tbl_child_archives ca ON ca.child_id = c.id
				";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt;
	}

	public function getMyProfile($id, $userLevel) {
		if ($userLevel === 'admin') {
			$sql = 'SELECT last_name, 
					   first_name, 
					   middle_name, 
					   email_address 
				FROM tbl_admin
				WHERE id = :id';
		} else {
			$sql = 'SELECT last_name, 
					first_name, 
					middle_name, 
					email_address 
			FROM tbl_parents
			WHERE id = :id';
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return $stmt;
	}

	public function updateMyProfile($data) {
		if ($data['userLevel'] === 'admin') {
			$sql = 'UPDATE tbl_admin
					SET last_name = :last_name, 
					   first_name = :first_name, 
					   middle_name = :middle_name, 
					   email_address = :email_address 
				WHERE id = :id';
		} else {
			$sql = 'UPDATE tbl_parents
					SET last_name = :last_name, 
					   first_name = :first_name, 
					   middle_name = :middle_name, 
					   email_address = :email_address 
				WHERE id = :id';
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $data['id']);
		$stmt->bindParam(':last_name', $data['lastname']);
		$stmt->bindParam(':first_name', $data['firstname']);
		$stmt->bindParam(':middle_name', $data['middlename']);
		$stmt->bindParam(':email_address', $data['email']);
		$stmt->execute();

		return 200;
	}

	public function changePassword($data) {
		$password = md5(htmlspecialchars($data['password']));
		
		if ($data['userLevel'] === 'admin') {
			$sql = 'UPDATE tbl_admin
					SET password = :password
				WHERE id = :id';
		}  else {
			$sql = 'UPDATE tbl_parents
					SET password = :password
				WHERE id = :id';
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $data['id']);
		$stmt->bindParam(':password', $password);
		$stmt->execute();

		return 200;
	}

	public function isCheck($data) {
		$password = md5($data['password']);

		if ($data['userLevel'] === 'admin') {
			$sql = 'SELECT *
				FROM tbl_admin
				WHERE id = :id AND password = :password';
		} else {
			$sql = 'SELECT *
				FROM tbl_parents
				WHERE id = :id AND password = :password';
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $data['id']);
		$stmt->bindParam(':password', $password);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			return 200;
		} else {
			return 401;
		}
	}

}


?>