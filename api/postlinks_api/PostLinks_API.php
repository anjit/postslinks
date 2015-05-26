<?php
/**
 * Class for work with Postlinks API
 */

$_SESSION[p_user]='abhay';
$_SESSION[p_pass]='123456';

class PostLinks_API
{
	// default wsdl url
	private $_wsdl_url = 'http://postlinks.com/api/soap/v1.1/postlinks.wsdl';
	
	// Current authentication key. May be restored.
	private $_auth_key;
	
	// SoapFault exception class
	private $_exception = null;
	
	// Soap object
	private $_soap;

	/**
	 * Constructor create SOAP object and can restore the authentication key if it not expired and set up other wsdl url
	 * 
	 * @param $auth_key string default ''
	 * @param $wsdl_url string default ''
	 */
	function __construct($auth_key = '', $wsdl_url = '')
	{
		if ($wsdl_url != '')
		{
			// set up other wsdl url
			$this->_wsdl_url = $wsdl_url;
		}

		try 
		{
			// create SOAP object
			$this->_soap = new SoapClient($this->_wsdl_url /*,array("trace" => 1,"exceptions"=>0) */);
		}
		catch (SoapFault $e)
		{
			$this->_exception = $e;
		}

		if ($auth_key != '')
		{
			if ($this->execute('Authenticate_Check', array($auth_key)) === true)
			{
				// restore the authentication key
				$this->_auth_key = $auth_key;
			}
		}
	
	}
	
	/**
	 * Magic method
	 *
	 * @param $name function name
	 * @param $arguments function arguments
	 * @return mixed
	 */
	public function __call($name, $arguments)
    {
		return $this->execute($name, $arguments);
    }

	
	/**
	 * Check login and password and set the authentication key
	 *
	 * @param $sLogin string
	 * @param $sPassword string
	 * @return boolean
	 */
	function Authenticate($sLogin, $sPassword)
	{
		$slogin1 = $_SESSION['p_user'];
		$sPassword1 =$_SESSION['p_pass'];
		$this->_auth_key = $this->execute('Authenticate', array($sLogin1, md5($sPassword1)));
		return ($this->_auth_key != '');
	}
	
	/**
	 * Restore authentication key
	 * Check authentication key is not expired and restore it
	 *
	 * @param $auth_key string
	 * @return boolean
	 */
	function AuthenticateRestore($auth_key)
	{
		// @todo check auth_key
		if ($this->execute('Authenticate_Check', array($auth_key)) === true)
		{
			$this->_auth_key = $auth_key;
			return true;
		}
		else
		{
			return false;
		}
		
	}	
	/**
	 * Return current authentication key
	 *
	 * @return string
	 */
	function GetAuthKey()
	{
		return $this->_auth_key;
	}
		
	/**
	 * Returns last error 
	 *
	 * @return string
	 */
	function GetErrors()
	{
		return ($this->_exception != null  && $this->_exception instanceof SoapFault ?  $this->_exception->faultcode . " : " . $this->_exception->getMessage() : '');
	}

	/**
	 * Returns last error code
	 *
	 * @return string
	 */
	function GetErrorCode()
	{
		return ($this->_exception != null  && $this->_exception instanceof SoapFault ?  $this->_exception->faultcode  : '');
	}

	/**
	 * Returns last error message
	 *
	 * @return string
	 */
	function GetErrorMsg()
	{
		return ($this->_exception != null  && $this->_exception instanceof SoapFault ?  $this->_exception->getMessage() : '');
	}
	
	/**
	 * Execute SOAP function
	 *
	 * @param $method string
	 * @param $params array of mixed
	 * @return mixed
	 */
	private function execute($method, $params = array()) 
	{
		$this->_exception = null;
		$result = null;
		
		try 
		{
			//$soap->__setCookie ('PHPSESSID', 'rthrrfh45345dfssdf');
			
			switch ($method)
			{
				// __getFunctions()
				case '__getFunctions':
					$result = $this->_soap->__getFunctions(); // 
				break;

				// Create new session
				case 'Authenticate':
					$result = $this->_soap->Authenticate($params[0],$params[1]); // 
				break;
			
				// Authenticate_Check
				case 'Authenticate_Check':
					$result = $this->_soap->Authenticate_Check($params[0]); // 
				break;
				
				default:
					$result = $this->_soap->__soapCall($method, array_merge(array($this->_auth_key), $params)); // 
				break;
			}

			// @debug
			//print_r($result);
			//print "<pre>\nRequest :\n".htmlspecialchars($this->_soap->__getLastRequest()) ."\n"; // show the request to the server (it works when the debug) who are interested to look at XML - uncomment
			//print "Answer:\n".htmlspecialchars($this->_soap->__getLastResponse())."\n</pre>"; // show the response from the server (it works when the debug) who are interested to look at XML - uncomment
		}
		catch (SoapFault $e)
		{
			$this->_exception = $e;
		}

		if (@$result instanceof SoapFault)
		{
			$this->_exception = $result;
			$result = null;
		}
		
		return $result;
	}
}

/* the end of file */