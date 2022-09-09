<?php

/**
* Handles connectivity to the database, and provides methods for adding, updating and deleting entries from the database
**/
class DBManager {

	private $db;

	function __construct(){
		$host   = "localhost";
		$user   = "root";
		$pass   = "";
		$dbname = "project_module5";
		$db     = null;

		try {
			$this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		} catch (Exception $e) {
			die("Database connection error<br> " . $e->getMessage());
		}
	}

	/********
	 * USER *
	 ********/

	/**
	 * Adds a user to the database
	 * Returns true if successful, false otherwise
	 */
	function addUser($user){
		$query = $this->db->prepare("INSERT INTO `users` (`name`, `email`, `username`, `password`, `level`) VALUES (:name, :email, :username, :password, :level);");
		return $query->execute($user->shortProperties());
	}

	/**
	 * Retrieves the specified user by username or by ID
	 * Parameter searchByUsername determines whether to search by username (default) or ID
	 * Returns user if user exists (and is active, when searching by username), otherwise returns false
	 * Username is case sensitive
	 */
	public function getUser($identifier, bool $searchByUsername = true) {
		if ($searchByUsername)
			$query = $this->db->prepare("SELECT * FROM `users` WHERE BINARY `username` = ? AND `status` = 1");
		else 
			$query = $this->db->prepare("SELECT * FROM `users` WHERE `id` = ?");
		$query->execute(array($identifier));
		$user = $query->fetch( PDO::FETCH_ASSOC );
		if ($user) 
			return new User($user);
		else
			return false;
	}

