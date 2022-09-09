<?php 

/**
 * Describes an abtract class with some content for display on a webpage
 */
abstract class PageContent
{
	protected $id;
	protected $title;
	protected $image;
    protected $text;
	protected $status;

	public function __construct(array $pageProperties = null)
	{ 
		if (!empty($pageProperties)) {
			foreach ($pageProperties as $key => $value) {
				if (property_exists($this, $key))
					$this->{$key} = $value;
			}
		}
	}

    /**
     * Returns an associative array of the object properties
     */
    public function properties() {
        return get_object_vars($this);
    }

    /**
     * Returns an associative array of the object properties, without the ID and status
     */
    public function shortProperties() {
        $properties = get_object_vars($this);
        return array_splice($properties, 1, count($properties) - 2);
    }

    /**
     * Returns the ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the ID
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Returns the title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Returns the filepath of the image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the filepath of the image
     * Must be a jpeg, png or gif
     */
    public function setImage(string $image)
    {
        $filetypes = ["jpg", "jpeg", "png", "gif"];
    	$image = trim($image);
    	if (!empty($image) && in_array(array_pop(explode($image, '.')), $filetypes) && file_exists($image)) {
    		$this->image = $image;
    		return $this;
    	}
    	else 
    		return false;   
    }

    /**
     * Get the text describing the content
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the text describing the content
     */
    public function setText(string $text)
    {
        $this->text = $text;

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