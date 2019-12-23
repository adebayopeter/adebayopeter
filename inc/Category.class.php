<?php
	require_once "DataObject.class.php";

	// Responsible for retrieving records from sitesprofile table in database
	Class SiteCategory extends DataObject {

		protected $data = array (
			"id" => "",
			"title" => "",
			"alias" => "",
			"description" => ""
		);

		// Get All Category
		public static function getCategories() {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_CATEGORY . " ORDER BY id ASC";

			try {
				$st = $conn->prepare($sql);
				$st->execute();

				$sitescategory = array();
				foreach ($st->fetchAll() as $row) {
					$sitescategory[] = new SiteCategory($row);
				}
				parent::disconnect($conn);
				return $sitescategory;
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die("Query failed: " . $e->getMessage());
			}
		}

		// Get a Category by id
		public static function getCategory($id) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_CATEGORY . " WHERE id = :id";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				if ($row) {
					return new SiteCategory($row);
				}
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// Get a Category by name/title and alias
		public static function getCategoryTitle($id) {
			$conn = parent::connect();
			$sql = "SELECT title, alias FROM " . TBL_CATEGORY . " WHERE id = :id";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				if ($row) {
					return new SiteCategory($row);
				}
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// Get count for a category
		public static function getCategoryCount($title) {
			$conn = parent::connect();
			$sql = "SELECT count(id) FROM " . TBL_CATEGORY . " WHERE title = :title";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":title", $title, PDO::PARAM_STR);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				return $row;
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// checks to see if category name exists or not
		public static function getCategoryName($categoryname) {
			$conn = parent::connect();
			$sql = "SELECT * FROM " . TBL_CATEGORY . " WHERE title = :categoryname";

			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":categoryname", $categoryname, PDO::PARAM_STR);
				$st->execute();
				$row = $st->fetch();
				parent::disconnect($conn);
				if ($row) {
					return new SiteCategory($row);
				}
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		// adds a new site profile to the database table
		public function insert() {
			$conn = parent::connect();
			$sql = "INSERT INTO " . TBL_CATEGORY . " ( 
								title,
								alias,
								description
							) VALUES (
								:title,
								:alias,
								:description				
							)";
			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":title", $this->data["title"], PDO::PARAM_STR);
				$st->bindValue(":alias", $this->data["alias"], PDO::PARAM_STR);
				$st->bindValue(":description", $this->data["description"], PDO::PARAM_STR);
				$st->execute();
				parent::disconnect($conn);
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die("Query failed: " . $e->getMessage());
			}
		}

		public function update() {
			$conn = parent::connect();
			$sql = "UPDATE " . TBL_CATEGORY . " SET 
							title = :title,
							alias = :alias,
							description = :description
							WHERE id = :id";
			try {
				$st = $conn->prepare($sql);
				$st->bindValue(":id", $this->data["id"], PDO::PARAM_INT);
				$st->bindValue(":title", $this->data["title"], PDO::PARAM_STR);
				$st->bindValue(":alias", $this->data["alias"], PDO::PARAM_STR);
				$st->bindValue(":description", $this->data["description"], PDO::PARAM_STR);
				$st->execute();
				parent::disconnect($conn);
			} catch (PDOException $e) {
				parent::disconnect($conn);
				die ("Query failed: " . $e->getMessage());
			}
		}

		public function delete() {
			$conn = parent::connect();
			$sql = "DELETE FROM " . TBL_CATEGORY . " WHERE id = :id";

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