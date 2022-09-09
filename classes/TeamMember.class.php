<?php 

/**
 * Describes a team member 
 */
class TeamMember extends PageContent
{
	protected $name;

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
        unset($properties['id']);
        unset($properties['status']);
        return $properties;
    }

    /**
     * Returns the name of the team member
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name of a team member
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }
}

?>