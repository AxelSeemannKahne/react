<?php
namespace Ask\Caloriecounter\Domain\Model;


use \Nng\Nnrestapi\Domain\Model\AbstractRestApiModel;

/**
 * A simple Model to test things with.
 * 
 */
class Foodtype extends AbstractRestApiModel
{
    /**
     * title
^^     *
     * @var string
     */
    protected $title = '';



    /**
	 * constructor

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

}