	/**
	 * Updates a user
	 * Returns true if successful, false otherwise
	 */
	public function updateUser($user) {
		$query = $this->db->prepare("UPDATE `users` SET `name` = :name, `email` = :email, `username` = :username, `password` = :password, `level` = :level, `status` = :status WHERE `id` = :id;");

		if ($query->execute($user->properties()) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/**
	 * Check if a username already exists in the dabatase
	 * If an ID is supplied, checks for username, ignoring that ID
	 */
	public function verifyUsername(string $username, int $id = 0) {
		if ($id) {
			$query = $this->db->prepare("SELECT * FROM `users` WHERE `username` = ? AND `id` != ?;");
			$query->execute(array($username, $id));
		}
		else {
			$query = $this->db->prepare("SELECT * FROM `users` WHERE `username` = ?;");
			$query->execute(array($username));
		}
		if ($query->fetch( PDO::FETCH_ASSOC ))
			return true;
		else
			return false;
	}

	/** 
	 * Retrieves all users from the database
	 * Returns false if unsuccessful
	 */
	public function getAllUsers() {
		$query = $this->db->query( "SELECT * FROM `users`;" );
		return $query->fetchAll( PDO::FETCH_CLASS, "User" );
	}

	/**
	 * Disables a user, preventing them from logging in or performing actions
	 * Returns true if successful, false otherwise
	 */
	public function disableUser(int $id) {
		$query = $this->db->prepare("UPDATE `users` SET `status` = 0 WHERE `id` = ?;");

		if ($query->execute(array($id)) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/**
	 * Deletes a user from the database
	 * Returns true if successful, false otherwise
	 */
	public function deleteUser(int $id) {
		$query = $this->db->prepare("DELETE FROM `users` WHERE `id` = ?;");

		if ($query->execute(array($id)) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/*************
	 * PORTFOLIO *
	 *************/

	/**
	 * Adds a portfolio item to the database
	 * Returns true if successful, false otherwise
	 */
	public function addPortfolio($portfolio) {
		$query = $this->db->prepare("INSERT INTO `portfolio` (`title`, `image`, `text`) VALUES (:title, :image, :text);");
		return $query->execute($portfolio->shortProperties());
	}

	/**
	 * Updates a portfolio item
	 * Returns true if successful, false otherwise
	 */
	public function updatePortfolio($portfolio) {
		$query = $this->db->prepare("UPDATE `portfolio` SET `title` = :title, `image` = :image, `text` = :text, `status` = :status WHERE `id` = :id;");
		if ($query->execute($portfolio->properties()) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/** 
	 * Retrieves all portfolio items from the database
	 * Returns false if unsuccessful
	 * Returns only items with status as 1 if true is passed as a parameter
	 */
	public function getAllPortfolios(bool $validOnly = false) {
		if ($validOnly)
			$query = $this->db->query( "SELECT * FROM `portfolio` WHERE `status` = 1;" );
		else
			$query = $this->db->query( "SELECT * FROM `portfolio`;" );
		return $query->fetchAll( PDO::FETCH_CLASS, "Portfolio" );
	}

	/**
	 * Disables/hides a portfolio item
	 * Returns true if successful, false otherwise
	 */
	public function disablePortfolio(int $id) {
		$query = $this->db->prepare("UPDATE `portfolio` SET `status` = 0 WHERE `id` = ?;");

		if ($query->execute(array($id)) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/**
	 * Deletes a portfolio item from the database
	 * Returns true if successful, false otherwise
	 */
	public function deletePortfolio(int $id) {
		$query = $this->db->prepare("DELETE FROM `portfolio` WHERE `id` = ?;");

		if ($query->execute(array($id)) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/***********
	 * SERVICE *
	 ***********/

	/**
	 * Adds a service to the database
	 * Returns true if successful, false otherwise
	 */
	public function addService($service) {
		$query = $this->db->prepare("INSERT INTO `services` (`title`, `image`, `text`) VALUES (:title, :image, :text);");
		return $query->execute($service->shortProperties());
	}

	/**
	 * Updates a service
	 * Returns true if successful, false otherwise
	 */
	public function updateService($service) {
		$query = $this->db->prepare("UPDATE `services` SET `title` = :title, `image` = :image, `text` = :text, `status` = :status WHERE `id` = :id;");
		if ($query->execute($service->properties()) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/** 
	 * Retrieves all services from the database
	 * Returns false if unsuccessful
	 * Returns only items with status as 1 if true is passed as a parameter
	 */
	public function getAllServices(bool $validOnly = false) {
		if ($validOnly)
			$query = $this->db->query( "SELECT * FROM `services` WHERE `status` = 1;" );
		else
			$query = $this->db->query( "SELECT * FROM `services`;" );
		return $query->fetchAll( PDO::FETCH_CLASS, "Service" );
	}

	/**
	 * Disables/hides a service
	 * Returns true if successful, false otherwise
	 */
	public function disableService(int $id) {
		$query = $this->db->prepare("UPDATE `services` SET `status` = 0 WHERE `id` = ?;");

		if ($query->execute(array($id)) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/**
	 * Deletes a service from the database
	 * Returns true if successful, false otherwise
	 */
	public function deleteService(int $id) {
		$query = $this->db->prepare("DELETE FROM `services` WHERE `id` = ?;");

		if ($query->execute(array($id)) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/********
	 * TEAM *
	 ********/

	/**
	 * Adds a team member to the database
	 * Returns true if successful, false otherwise
	 */
	public function addTeam($teamMember) {
		$query = $this->db->prepare("INSERT INTO `team` (`name`, `title`, `text`, `image`) VALUES (:name, :title, :text, :image);");
		return $query->execute($teamMember->shortProperties());
	}

	/**
	 * Updates a team member
	 * Returns true if successful, false otherwise
	 */
	public function updateTeam($teamMember) {
		$query = $this->db->prepare("UPDATE `team` SET `name` = :name, `title` = :title, `text` = :text, `image` = :image, `status` = :status WHERE `id` = :id;");
		if ($query->execute($teamMember->properties()) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/** 
	 * Retrieves all team members from the database
	 * Returns false if unsuccessful
	 * Returns only items with status as 1 if true is passed as a parameter
	 */
	public function getAllTeam(bool $validOnly = false) {
		if ($validOnly)
			$query = $this->db->query( "SELECT * FROM `team` WHERE `status` = 1;" );
		else
			$query = $this->db->query( "SELECT * FROM `team`;" );
		return $query->fetchAll( PDO::FETCH_CLASS, "TeamMember" );
	}

	/**
	 * Disables/hides a team member
	 * Returns true if successful, false otherwise
	 */
	public function disableTeam(int $id) {
		$query = $this->db->prepare("UPDATE `team` SET `status` = 0 WHERE `id` = ?;");

		if ($query->execute(array($id)) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/**
	 * Deletes a team member from the database
	 * Returns true if successful, false otherwise
	 */
	public function deleteTeam(int $id) {
		$query = $this->db->prepare("DELETE FROM `team` WHERE `id` = ?;");

		if ($query->execute(array($id)) && $query->rowCount() == 1)
			return true;
		else
			return false;
	}

	/*********
	 * OTHER *
	 *********/

	/**
	 * Adds or updates a service, portfolio item or team member to the database
	 * Returns true if successful, false otherwise
	 *
	 * Update parameter determines if item is being added or updated
	 * Type parameter determines what type of item the item to be saved is: 
	 * 1 = Service
	 * 2 = Portfolio
	 * 3 = Team Member
	 *  
	 */
	public function addUpdateItem($item, bool $update, int $type) {
		if (empty($item) || $type < 1 || $type > 3)
			return false;

		if ($update) {
			if ($type == 1)
				return $this->updateService($item);
			else if ($type == 2)
				return $this->updatePortfolio($item);
			else if ($type == 3)
				return $this->updateTeam($item);
		}
		else {
			if ($type == 1)
				return $this->addService($item);
			else if ($type == 2)
				return $this->addPortfolio($item);
			else if ($type == 3)
				return $this->addTeam($item);
		}
	}

	/**
	 * Retrieves the image filepath for a given ID 
	 * Returns false if unsuccessful
	 * 
	 * Type parameter determines what table to look in: 
	 * 1 = Service
	 * 2 = Portfolio
	 * 3 = Team Member
	 * 4 = Page Content
	 */
	public function getImage(int $id, int $type) {
		if ($id < 1 || $type < 1 || $type > 4)
			return false;

		if ($type == 4) {
			$field = "content";
			$id = "about_img";
		}
		else 
			$field = "image";

		$tableNames = ["services", "portfolio", "team", "page_content"];
		$type--;

		$query = $this->db->prepare("SELECT `$field` FROM `$tableNames[$type]` WHERE `id` = ?;");
		$query->execute(array($id));
		return $query->fetch(PDO::FETCH_ASSOC)[$field]; 
	}

	/** 
	 * Retrieves all other page content from the database
	 * Returns false if unsuccessful
	 */
	public function getPageContent() {
		$query = $this->db->query("SELECT * FROM `page_content`;");
		return $query->fetchAll(PDO::FETCH_KEY_PAIR);
	}

	/**
	 * Sets the content for a particular page element
	 * Returns true if successful, false otherwise
	 */
	public function setPageContent(string $id, string $content) {
		$query = $this->db->prepare("UPDATE `page_content` SET `content` = ? WHERE `id` = ?;");
		return $query->execute(array($content, $id));
	}

	/** 
	 * Retrieves social media usernames from the database
	 * Returns false if unsuccessful
	 */
	public function getSocial() {
		$query = $this->db->query("SELECT * FROM `social_media` WHERE `username` > '';");
		return $query->fetchAll(PDO::FETCH_KEY_PAIR);
	}

	/**
	 * Sets the username for a particular social media
	 * Returns true if successful, false otherwise
	 */
	public function setSocial(string $site, string $username) {
		$query = $this->db->prepare("UPDATE `social_media` SET `username` = ? WHERE `site` = ?;");
		return $query->execute(array($username, $site));
	}

	/**
	 * Returns an array containing the table names
	 */
	private function getTableNames() {
		$query = $this->db->query("SHOW TABLES;");
		return $query->fetchAll(PDO::FETCH_COLUMN);
	}
}


?>