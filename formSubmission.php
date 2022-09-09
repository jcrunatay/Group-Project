<?php 

/**
 * Handles all form submissions from the admin panel
 */

spl_autoload_register(function ($class_name) {
	include "classes/" . $class_name . ".class.php";
});
session_start();
$db = new DBManager();
$destination = "admin_panel.php";

if (isset($_SESSION['user'])) {

	// Determine what action to take
	if (isset($_POST['submit'])) {
		switch ($_POST['submit']) {
			case "Add Service": 
			addUpdateItem(false, 1);
			$destination = "./Pages/service/allServices.php";
			break;
			case "Save Service": 
			addUpdateItem(true, 1);
			$destination = "./Pages/service/allServices.php";
			break;
			case "Delete Service":
			deleteItem(1);
			$destination = "./Pages/service/allServices.php";
			break;
			case "Add Portfolio Item": 
			addUpdateItem(false, 2);
			$destination = "./Pages/portfolio/portfolio.php";
			break;
			case "Save Portfolio Item": 
			addUpdateItem(true, 2);
			$destination = "./Pages/portfolio/portfolio.php";
			break;
			case "Delete Portfolio Item":
			deleteItem(2);
			$destination = "./Pages/portfolio/portfolio.php";
			break;
			case "Add Team Member": 
			addUpdateItem(false, 3);
			$destination = "./Pages/team/allTeamMembers.php";
			break;
			case "Save Team Member": 
			addUpdateItem(true, 3);
			$destination = "./Pages/team/allTeamMembers.php";
			break;
			case "Delete Team Member":
			deleteItem(3);
			$destination = "./Pages/team/allTeamMembers.php";
			break;
			case "Add User": 
			addUpdateUser(false);
			$destination = "./Pages/Admin/allUsers.php";
			break;
			case "Save User": 
			addUpdateUser(true);
			$destination = "./Pages/Admin/allUsers.php";
			break;
			case "Delete User":
			deleteItem(4);
			$destination = "./Pages/Admin/allUsers.php";
			break;
			case "Update Profile":
			updateProfile();
			$destination = "./Pages/profile/profile.php";
			break;
			case "Save Page Content":
			updatePageContent();
			$destination = "./Pages/home/headerContent.php";
			break;
			case "Save Slider Images":
			updateSlider();
			$destination = "./Pages/home/slider.php";
			break;
			case "Save Socials": 
			updateSocial();
			$destination = "./Pages/contact/social_media.php";
			break;

		}
	}
} 

header("Location: $destination");

/**
 * Validates, then adds or updates a service, portfolio item or team member to the database
 * Update parameter determines if item is being added or updated
 * Type parameter determines what type of item the item to be saved is: 
 * 1 = Service
 * 2 = Portfolio
 * 3 = Team Member
 * 
 */
function addUpdateItem(bool $update, int $type) {
	global $db;
	$valid = true;

	$title = isset($_POST['title']) ? trim($_POST['title']) : '';
	$text = isset($_POST['text']) ? trim($_POST['text']) : '';

	if ($update) {
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		$status = isset($_POST['status']) ? true : false;
		if (!is_numeric($id) || $id < 1)
			$valid = false;
	}

	if ($type == 3) {
		$name = isset($_POST['name']) ? trim($_POST['name']) : '';
		if (empty($name) || strlen($name) > 50)
			$valid = false;
	}

	if (empty($title) || strlen($title) > 30)
		$valid = false;
	if (empty($text) || strlen($text) > 150)
		$valid = false;
	if ($type < 1 || $type > 3)
		$valid = false;

	if ($valid) {
		// Upload image, or if updating with no image uploaded, retrieve filepath from db
		$image = ($update && $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) ? $db->getImage($id, $type) : uploadImage($type);
		if ($image) {
			$properties = array(
				"title" => $title,
				"text" 	=> $text,
				"image"	=> $image
			);

			if ($type == 1)
				$item = new Service($properties);
			else if ($type == 2)
				$item = new Portfolio($properties);
			else if ($type == 3) {
				$item = new TeamMember($properties);
				$item->setName($name);
			}

			if ($update) {
				$item->setId($id);
				$item->setStatus($status);

				if ($db->addUpdateItem($item, true, $type))
					$_SESSION['successmsg'] = "Item has been updated";
				else 
					$_SESSION['errmsg'] = "Item was unable to be updated";
			}
			else {
				if ($db->addUpdateItem($item, false, $type))
					$_SESSION['successmsg'] = "Item has been added";
				else 
					$_SESSION['errmsg'] = "Item was unable to be added";
			}
		}
	}
	else 
		$_SESSION['errmsg'] = "Unable to add or update item, data is missing or invalid";
}

/**
 * Validates then updates or adds a user to the database
 * Action can only be done by an admin
 * update parameter determines if user is being added or updated
 */
