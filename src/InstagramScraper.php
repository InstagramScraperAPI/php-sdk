<?php

namespace InstagramScraperAPI;

/**
 * Instagram Scraper V1
 *
 * TERMS OF USE:
 * - This code is in no way affiliated with, authorized, maintained, sponsored
 *   or endorsed by Icarros or any of its affiliates or subsidiaries. This is
 *   an independent and unofficial API. Use at your own risk.
 * - We do NOT support or tolerate anyone who wants to use this API to send spam
 *   or commit other online crimes.
 *
 */
 
class InstagramScraper
{

	
	/**
	* API
	*
	* @var string
	**/
	public $_API = 'https://instagramscraperapi.com/api/v1';


	/**
	* API Key
	*
	* @var string
	**/
	public $_key = '';



	/**
	*
	* @var string
	*		   Api Key
	**/
	public function __construct($_key = null){

		if(empty($_key) || is_null($_key))
			throw new Exception("__construct request a Rapid API Key", 1);

		
		$this->_key = $_key;
			


    }

    

	/**
	* 
	* Get Pofile by USERNAME
	*
	* @username : string
	* @return array 	
	*
	**/
    public function getProfileByUsername($username){


		$_request = $this->request('/account_username')
				            ->addParam('username', $username)
				            ->getResponse();


		if($_request['code'] == 401) throw new Exception($_request['body']['message']);
		if($_request['code'] != 200) throw new Exception('Wrong response code. Code: '.$_request['Code']);
		if($_request['body']['status'] != 'ok') throw new Exception($_request['body']['message']);


		return $_request['body'];
		
	}

	/**
	* 
	* Get Pofile by URL
	*
	* @url : string
	* @return array 	
	*
	**/
    public function getProfileByURL($url){


		$_request = $this->request('/account_link')
				            ->addParam('url', urlencode($url))
				            ->getResponse();


		if($_request['code'] == 401) throw new Exception($_request['body']['message']);
		if($_request['code'] != 200) throw new Exception('Wrong response code. Code: '.$_request['Code']);
		if($_request['body']['status'] != 'ok') throw new Exception($_request['body']['message']);


		return $_request['body'];
		
	}


	/**
	* 
	* Get Medias
	*
	* @user_id : int
	* @limit : int
	* @after_cursor : string
	* @return array 	
	*
	**/
    public function getMedias($user_id, $limit = 40, $after_cursor = ''){


		$_request = $this->request('/medias')
				            ->addParam('user_id', $user_id)
				            ->addParam('limit', $limit)
				            ->addParam('after_cursor', $after_cursor)
				            ->getResponse();


		if($_request['code'] == 401) throw new Exception($_request['body']['message']);
		if($_request['code'] != 200) throw new Exception('Wrong response code. Code: '.$_request['Code']);
		if($_request['body']['status'] != 'ok') throw new Exception($_request['body']['message']);


		return $_request['body'];
		
	}


	/**
	* 
	* Get Media by Shortcode
	*
	* @user_id : int
	* @return array 	
	*
	**/
    public function getMediaByCode($code){


		$_request = $this->request('/media_code')
				            ->addParam('code', $code)
				            ->getResponse();


		if($_request['code'] == 401) throw new Exception($_request['body']['message']);
		if($_request['code'] != 200) throw new Exception('Wrong response code. Code: '.$_request['Code']);
		if($_request['body']['status'] != 'ok') throw new Exception($_request['body']['message']);


		return $_request['body'];
		
	}


	/**
	* 
	* Get Media by URL
	*
	* @url : string
	* @return array 	
	*
	**/
    public function getMediaByUrl($url){


		$_request = $this->request('/media_url')
				            ->addParam('url', urlencode($url))
				            ->getResponse();


		if($_request['code'] == 401) throw new Exception($_request['body']['message']);
		if($_request['code'] != 200) throw new Exception('Wrong response code. Code: '.$_request['Code']);
		if($_request['body']['status'] != 'ok') throw new Exception($_request['body']['message']);


		return $_request['body'];
		
	}


	/**
	* 
	* Get Medias by Hashtag
	*
	* @tag : string
	* @return array 	
	*
	**/
    public function getMediaByHashtag($tag){


		$_request = $this->request('/hashtag_medias')
				            ->addParam('query', urlencode($tag))
				            ->getResponse();


		if($_request['code'] == 401) throw new Exception($_request['body']['message']);
		if($_request['code'] != 200) throw new Exception('Wrong response code. Code: '.$_request['Code']);
		if($_request['body']['status'] != 'ok') throw new Exception($_request['body']['message']);


		return $_request['body'];
		
	}


	/**
	* 
	* Get Medias by Hashtag
	*
	* @tag : string
	* @return array 	
	*
	**/
    public function getMediaByLocation($tag){


		$_request = $this->request('/location_medias')
				            ->addParam('query', urlencode($tag))
				            ->getResponse();


		if($_request['code'] == 401) throw new Exception($_request['body']['message']);
		if($_request['code'] != 200) throw new Exception('Wrong response code. Code: '.$_request['Code']);
		if($_request['body']['status'] != 'ok') throw new Exception($_request['body']['message']);


		return $_request['body'];
		
	}



	/**
	* 
	* Search list of Hashtags
	*
	* @tag : string
	* @return array 	
	*
	**/
    public function searchHashtags($tag){


		$_request = $this->request('/hashtags')
				            ->addParam('query', urlencode($tag))
				            ->getResponse();


		if($_request['code'] == 401) throw new Exception($_request['body']['message']);
		if($_request['code'] != 200) throw new Exception('Wrong response code. Code: '.$_request['Code']);
		if($_request['body']['status'] != 'ok') throw new Exception($_request['body']['message']);


		return $_request['body'];
		
	}

	/**
	* 
	* Search list of locations
	*
	* @location : string
	* @return array 	
	*
	**/
    public function searchLocations($location){


		$_request = $this->request('/locations')
				            ->addParam('query', urlencode($location))
				            ->getResponse();


		if($_request['code'] == 401) throw new Exception($_request['body']['message']);
		if($_request['code'] != 200) throw new Exception('Wrong response code. Code: '.$_request['Code']);
		if($_request['body']['status'] != 'ok') throw new Exception($_request['body']['message']);


		return $_request['body'];
		
	}

	/**
	* 
	* Search list of User's
	*
	* @username : string
	* @return array 	
	*
	**/
    public function searchUsers($username){


		$_request = $this->request('/users')
				            ->addParam('query', urlencode($username))
				            ->getResponse();


		if($_request['code'] == 401) throw new Exception($_request['body']['message']);
		if($_request['code'] != 200) throw new Exception('Wrong response code. Code: '.$_request['Code']);
		if($_request['body']['status'] != 'ok') throw new Exception($_request['body']['message']);


		return $_request['body'];
		
	}





	/**
     *
     * Used internally, but can also be used by end-users if they want
     * to create completely custom API queries without modifying this library.
     *
     * @param string $url
     *
     * @return array
     */
    public function request(
        $url)
    {
        return new Request($this, $url);
    }
}