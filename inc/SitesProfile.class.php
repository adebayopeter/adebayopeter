<?php
	require_once "DataObject.class.php";

	// Responsible for retrieving records from sitesprofile table in database
	Class SitesProfile extends DataObject {

		protected $data = array (
			"id" => "",
			"sitename" => "",
			"description" => "",
			"image1" => "",
			"image2" => "",
			"image3" => "",
			"categoryid" => "",
			"emailaddress" => "",
			"phonenumber1" => "",
			"phonenumber2" => "",
			"webaddress" => "",
			"client" => "",
			"clientaddress" => "",
			"datedelivered" => "",
			"datecreated" => "",
			"status" => ""
		);

		// to get All Sites Profiles without pagination
		public static function getSitesProfiles3($startRow, $numRows) {
			$conn = parent::connect();
			$sql = "SELECT sitename, sitesprofile.description AS description, image1, image2, image3, category.title AS category, emailaddress, phonenumber1, " .
					"phonenumber2, webaddress, client, clientaddress, datedelivered, datecreated, status FROM " . TBL_SITES . " JOIN " . TBL_CATEGORY . 
					" ON category.id = sitesprofile.categoryid WHERE status = :status  ORDER BY datedelivered DESC LIMIT :startRow, :numRows";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":startRow", $startRow, PDO::PARAM_INT);
				$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
				$st->bindValue(":status", 1, PDO::PARAM_INT);
				$st->execute();

				$sitesprofile = array();
				foreach ($st->fetchAll() as $row) {
					$sitesprofile[] = new SitesProfile($row);
				}
				parent::disconnect($conn);
				return $sitesprofile;
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// to get All Sites Profiles without pagination
		public static function getSitesProfiles($startRow, $numRows) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_SITES . " ORDER BY datedelivered DESC LIMIT :startRow, :numRows";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":startRow", $startRow, PDO::PARAM_INT);
				$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
				$st->execute();

				$sitesprofile = array();
				foreach ($st->fetchAll() as $row) {
					$sitesprofile[] = new SitesProfile($row);
				}
				parent::disconnect($conn);
				return $sitesprofile;
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// to get All Sites Profiles with pagination
		public static function getSitesProfiles1($startRow, $numRows, $order) {
			$conn = parent::connect();
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . TBL_SITES . " ORDER BY $order LIMIT :startRow, :numRows";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":startRow", $startRow, PDO::PARAM_INT);
				$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
				$st->execute();

				$sitesprofile = array();
				foreach ($st->fetchAll() as $row) {
					$sitesprofile[] = new SitesProfile($row);
				}
				$st = $conn->query("SELECT found_rows() AS totalRows");
				$row = $st->fetch();
				parent::disconnect($conn);
				return array($sitesprofile, $row["totalRows"]);
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// to get All Sites Profiles without pagination
		public static function getSitesProfilesAll($order) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_SITES . " ORDER BY $order DESC";

			try {
				$st = $conn->prepare($sql);
				$st->execute();

				$sitesprofile = array();
				foreach ($st->fetchAll() as $row) {
					$sitesprofile[] = new SitesProfile($row);
				}
				parent::disconnect($conn);
				return $sitesprofile;
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die("Query failed: " . $e->getMessage());
			}
		}

		// to get All Sites Profiles without pagination
		public static function getSitesProfilesAll2() {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_SITES . " ORDER BY datedelivered DESC";

			try {
				$st = $conn->prepare($sql);
				$st->execute();

				$sitesprofile = array();
				foreach ($st->fetchAll() as $row) {
					$sitesprofile[] = new SitesProfile($row);
				}
				parent::disconnect($conn);
				return $sitesprofile;
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die("Query failed: " . $e->getMessage());
			}
		}

		public static function getSitesProfile($id) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_SITES . " WHERE id = :id";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				if ($row) {
					return new SitesProfile($row);
				}
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// checks to see if site name exists or not
		public static function getSiteName($sitename) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_SITES . " WHERE sitename = :sitename";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":sitename", $sitename, PDO::PARAM_STR);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				if ($row) {
					return new SitesProfile($row);
				}
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// Get Site Details
		public static function getSiteDetails($sitename, $id) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_SITES . " WHERE sitename = :sitename AND id = :id";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":sitename", $sitename, PDO::PARAM_STR);
				$st->bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				if ($row) {
					return new SitesProfile($row);
				}
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}


		// Get Related Projects
		public static function getRelatedProject($categoryid, $sitename, $startRow, $numRows) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_SITES . " WHERE categoryid = :categoryid AND sitename != :sitename ORDER BY datedelivered DESC LIMIT :startRow, :numRows";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":categoryid", $categoryid, PDO::PARAM_INT);
				$st->bindValue(":sitename", $sitename, PDO::PARAM_STR);
				$st->bindValue(":startRow", $startRow, PDO::PARAM_INT);
				$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
				$st->execute();

				$sitesprofile = array();
				foreach ($st->fetchAll() as $row) {
					$sitesprofile[] = new SitesProfile($row);
				}
				parent::disconnect($conn);
				return $sitesprofile;
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		public function getSiteStatus() {
			return ($this->data["status"] == "1") ? "Online" : "Offline";
		}

		// adds a new site profile to the database table
		public function insert() {
			$conn = parent::connect();
			$sql = "INSERT INTO " . TBL_SITES . " ( 
								sitename,
								description,
								image1,
								image2,
								image3,
								categoryid,
								emailaddress,
								phonenumber1,
								phonenumber2,
								webaddress,
								client,
								clientaddress,
								datedelivered,
								datecreated,
								status
							) VALUES (
								:sitename,
								:description,
								:image1,
								:image2,
								:image3,
								:categoryid,
								:emailaddress,
								:phonenumber1,
								:phonenumber2,
								:webaddress,
								:client,
								:clientaddress,
								:datedelivered,
								:datecreated,
								:status							
							)";
			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":sitename", $this->data["sitename"], PDO::PARAM_STR);
				$st->bindValue(":description", $this->data["description"], PDO::PARAM_STR);
				$st->bindValue(":image1", $this->data["image1"], PDO::PARAM_STR);
				$st->bindValue(":image2", $this->data["image2"], PDO::PARAM_STR);
				$st->bindValue(":image3", $this->data["image3"], PDO::PARAM_STR);
				$st->bindValue(":categoryid", $this->data["categoryid"], PDO::PARAM_INT);
				$st->bindValue(":emailaddress", $this->data["emailaddress"], PDO::PARAM_STR);
				$st->bindValue(":phonenumber1", $this->data["phonenumber1"], PDO::PARAM_STR);
				$st->bindValue(":phonenumber2", $this->data["phonenumber2"], PDO::PARAM_STR);
				$st->bindValue(":webaddress", $this->data["webaddress"], PDO::PARAM_STR);
				$st->bindValue(":client", $this->data["client"], PDO::PARAM_STR);
				$st->bindValue(":clientaddress", $this->data["clientaddress"], PDO::PARAM_STR);
				$st->bindValue(":datedelivered", $this->data["datedelivered"], PDO::PARAM_STR);
				$st->bindValue(":datecreated", $this->data["datecreated"], PDO::PARAM_STR);
				$st->bindValue(":status", $this->data["status"], PDO::PARAM_INT);
				$st->execute();
				parent::disconnect($conn);
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die("Query failed: " . $e->getMessage());
			}
		}

		public function update() {
			$conn = parent::connect();
			$sql = "UPDATE " . TBL_SITES . " SET 
							sitename = :sitename,
							description = :description,
							image1 = :image1,
							image2 = :image2,
							image3 = :image3,
							categoryid = :categoryid,
							emailaddress = :emailaddress,
							phonenumber1 = :phonenumber1,
							phonenumber2 = :phonenumber2,
							webaddress = :webaddress,
							client = :client,
							clientaddress = :clientaddress,
							datecreated = :datecreated,
							status = :status
							WHERE id = :id";
			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":id", $this->data["id"], PDO::PARAM_INT);
				$st->bindValue(":sitename", $this->data["sitename"], PDO::PARAM_STR);
				$st->bindValue(":description", $this->data["description"], PDO::PARAM_STR);
				$st->bindValue(":image1", $this->data["image1"], PDO::PARAM_STR);
				$st->bindValue(":image2", $this->data["image2"], PDO::PARAM_STR);
				$st->bindValue(":image3", $this->data["image3"], PDO::PARAM_STR);
				$st->bindValue(":categoryid", $this->data["categoryid"], PDO::PARAM_INT);
				$st->bindValue(":emailaddress", $this->data["emailaddress"], PDO::PARAM_STR);
				$st->bindValue(":phonenumber1", $this->data["phonenumber1"], PDO::PARAM_STR);
				$st->bindValue(":phonenumber2", $this->data["phonenumber2"], PDO::PARAM_STR);
				$st->bindValue(":webaddress", $this->data["webaddress"], PDO::PARAM_STR);
				$st->bindValue(":client", $this->data["client"], PDO::PARAM_STR);
				$st->bindValue(":clientaddress", $this->data["clientaddress"], PDO::PARAM_STR);
				$st->bindValue(":datecreated", $this->data["datecreated"], PDO::PARAM_STR);
				$st->bindValue(":status", $this->data["status"], PDO::PARAM_INT);								
				$st->execute();
				parent::disconnect($conn);
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		public function delete() {
			$conn = parent::connect();
			$sql = "DELETE FROM " . TBL_SITES . " WHERE id = :id";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":id", $this->data["id"], PDO::PARAM_INT);
				$st->execute();
				parent::disconnect($conn);
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}		
	}
?>