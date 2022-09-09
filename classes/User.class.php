<?php 

/**
 * Describes a user
 */
class User
{
    //properties
    private $id;
    private $name;
    private $email;
    private $username;
    private $password;
    private $level;
    private $status;

    public function __construct(array $userProperties = null)
    { 
        if (!empty($userProperties)) {
            foreach ($userProperties as $key => $value) {
                if (property_exists($this, $key))
                    $this->{$key} = $value;
            }
        }
    }

    /**
     * Returns an associative array of the team member properties
     */
    public function properties() {
        return get_object_vars($this);
    }

    /**
     * Returns an associative array of the team member properties, without the ID and status
     */
    public function shortProperties() {
        $properties = get_object_vars($this);
        return array_splice($properties, 1, count($properties) - 2);
    }

    /**
     * Returns the user's ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the user's ID
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Returns the user's name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the user's name
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Returns the user's email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the user's email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Returns the username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets the username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Returns the user's password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the user's password, encrypt before sending!
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returns an int represent the user's level (1 for admin, 0 for moderator)
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Sets the user's level
     */
    public function setLevel(bool $level)
    {
        $this->level = $level ? 1 : 0;

        return $this;
    }

    /**
     * Returns the status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     */
    public function setStatus(bool $status)
    {
        $this->status = $status ? 1 : 0;

        return $this;
    }
}

?>