function addUpdateUser(bool $update) {
	global $db;
	$valid = true;
	$id = 0;

	if ($_SESSION['user']->getLevel()) { 
		$name = isset($_POST['name']) ? trim($_POST['name']) : '';
		$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : '';
		$username = isset($_POST['username']) ? trim($_POST['username']) : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$level = isset($_POST['level']) ? true : false;

		if ($update) {
			$id = isset($_POST['id']) ? $_POST['id'] : '';
			$status = isset($_POST['status']) ? true : false;
			if (!is_numeric($id) || $id < 1)
				$valid = false;
		}

		// Simple validation
		if (empty($name) || strlen($name) > 30)
			$valid = false;
		if (empty($email) || strlen($email) > 50)
			$valid = false;
		if (empty($username) || strlen($username) > 30)
			$valid = false;
		if ($update) { 
			if (!empty($password) && empty($_POST['passConfirm'])) 
				$valid = false;
		}
		else {
			if (empty($password) || empty($_POST['passConfirm']))
				$valid = false;
		}

		if ($valid) {
			if (empty($password))
				$password = $db->getUser($id, false)->getPassword();
			else {
				if ($password == $_POST['passConfirm'])
					$password = password_hash($password, PASSWORD_DEFAULT);
				else {
					$_SESSION['errmsg'] = "Passwords do not match";
					$valid = false;
				}
			}

			if ($valid && $db->verifyUsername($username, $id)) {
				$_SESSION['errmsg'] = "Username already exists";
				$valid = false;
			}

			if ($valid) {
				$user = new User(array(
					"name"	=> $name,
					"email"	=> $email,
					"username"	=> $username,
					"password"	=> $password
				));
				$user->setLevel($level);

				if ($update) {
					$user->setId($id);
					$user->setStatus($status);

					if ($db->updateUser($user))
						$_SESSION['successmsg'] = "User has been updated";
					else 
						$_SESSION['errmsg'] = "User was unable to be updated";
				}
				else {
					if ($db->addUser($user))
						$_SESSION['successmsg'] = "User has been added";
					else 
						$_SESSION['errmsg'] = "User was unable to be added";
				}
			}
		}
		else 
			$_SESSION['errmsg'] = "Unable to add or update user, data is missing or invalid";

	}
	else 
		$_SESSION['errmsg'] = "You do not have permission to perform this action";
}

/**
 * Updates the current logged in user
 */
function updateProfile() {
	global $db;
	$valid = true;

	$name = isset($_POST['name']) ? trim($_POST['name']) : '';
	$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';

	if (empty($name) || strlen($name) > 30)
		$valid = false;
	if (empty($email) || strlen($email) > 50)
		$valid = false;
	if (!empty($password) && empty($_POST['passConfirm'])) 
		$valid = false;

	if ($valid) {
		$user = $db->getUser($_SESSION['user']->getID(), false);
		$user->setName($name);
		$user->setEmail($email);

		if (!empty($password)) {
			if ($password == $_POST['passConfirm'])
				$user->setPassword(password_hash($password, PASSWORD_DEFAULT));
			else {
				$_SESSION['errmsg'] = "Passwords do not match";
				$valid = false;
			}
		}

		if ($valid) {
			if ($db->updateUser($user)) {
				$_SESSION['successmsg'] = "Profile has been updated";
				if (!empty($password)) 
					unset($_SESSION['user']);
				else 
					$_SESSION['user'] = $user;
			}
			else 
				$_SESSION['errmsg'] = "Profile was unable to be updated";
		}
	}
	else 
		$_SESSION['errmsg'] = "Unable to update profile, data is missing or invalid";
}

/**
 * Updates the page content table with fields from the $_POST
 * IMPORTANT: Form field input names must exactly match those of the page content table in order for this to function 
 */
function updatePageContent() {
	global $db;
	$valid = true;
	$skipImage = false; 
	unset($_POST['submit']);

	if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
		// allow submission with no image if image is already set in database
		if (!empty($db->getImage(1, 4)))
			$skipImage = true;
	}
	else 
		$image = uploadImage(5, "about");

	if ($skipImage || (!empty($image) && $db->setPageContent("about_img", $image))) {
		foreach ($_POST as $input => $value) {
			if (!empty(trim($value))) {
				if (!$db->setPageContent($input, trim($value)))
					$valid = false;
			}
			else 
				$valid = false;
		}

		if ($valid)
			$_SESSION['successmsg'] = "All fields have been saved";
		else
			$_SESSION['errmsg'] = "Not all fields have been saved";
	}
	else 
		$_SESSION['errmsg'] = "Unable to save image, or no image was uploaded";
}

/**
 * Updates the social media table with fields from the $_POST
 * IMPORTANT: Form field input names must exactly match those of the social media table in order for this to function 
 */
