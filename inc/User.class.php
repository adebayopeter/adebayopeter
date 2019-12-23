<?php
	require_once "DataObject.class.php";

	class User extends DataObject {

		protected $data = array (
			"id" => "",
			"username" => "",
			"password" => "",
			"firstname" => "",
			"lastname" => "",
			"image" => "",
			"emailaddress" => "",
			"phonenumber1" => "",
			"phonenumber2" => "",
			"rolecategory" => "",
		);

		public static function getUsers($startRow, $numRows, $order) {
			$conn = parent::connect();
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . TBL_USERS . " ORDER BY $order LIMIT :startRow, :numRows";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":startRow", $startRow, PDO::PARAM_INT);
				$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
				$st->execute();

				$users = array();
				foreach ($st->fetchAll() as $row) {
					$users[] = new User($row);
				}
				$st = $conn->query("SELECT found_rows() AS totalRows");
				$row = $st->fetch();
				parent::disconnect($conn);
				return array($users, $row["totalRows"]);
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		public static function getUser($id) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_USERS . " WHERE id = :id";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				if ($row) {
					return new User($row);
				}
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// checks to see if username exists or not
		public static function getUsername($username) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_USERS . " WHERE username = :username";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":username", $username, PDO::PARAM_STR);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				if ($row) {
					return new User($row);
				}
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// checks to see if emailaddress exists or not
		public static function getEmailAddress($emailaddress) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_USERS . " WHERE emailaddress = :emailaddress";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":emailaddress", $emailaddress, PDO::PARAM_STR);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				if ($row) {
					return new User($row);
				}
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// add a new user to the database table
		public function insert() {
			$conn = parent::connect();
			$sql = "INSERT INTO " . TBL_USERS . " (
								username,
								password,
								firstname,
								lastname,
								image,
								emailaddress,
								phonenumber1,
								phonenumber2,
								rolecategory
							) VALUES (
								:username,
								:password,
								:firstname,
								:lastname,
								:image,
								:emailaddress,
								:phonenumber1,
								:phonenumber2,
								:rolecategory							
							)";
			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":username", $this->data["username"], PDO::PARAM_STR);
				$st->bindValue(":password", $this->data["password"], PDO::PARAM_STR);
				$st->bindValue(":firstname", $this->data["firstname"], PDO::PARAM_STR);
				$st->bindValue(":lastname", $this->data["lastname"], PDO::PARAM_STR);
				$st->bindValue(":image", $this->data["image"], PDO::PARAM_STR);
				$st->bindValue(":emailaddress", $this->data["emailaddress"], PDO::PARAM_STR);
				$st->bindValue(":phonenumber1", $this->data["phonenumber1"], PDO::PARAM_STR);
				$st->bindValue(":phonenumber2", $this->data["phonenumber2"], PDO::PARAM_STR);
				$st->bindValue(":rolecategory", $this->data["rolecategory"], PDO::PARAM_STR);
				$st->execute();
				parent::disconnect($conn);
			} catch (PDOException $e)  {
				parent::disconnect($conn);
				die("Query failed: " . $e->getMessage());
			}
		}	

		// authenticate users log in
		public function authenticate() {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_USERS . " WHERE username = :username AND password = :password";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":username", $this->data["username"], PDO::PARAM_STR);
				$st->bindValue(":password", $this->data["password"], PDO::PARAM_STR);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				if ($row) {
					return new User($row);
				}
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die("Query failed: " . $e->getMessage());
			}
		}

		public function update() {
			$conn = parent::connect();
			$sql = "UPDATE " . TBL_USERS . " SET 
								username = :username,
								password = :password,
								firstname = :firstname,
								lastname = :lastname,
								image = :image,
								emailaddress = :emailaddress,
								phonenumber1 = :phonenumber1,
								phonenumber2 = :phonenumber2,
								rolecategory = :rolecategory
								WHERE id = :id";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":id", $this->data["id"], PDO::PARAM_INT);
				$st->bindValue(":username", $this->data["username"], PDO::PARAM_STR);
				if ($this->data["password"]) $st->bindValue(":password", $this->data["password"], PDO::PARAM_STR);
				$st->bindValue(":firstname", $this->data["firstname"], PDO::PARAM_STR);
				$st->bindValue(":lastname", $this->data["lastname"], PDO::PARAM_STR);
				$st->bindValue(":image", $this->data["image"], PDO::PARAM_STR);
				$st->bindValue(":emailaddress", $this->data["emailaddress"], PDO::PARAM_STR);
				$st->bindValue(":phonenumber1", $this->data["phonenumber1"], PDO::PARAM_STR);
				$st->bindValue(":phonenumber2", $this->data["phonenumber2"], PDO::PARAM_STR);
				$st->bindValue(":rolecategory", $this->data["rolecategory"], PDO::PARAM_STR);
				$st->execute();
				parent::disconnect($conn);
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die("Query failed: " . $e->getMessage());
			}
		}

		public function delete() {
			$conn = parent::connect();
			$sql = "DELETE FROM " . TBL_USERS . " WHERE id = :id";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":id", $this->data["id"], PDO::PARAM_INT);
				$st->execute();
				parent::disconnect($conn);
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die("Query failed: " . $e->getMessage());
			}
		}
	}
?>