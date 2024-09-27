<?php

namespace Ask\Caloriecounter\Api;

use Ask\Caloriecounter\Domain\Repository\FoodpresetsRepository;
use Ask\Caloriecounter\Domain\Model\Foodpresets as FoodpresetsModel;
use Nng\Nnrestapi\Annotations as Api;

/**
 * This annotation registers this class as an Endpoint!
 *  
 * @Api\Endpoint()
 */
class Foodpresets extends \Nng\Nnrestapi\Api\AbstractApi 
{
	/**
	 * @var FoodpresetsRepository
	 */
	private $foodpresetsRepository = null;

	/**
	 * Constructor
	 * Inject the FoodpresetsRepository. 
	 * Ignore storagePid.
	 * 
	 * @return void
	 */
	public function __construct() 
	{
		$this->foodpresetsRepository = \nn\t3::injectClass( FoodpresetsRepository::class );
		\nn\t3::Db()->ignoreEnableFields( $this->foodpresetsRepository );
	}

	/**
	 * # Retrieve an existing Foodpresets
	 * 
	 * Send a simple GET request to retrieve an Foodpresets by its uid from the database.
	 * 
	 * Replace `{uid}` with the uid of the Foodpresets:
	 * ```
	 * https://www.mysite.com/api/foodpresets/{uid}
	 * ```
	 * 
	 * @Api\Access("public")
	 * @Api\Localize()
	 * @Api\Label("/api/foodpresets/{uid}")
	 * 
	 * @param FoodpresetsModel $foodpresets
	 * @param int $uid
	 * @return array
	 */
	public function getIndexAction( FoodpresetsModel $foodpresets = null, int $uid = null )
	{
		if (!$uid) {
			return $this->response->notFound("No uid passed in URL. Send the request with `api/foodpresets/{uid}`");
		}
		if (!$foodpresets) {
			return $this->response->notFound("Example with uid [{$uid}] was not found.");
		}
		return $foodpresets;
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
		$result = $this->foodpresetsRepository->findAll();
		return $result;
	}

	/**
	 * # Create a new Foodpresets
	 * 
	 * Send a POST request to this endpoint including a JSON to create a
	 * new Foodpresets in the database. You can also upload file(s).
	 * 
	 * You __must be logged in__ as a frontend OR backend user to access 
	 * this endpoint.
	 * 
	 * @Api\Access("be_users,fe_users")
	 * @Api\Upload("config[caloriecounter]")
	 * @Api\Example("{'title':'Example', 'files':['UPLOAD:/file-0']}");
	 * 
	 * @param FoodpresetsModel $foodpresets
	 * @return array
	 */
	public function postIndexAction( FoodpresetsModel $foodpresets = null )
	{	
		$this->foodpresetsRepository->add( $foodpresets );
		\nn\t3::Db()->persistAll();
		return $foodpresets;
	}

	/**
	 * # Update an existing Foodpresets
	 * 
	 * Send a PUT request to this endpoint including a JSON to update an
	 * existing Foodpresets in the database.
	 * 
	 * You only need to set the fields in the JSON that should be updated.
	 * The data from the JSON will be merged with the data from the persisted Foodpresets.
	 *
	 * Replace `{uid}` with the uid of the Foodpresets you want to update:
	 * ```
	 * https://www.mysite.com/api/foodpresets/{uid}
	 * ```
	 * 
	 * You __must be logged in__ as a frontend OR backend user to access 
	 * this endpoint.
	 * 
	 * @Api\Access("be_users,fe_users")
	 * @Api\Upload("config[caloriecounter]")
	 * @Api\Label("/api/foodpresets/{uid}")
	 * 
	 * @param FoodpresetsModel $foodpresets
	 * @param int $uid
	 * @return array
	 */
	public function putIndexAction( FoodpresetsModel $foodpresets = null, int $uid = null )
	{
		if (!$uid) {
			return $this->response->notFound("No uid passed in URL. Send the request with `api/foodpresets/{uid}`");
		}
		if (!$foodpresets) {
			return $this->response->notFound("Example with uid [{$uid}] was not found.");
		}
	
		$this->foodpresetsRepository->update( $foodpresets );
		\nn\t3::Db()->persistAll();

		return $foodpresets;
	}
	
	/**
	 * # Delete an Foodpresets
	 * 
	 * Send a DELETE request to this endpoint to delete an existing foodpresets.
	 * The method will return a list of all remaining Entries.
	 * 
	 * Replace `{uid}` with the uid of the Foodpresets you want to update:
	 * ```
	 * https://www.mysite.com/api/foodpresets/{uid}
	 * ```
	 * 
	 * You __must be logged in__ as a frontend OR backend user to access 
	 * this endpoint.
	 * 
	 * @Api\Access("be_users,fe_users")
	 * 
	 * @param FoodpresetsModel $foodpresets
	 * @param int $uid
	 * @return array
	 */
	public function deleteIndexAction( FoodpresetsModel $foodpresets = null, int $uid = null )
	{	
		if (!$foodpresets) {
			return $this->response->notFound("Example with uid [{$uid}] was not found.");
		}
		
		$this->foodpresetsRepository->remove( $foodpresets );
		\nn\t3::Db()->persistAll();

		$result = $this->foodpresetsRepository->findAll();
		return $result;
	}

}