function updateSocial() {
	global $db;
	$valid = true;
	unset($_POST['submit']);

	foreach ($_POST as $input => $value) {
		if (strlen(trim($value)) > 100 || !$db->setSocial($input, trim($value)))
			$valid = false;
	}

	if ($valid)
		$_SESSION['successmsg'] = "Social media links have been saved";
	else
		$_SESSION['errmsg'] = "Not all links have been saved";
}

/** 
 * Uploads the slider images and saves their location to the database
 */ 
function updateSlider() {
	global $db;
	$sliderPaths = [];
	$allUploaded = true;

	for ($i = 1; $i <= count($_FILES); $i++) {
		if ($_FILES["slider$i"]['error'] != UPLOAD_ERR_NO_FILE)
			$sliderPaths[$i - 1] = uploadImage(4, "slider$i", "slider$i");
	}

	if (isset($_SESSION['errmsg'])) {
		$allUploaded = false;
		$sliderPaths = array_filter($sliderPaths); // remove false values from array
	}

	if (!empty($sliderPaths)) {
		if ($db->setPageContent("slider", implode(',', $sliderPaths))) {
			if ($allUploaded)
				$_SESSION['successmsg'] = "Images have been uploaded";
			else
				$_SESSION['errmsg'] = "Some images were not uploaded";
		}
		else
			$_SESSION['errmsg'] = "Unable to save images, please try again";
	}
	else 
		$_SESSION['errmsg'] = "No images were uploaded";

}

/**
 * Deletes a service, portfolio item, team member or user from the database
 * Action can only be completed if signed in user is an admin
 * 
 * Type parameter determines what type of item the item to be saved is: 
 * 1 = Service
 * 2 = Portfolio
 * 3 = Team Member
 * 4 = User
 */
function deleteItem(int $type) {
	global $db;
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	if (is_numeric($id)) {
		if ($_SESSION['user']->getLevel()) { 
			if ($type == 1) {
				if ($db->deleteService($id))
					$_SESSION['successmsg'] = "Service has been deleted";
				else 
					$_SESSION['errmsg'] = "Service was unable to be deleted";
			}
			else if ($type == 2) {
				if ($db->deletePortfolio($id))
					$_SESSION['successmsg'] = "Portfolio item has been deleted";
				else 
					$_SESSION['errmsg'] = "Portfolio item was unable to be deleted";
			}
			else if ($type == 3) {
				if ($db->deleteTeam($id))
					$_SESSION['successmsg'] = "Team member has been deleted";
				else 
					$_SESSION['errmsg'] = "Team member was unable to be deleted";
			}
			else if ($type == 4) {
				if ($db->deleteUser($id))
					$_SESSION['successmsg'] = "User has been deleted";
				else 
					$_SESSION['errmsg'] = "User was unable to be deleted";
			}
			else 
				$_SESSION['errmsg'] = "No item was deleted";
		}
		else 
			$_SESSION['errmsg'] = "You do not have permission to perform this action";
	}
	else 
		$_SESSION['errmsg'] = "Unable to delete item, invalid ID"; 
}

/**
 * Upload an image and return the file path, or false if unsuccessful
 * 
 * Parameters: 
 * A name is optional, and will instead take the name from the upload if missing or empty
 * formElement denotes name in $_FILES to look for, defaults to 'image'
 * In order to use formElement but with uploaded filename, simply pass an empty string for the name parameter (e.g. uploadImage(4, '', "someFormElementName") )
 * 
 * Type parameter determines what type of item the image is associated with, and thus where to store it: 
 * 1 = Service
 * 2 = Portfolio
 * 3 = Team Member
 * 4 = Slider
 * 5 = About Image
 */
function uploadImage(int $type, string $name = '', string $formElement = 'image') {
	$directories = ["services/", "portfolio/", "team/", "slider/", ''];
	$filetypes = ["jpg", "jpeg", "png", "gif"];
	$invalid = false;
	
	$target_dir = isset($directories[$type - 1]) ? "upload/" . $directories[$type - 1] : false;	

	if ($target_dir && isset($_FILES[$formElement]) && $_FILES[$formElement]["error"] === UPLOAD_ERR_OK && is_dir($target_dir)) {

		$imageFileType = strtolower(pathinfo(basename($_FILES[$formElement]["name"]), PATHINFO_EXTENSION));
		$filename = empty(trim($name)) ? basename($_FILES[$formElement]["name"]) : trim($name) . '.' . $imageFileType;
		$target_file = $target_dir . $filename;

		if (in_array($imageFileType, $filetypes)) {
			if (!move_uploaded_file($_FILES[$formElement]["tmp_name"], $target_file)) {
				$errmsg = "Unable to upload image, please select another image or try again";
				$invalid = true;
			}
		}
		else {
			$errmsg = "Unable to upload image, file is not a correct filetype";
			$invalid = true;
		}
	}
	else {
		$errmsg = "Unable to upload image, please select another image or try again";
		$invalid = true;
	}

	if ($invalid) {
		$_SESSION['errmsg'] = $errmsg;
		return false;
	}
	else
		return $target_file;
}