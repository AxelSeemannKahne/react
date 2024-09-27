<?php
namespace Ask\Caloriecounter\Domain\Model;

use \TYPO3\CMS\Extbase\Domain\Model\FileReference;
use \Nng\Nnrestapi\Domain\Model\AbstractRestApiModel;

/**
 * A simple Model to test things with.
 * 
 */
class Foodpresets extends AbstractRestApiModel
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * cal
     *
     * @var int
     */
    protected $cal = null;

    /**
     * sugar
     *
     * @var int
     */
    protected $sugar = null;

    /**
     * protein
     *
     * @var int
     */
    protected $protein = null;


    /**
     * type
     *
     * @var int
     */
    protected $type = null;


    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $files;

    /**
	 * constructor
     * 
	 */
	public function __construct() {
		$this->initStorageObjects();
	}
	
	/**
	 * Initializes all \TYPO3\CMS\Extbase\Persistence\ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->files = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * @return  string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param   string  $title  title
	 * @return  self
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}


    /**
     * Returns the cal
     *
     * @return int
     */
    public function getCal()
    {
        return $this->cal;
    }

    /**
     * Sets the cal
     *
     * @param int $cal
     * @return void
     */
    public function setCal(int $cal)
    {
        $this->cal = $cal;
    }

    /**
     * Returns the sugar
     *
     * @return int
     */
    public function getSugar()
    {
        return $this->sugar;
    }

    /**
     * Sets the sugar
     *
     * @param int $sugar
     * @return void
     */
    public function setSugar(int $sugar)
    {
        $this->sugar = $sugar;
    }

    /**
     * Returns the protein
     *
     * @return int
     */
    public function getProtein()
    {
        return $this->protein;
    }

    /**
     * Sets the protein
     *
     * @param int $protein
     * @return void
     */
    public function setProtein(int $protein)
    {
        $this->protein = $protein;
    }



    /**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getFiles() {
		return $this->files;
	}
	
	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $files
	 * @return self
	 */
	public function setFiles(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $files) {
		$this->files = $files;
        return $this;
	}

	/**
	 * @param FileReference $files
     * @return self
	 */
	public function addFiles(FileReference $files) {
		if ($this->getFiles() === NULL) {
			$this->files = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		$this->files->attach($files);
        return $this;
	}

    /**
     * Returns the type
     *
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *

     */
    public function setType($type)
    {
        $this->type = $type;
    }

}
