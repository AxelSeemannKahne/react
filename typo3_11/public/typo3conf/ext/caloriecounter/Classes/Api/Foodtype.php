<?php

namespace Ask\Caloriecounter\Api;

use Ask\Caloriecounter\Domain\Repository\FoodtypeRepository;
use Ask\Caloriecounter\Domain\Model\Foodtype as FoodtypeModel;
use Nng\Nnrestapi\Annotations as Api;

/**
 * This annotation registers this class as an Endpoint!
 *  
 * @Api\Endpoint()
 */
class Foodtype extends \Nng\Nnrestapi\Api\AbstractApi 
{
	/**
	 * @var FoodtypeRepository
	 */
	private $foodtypeRepository = null;

	/**
	 * Constructor
	 * Inject the FoodtypeRepository. 
	 * Ignore storagePid.
	 * 
	 * @return void
	 */
	public function __construct() 
	{
		$this->foodtypeRepository = \nn\t3::injectClass( FoodtypeRepository::class );
		\nn\t3::Db()->ignoreEnableFields( $this->foodtypeRepository );
	}

	/**
	 * # Retrieve an existing Foodtype
	 * 
	 * Send a simple GET request to retrieve an Foodtype by its uid from the database.
	 * 
	 * Replace `{uid}` with the uid of the Foodtype:
	 * ```
	 * https://www.mysite.com/api/foodtype/{uid}
	 * ```
	 * 
	 * @Api\Access("public")
	 * @Api\Localize()
	 * @Api\Label("/api/foodtype/{uid}")
	 * 
	 * @param FoodtypeModel $foodtype
	 * @param int $uid
	 * @return array
	 */
	public function getIndexAction( FoodtypeModel $foodtype = null, int $uid = null )
	{
		if (!$uid) {
			return $this->response->notFound("No uid passed in URL. Send the request with `api/foodtype/{uid}`");
		}
		if (!$foodtype) {
			return $this->response->notFound("Example with uid [{$uid}] was not found.");
		}
		return $foodtype;
	}

	/**
	 * # Retrieve ALL Entries 
	 * 
	 * Send a GET request to this endpoint to retrieve ALL Entries from the database.
	 * 
	 * @Api\Access("public")
	 * @Api\Localize()
	 * 
	 * @return array
	 */
	public function getAllAction()
	{	
		$result = $this->foodtypeRepository->findAll();
		return $result;
	}

	/**
	 * # Create a new Foodtype
	 * 
	 * Send a POST request to this endpoint including a JSON to create a
	 * new Foodtype in the database. You can also upload file(s).
	 * 
	 * You __must be logged in__ as a frontend OR backend user to access 
	 * this endpoint.
	 * 
	 * @Api\Access("be_users,fe_users")
	 * @Api\Upload("config[caloriecounter]")
	 * @Api\Example("{'title':'Example', 'files':['UPLOAD:/file-0']}");
	 * 
	 * @param FoodtypeModel $foodtype
	 * @return array
	 */
	public function postIndexAction( FoodtypeModel $foodtype = null )
	{	
		$this->foodtypeRepository->add( $foodtype );
		\nn\t3::Db()->persistAll();
		return $foodtype;
	}

	/**
	 * # Update an existing Foodtype
	 * 
	 * Send a PUT request to this endpoint including a JSON to update an
	 * existing Foodtype in the database.
	 * 
	 * You only need to set the fields in the JSON that should be updated.
	 * The data from the JSON will be merged with the data from the persisted Foodtype.
	 *
	 * Replace `{uid}` with the uid of the Foodtype you want to update:
	 * ```
	 * https://www.mysite.com/api/foodtype/{uid}
	 * ```
	 * 
	 * You __must be logged in__ as a frontend OR backend user to access 
	 * this endpoint.
	 * 
	 * @Api\Access("be_users,fe_users")
	 * @Api\Upload("config[caloriecounter]")
	 * @Api\Label("/api/foodtype/{uid}")
	 * 
	 * @param FoodtypeModel $foodtype
	 * @param int $uid
	 * @return array
	 */
	public function putIndexAction( FoodtypeModel $foodtype = null, int $uid = null )
	{
		if (!$uid) {
			return $this->response->notFound("No uid passed in URL. Send the request with `api/foodtype/{uid}`");
		}
		if (!$foodtype) {
			return $this->response->notFound("Example with uid [{$uid}] was not found.");
		}
	
		$this->foodtypeRepository->update( $foodtype );
		\nn\t3::Db()->persistAll();

		return $foodtype;
	}
	
	/**
	 * # Delete an Foodtype
	 * 
	 * Send a DELETE request to this endpoint to delete an existing foodtype.
	 * The method will return a list of all remaining Entries.
	 * 
	 * Replace `{uid}` with the uid of the Foodtype you want to update:
	 * ```
	 * https://www.mysite.com/api/foodtype/{uid}
	 * ```
	 * 
	 * You __must be logged in__ as a frontend OR backend user to access 
	 * this endpoint.
	 * 
	 * @Api\Access("be_users,fe_users")
	 * 
	 * @param FoodtypeModel $foodtype
	 * @param int $uid
	 * @return array
	 */
	public function deleteIndexAction( FoodtypeModel $foodtype = null, int $uid = null )
	{	
		if (!$foodtype) {
			return $this->response->notFound("Example with uid [{$uid}] was not found.");
		}
		
		$this->foodtypeRepository->remove( $foodtype );
		\nn\t3::Db()->persistAll();

		$result = $this->foodtypeRepository->findAll();
		return $result;
	}

}